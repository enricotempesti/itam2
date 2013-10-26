<?php
namespace Application\Sonata\UserBundle\ServiceLogin;

use Symfony\Component\HttpFoundation\Session\Session;
use GoogleApi\Client;
use GoogleApi\Contrib\Oauth2Service;
use Application\Sonata\UserBundle\Entity\User;
use \Facebook;

class ServiceLogin {
	public $user;

	public $loginUrl;

	public $logoutUrl;

	public $logoutUrlgoogle;

	public $usergoogle;

	public $user_profile;

	public $googleClient;

	public $loginUrlGoogle;

	public $c1;

	protected $em;

	public function __construct($em) {

		$this->em = $em;

	}

	public function ServiceFacebook() {

		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook(
				array('appId' => '315975111880553',
						'secret' => '53b9e0f7aef2ee4da07a4bbdc5650dd4',));
		Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
		// Get User ID
		$this->user = $facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.

		if ($this->user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$this->user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e) {
				error_log($e);
				$this->user = null;
			}
		}

		// Login or logout url will be needed depending on current user state.
		if ($this->user) {
			$this->logoutUrl = $facebook->getLogoutUrl();
		} else {
			$this->loginUrl = $facebook->getLoginUrl();

		}
	}

	public function ControlloUser() {

	
		$nome = $this->user_profile['first_name'] ."_face". date('Y-m-d_H:i');
		$email = $this->user_profile['id'];
		$password = $this->user_profile['id'];
		$firstname = $this->user_profile['first_name'];
		$lastname = $this->user_profile['last_name'];
		$website = $this->user_profile['link'];
		$enabled = true;

		$user = new User();

		$user->setUsername($nome);
		$user->setEmail($email);
		$user->setPassword($password);
		$user->setEnabled($enabled);
		$user->setFacebookUid($password);
		$user->setFirstname($firstname);
		$user->setLastname($lastname);
		$user->setWebsite($website);
		$this->em->persist($user);
		$this->em->flush();

		return $user;

	}

	public function ServiceGoogle() {

		$this->googleclient = new Client();

		$c1 = new Oauth2Service($this->googleclient);

		if (isset($_GET['code'])) {
			$this->googleclient->authenticate($_GET['code']);
			$_SESSION['token'] = $this->googleclient->getAccessToken();
			$redirect = 'http://' . $_SERVER['HTTP_HOST']
					. $_SERVER['PHP_SELF'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
			//	return;
		}

		if (isset($_SESSION['token'])) {
			$this->googleclient->setAccessToken($_SESSION['token']);
		}

		if (isset($_REQUEST['logout'])) {
			unset($_SESSION['token']);
			$this->googleclient->revokeToken();
		}

		if ($this->googleclient->getAccessToken()) {
			$this->usergoogle = $c1->userinfo->get();
		}

		if ($this->usergoogle) {
			$this->logoutUrlgoogle = "<a href='?logout'>Logout</a>";
		} else {
			$this->loginUrlGoogle = $this->googleclient->createAuthUrl();

		}
	}

	public function ControlloUserGoogle() {
		
		$nome = $this->usergoogle['given_name'] ."_google". date('Y-m-d_H:i');
		$email = $this->usergoogle['id'];
		$password = $this->usergoogle['id'];
		$enabled = true;
		$firstname = $this->usergoogle['given_name'];
		$lastname = $this->usergoogle['family_name'];
		$website = $this->usergoogle['link'];
		$picture = $this->usergoogle['picture'];

		$user = new User();

		$user->setUsername($nome);
		$user->setEmail($email);
		$user->setPassword($password);
		$user->setEnabled($enabled);
		$user->setgplusUid($password);
		$user->setFirstname($firstname);
		$user->setLastname($lastname);
		$user->setWebsite($website);
		$user->setBiography($picture);
		$this->em->persist($user);
		$this->em->flush();

		return $user;
	}
}
