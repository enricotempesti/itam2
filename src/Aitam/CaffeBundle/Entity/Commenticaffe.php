<?php

namespace Aitam\CaffeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass="Aitam\CaffeBundle\Entity\CommentiCaffeRepository")
 * @ORM\Table(name="commenticaffe")
 */
class CommentiCaffe {
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $utente;
	
	/**
	 * @ORM\Column(type="text")
	 */
	protected $commenti;
	
	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $approved;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Caffe", inversedBy="commenticaffe")
	 * @ORM\JoinColumn(name="caffe_id", referencedColumnName="id")
	 */
	protected $titolo;
	
    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    protected $updated;


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
     * Set utente
     *
     * @param string $utente
     * @return CommentiCaffe
     */
    public function setUtente($utente)
    {
        $this->utente = $utente;
    
        return $this;
    }

    /**
     * Get utente
     *
     * @return string 
     */
    public function getUtente()
    {
        return $this->utente;
    }

    /**
     * Set commenti
     *
     * @param string $commenti
     * @return CommentiCaffe
     */
    public function setCommenti($commenti)
    {
        $this->commenti = $commenti;
    
        return $this;
    }

    /**
     * Get commenti
     *
     * @return string 
     */
    public function getCommenti()
    {
        return $this->commenti;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return CommentiCaffe
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    
        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return CommentiCaffe
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return CommentiCaffe
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set titolo
     *
     * @param \Aitam\CaffeBundle\Entity\Caffe $titolo
     * @return CommentiCaffe
     */
    public function setTitolo(\Aitam\CaffeBundle\Entity\Caffe $titolo = null)
    {
        $this->titolo = $titolo;
    
        return $this;
    }

    /**
     * Get titolo
     *
     * @return \Aitam\CaffeBundle\Entity\Caffe 
     */
    public function getTitolo()
    {
        return $this->titolo;
    }
}