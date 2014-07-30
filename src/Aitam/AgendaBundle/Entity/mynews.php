<?php
 
namespace Aitam\AgendaBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityRepository;
 
/**
 * @ORM\Entity(repositoryClass="Aitam\AgendaBundle\Repository\MynewsRepository")
 * @ORM\Table(name="mynews")
 * @ORM\HasLifecycleCallbacks()
 */
 
class Mynews
{   	
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\Column(type="datetime")
     */
    protected $newsdata;
 
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $newstitle;
 
    /**
     * @ORM\Column(type="string", length=100 , nullable = true)
     */
    protected $newslink;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $infoevento;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $image;
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
 
    /**
     * Set newsdata
     *
     * @param datetime $newsdata
     */
    public function setNewsdata($newsdata)
    {
        $this->newsdata = $newsdata;
    }
 
    /**
     * Get newsdata
     *
     * @return datetime 
     */
    public function getNewsdata()
    {
        return $this->newsdata;
    }
 
    /**
     * Set newstitle
     *
     * @param string $newstitle
     */
    public function setNewstitle($newstitle)
    {
        $this->newstitle = $newstitle;
    }
 
    /**
     * Get newstitle
     *
     * @return string 
     */
    public function getNewstitle()
    {
        return $this->newstitle;
    }
 
    /**
     * Set newslink
     *
     * @param string $newslink
     */
    public function setNewslink($newslink)
    {
        $this->newslink = $newslink;
    }
 
    /**
     * Get newslink
     *
     * @return string 
     */
    public function getNewslink()
    {
        return $this->newslink;
    }
 
    /**
     * Set infoevento
     *
     * @param text $infoevento
     */
    public function setInfoevento($infoevento)
    {
        $this->infoevento = $infoevento;
    }
 
    /**
     * Get infoevento
     *
     * @return text 
     */
    public function getInfoevento()
    {
        return $this->infoevento;
    }
    
    /**
     * Set image
     *
     * @param string $image
     */
    public function setImage($image) {
    	$this->image = $image;
    }
    
    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
    	return $this->image;
    }
    
    public function getAbsolutePath() {
    	return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }
    
    public function getWebPath() {
    	return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }
    
    protected function getUploadRootDir() {
    	// the absolute directory path where uploaded documents should be saved
    	return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }
    
    protected function getUploadDir() {
    	// get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    	return '/bundles/AgendaBundle/images';
    }
    
    /**
     * @ORM\prePersist
     */
    public function preUpload() {
    	if (null !== $this->file) {
    		// do whatever you want to generate a unique name
    		$this->image = uniqid() . '.' . $this->file->guessExtension();
    	}
    }
    
    /**
     * @ORM\postPersist
     */
    public function upload() {
    	if (null === $this->file) {
    		return;
    	}
    
    	// if there is an error when moving the file, an exception will
    	// be automatically thrown by move(). This will properly prevent
    	// the entity from being persisted to the database on error
    	$this->file->move($this->getUploadRootDir(), $this->image);
    
    	unset($this->file);
    }
    
    /**
     * @ORM\postRemove
     */
    public function removeUpload() {
    	if ($file = $this->getAbsolutePath()) {
    		unlink($file);
    	}
    }
    
    
    /**
     * Set path
     *
     * @param string $path
     * @return Dinuovo
     */
    public function setPath($path)
    {
    	$this->path = $path;
    
    	return $this;
    }
    
    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
    	return $this->path;
    }
}