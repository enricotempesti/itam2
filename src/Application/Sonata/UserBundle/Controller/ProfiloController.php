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
        if($user === null){
        	
        }
		$id = $user->getid();

		$em = $this->getDoctrine()->getEntityManager();
		$entity = new User();
			$entity = $em->getRepository('ApplicationSonataUserBundle:user')->find($id);
		//	var_dump($entity);

		$form = $this->createForm(new ProfiloType(), $entity);

		return $this
				->render(
						'ApplicationSonataUserBundle:Profilo:edit_profilo.html.twig',
						array('entity' => $entity,
								'form' => $form->createView()));

	}

	public function nuovoProfiloAction(Request $request) {

		$user = $this->getUser();
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

			$website = $dati->getwebsite();
			$dateOfBirth = $dati->getdateOfBirth();
			$file=$dati->getbiography();
			
		$a = substr($user->getBiography(), 14 , 8);
        

		    if ($dati->getbiography() === null ){
			    $biography = '_imageanonimo.jpg';
			}
			else{
			$biography = "_image" . date('Y-m-d_H-i').$dati->getbiography()->getClientOriginalName();
			}
			if ($a == 'facebook' or $a == 'ogleuser'){
				$biography=$user->getBiography();
			}
			

			$profilo = new ProfiloController();
			$profilo->upload($file,$biography);

			$user->setwebsite($website);
			$user->setbiography($biography);
            $user->setdateOfBirth($dateOfBirth);
			
			$em->flush();

			return $this
					->redirect($this->generateUrl('sonata_user_profile_show'));

		}
		
		return $this
				->render(
						'ApplicationSonataUserBundle:Profilo:edit_profilo.html.twig',
						array('entity' => $entity,
								'form' => $form->createView()));
	}

	public function upload($file,$biography) {
		
		// la propriet� file pu� essere vuota se il campo non � obbligatorio
		if (null === $file) {
			return;
		}

		// si utilizza il nome originale del file ma � consigliabile
		// un processo di sanitizzazione almeno per evitare problemi di sicurezza

		// move accetta come parametri la cartella di destinazione
		// e il nome del file di destinazione
	$file->move($this->getUploadRootDir(),
						$biography);

		// impostare la propriet� del percorso al nome del file dove � stato salvato il file
		$biography = $file->getClientOriginalName();

		// impostare a null la propriet� file dato che non � pi� necessaria
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
