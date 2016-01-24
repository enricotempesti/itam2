<?php

namespace Aitam\DavisitareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Aitam\DavisitareBundle\Repository\CommentidavisitareRepository")
 * @ORM\Table(name="commentidavisitare")
 * @ORM\HasLifecycleCallbacks()
 */
class Commentidavisitare
{
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
     * @ORM\ManyToOne(targetEntity="Davisitare", inversedBy="commentidavisitare")
     * @ORM\JoinColumn(name="davisitare_id", referencedColumnName="id")
     */
    protected $articolo;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    public function __construct()
    {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());

        $this->setApproved(true);
    }

    /**
     * @ORM\preUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(new \DateTime());
    }

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
     */
    public function setUtente($utente)
    {
        $this->utente = $utente;
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
     * @param text $commenti
     */
    public function setCommenti($commenti)
    {
        $this->commenti = $commenti;
    }

    /**
     * Get commenti
     *
     * @return text 
     */
    public function getCommenti($length = null)
    {
    	if (false === is_null($length) && $length > 0)
    		return substr($this->commenti, 0, $length);
    	else
        return $this->commenti;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
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
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set articolo
     *
     * @param Aitam\davisitareBundle\Entity\Davisitare $articolo
     */
    public function setArticolo(\Aitam\DavisitareBundle\Entity\Davisitare $articolo)
    {
        $this->articolo = $articolo;
    }

    /**
     * Get articolo
     *
     * @return Aitam\DavisitareBundle\Entity\Davisitare 
     */
    public function getArticolo()
    {
        return $this->articolo;
    }
}