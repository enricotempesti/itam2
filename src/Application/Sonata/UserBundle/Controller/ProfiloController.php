<?php
namespace Application\Sonata\UserBundle\Controller;

use Application\Sonata\UserBundle\Form\ProfiloType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Application\Sonata\UserBundle\Entity\User;

class ProfiloController extends Controller {
	
	protected $file;

	/**
	 * Creates a new Profilo entity.
	 *
	 */
	public function createAction() {

		$user = $this->getUser();
		//	var_dump($user);
		$id = $user->getid();

		$em = $this->getDoctrine()->getEntityManager();
		$entity = new User();
		//	$entity = $em->getRepository('ApplicationSonataUserBundle:user')->find($id);
		//	var_dump($entity);

		$entity = new User();

		$form = $this->createForm(new ProfiloType(), $entity);

		return $this
				->render(
						'ApplicationSonataUserBundle:Profilo:edit_profilo.html.twig',
						array('entity' => $entity,
								'form' => $form->createView()));

	}

	public function nuovoProfiloAction(Request $request) {

		$user = $this->getUser();
		//	var_dump($user);
		$id = $user->getid();
		$em = $this->getDoctrine()->getEntityManager();
		$entity = new User();
		$user = $em->getRepository('ApplicationSonataUserBundle:user')
				->find($id);

		$form = $this->createForm(new ProfiloType(), $entity);

		if ('POST' == $request->getMethod()) {
			$form->bindRequest($request);
		} else {
			return $this->redirect('User_profilo');
		}
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$dati = $form->getData();
		//	var_dump($dati);

			$firstname = $dati->getfirstname();
			$lastname = $dati->getlastname();
			
			$file=$dati->getbiography();
	//		var_dump($file);
			
			$biography = "_image" . date('Y-m-d_H-i')
					. $dati->getbiography()->getClientOriginalName();
			
			$profilo = new ProfiloController();
			$profilo->upload($file,$biography);

			$user->setlastname($lastname);
			$user->setbiography($biography);
			$user->setfirstname($firstname);

			$em->flush();

			return $this
					->redirect($this->generateUrl('sonata_user_profile_show'));

		}
	}

	public function upload($file,$biography) {
		
		// la proprietà file può essere vuota se il campo non è obbligatorio
		if (null === $file) {
			return;
		}

		// si utilizza il nome originale del file ma è consigliabile
		// un processo di sanitizzazione almeno per evitare problemi di sicurezza

		// move accetta come parametri la cartella di destinazione
		// e il nome del file di destinazione
	$file->move($this->getUploadRootDir(),
						$biography);

		// impostare la proprietà del percorso al nome del file dove è stato salvato il file
		$biography = $file->getClientOriginalName();

		// impostare a null la proprietà file dato che non è più necessaria
		$file = null;
	}

	public function getAbsolutePath() {
		return null === $biography ? null
				: $this->getUploadRootDir() . '/' . $biography;
	}

	public function getWebPath() {
		return null === $biography ? null
				: $this->getUploadDir() . '/' . $biography;
	}

	protected function getUploadRootDir() {
		// il percorso assoluto della cartella dove i
		// documenti caricati verranno salvati
		return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
	}

	protected function getUploadDir() {
		// togliamo __DIR_ in modo da visualizzare
		// correttamente nella vista il file caricato
		return '/bundles/Immaginiuser';
	}

}
