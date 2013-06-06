<?php
 
namespace Aitam\AgendaBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\EntityRepository;
 
/**
 * @ORM\Entity(repositoryClass="Aitam\AgendaBundle\Repository\MynewsRepository")
 * @ORM\Table(name="mynews")
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
     * @ORM\Column(type="string", length=100)
     */
    protected $newslink;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $infoevento;
    
    
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
}