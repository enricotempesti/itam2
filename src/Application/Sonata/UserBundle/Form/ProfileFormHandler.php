<?php
namespace Application\Sonata\UserBundle\Form;

use Application\Sonata\UserBundle\Entity\User;

use FOS\UserBundle\Model\UserInterface;
use Sonata\UserBundle\Form\Handler\ProfileFormHandler as BaseHandler;


class ProfileFormHandler extends BaseHandler 
{

    public function process(UserInterface $user)
    {

        $this->form->setData($user);
   
   /*     $em = $this->getDoctrine()->getManager();      
        $entity = $em->getRepository('ApplicationSonataUserBundle:user')->find($id);
        echo"----------------------------------------------------entity----------------------------------------------";
        var_dump($entity);
        
        $listauser = $em->getRepository('ApplicationSonataUserBundle:user')->findBy (array ('enabled' => true)
        		,array('id' => 'DESC'), $limit = null,$offset = null);
        echo"----------------------------------------------listauser----------------------------------------------";
        var_dump($listauser); */
        
        if ('POST' == $this->request->getMethod()) {
            $this->form->bindRequest($this->request);
    

            if ($this->form->isValid()) {
            	$image = $this->form->getData();
            	echo"-----------------------------user----------------------------------";
            	var_dump($user);
            	echo"------------------------image--------------------------------------";
            	var_dump($image);
            	die;
            	
            	$this->image->move($this->getUploadRootDir(), $this->image );
                $image = uniqid().$user->getId() . '-' . $user->getUsername() . '-foto-perfil.jpg';

                $user->upload($image);
                $this->onSuccess($user);
                return true;
            }
            $this->userManager->reloadUser($user);
        }
        return false;
    } 

    protected function onSuccess(UserInterface $user)
    {
        $this->userManager->updateUser($user);
    }
    
    public function getAbsolutePath() {
    	return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image ;
    }
    
    public function getWebPath() {
    	return null === $this->image  ? null : $this->getUploadDir() . '/' . $this->image ;
    }
    
    protected function getUploadRootDir() {
    	// the absolute directory path where uploaded documents should be saved
    	return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }
    
    protected function getUploadDir() {
    	// get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    	return '/bundles/Immaginiuser';
    }
}