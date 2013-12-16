<?php

namespace Aitam\CaffeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Caffe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aitam\CaffeBundle\Entity\CaffeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Caffe {

	/**
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;

	/**
	 * @Assert\Url()
	 * @var string
	 */
	protected $inserisciurl1;

	/**
	 * @var string
	 * @ORM\Column(name="imgvideo1", type="string",length=70, nullable=true)
	 */
	protected $imgvideo1;

	/**
	 * @var string
	 * @ORM\Column(name="embedvideo1", type="string",length=30, nullable=true)
	 */
	protected $embedvideo1;

	/**
	 * @Assert\Length(
	 *      min = "2",
	 *      max = "50",
	 *      minMessage = "Il nome deve essere lungo almeno {{ limit }} carattere.|Il nome deve essere lungo almeno {{ limit }} caratteri.",
	 *      maxMessage = "Il nome non può essere più lungo di {{ limit }} carattere.|Il nome non può essere più lungo di {{ limit }} caratteri."
	 * )
	 * @Assert\NotBlank()
	 * @ORM\Column(name="autore", type="string", length=50, nullable=true)
	 */
	protected $autore;

	/**
	 * @Assert\Length(
	 *      min = "10",
	 *      max = "800",
	 *      minMessage = "la descrizione deve essere lungo almeno {{ limit }} carattere.|la descrizione deve essere lungo almeno {{ limit }} caratteri.",
	 *      maxMessage = "la descrizione non può essere più lungo di {{ limit }} carattere.|la descrizione non può essere più lungo di {{ limit }} caratteri."
	 * )
	 * @var string
	 * @Assert\NotBlank()
	 * @ORM\Column(name="descrizione", type="text", nullable=true)
	 */
	protected $descrizione;

	/**
	 * @Assert\Length(
	 *      min = "2",
	 *      max = "50",
	 *      minMessage = "Il titolo deve essere lungo almeno {{ limit }} carattere.|Il nome deve essere lungo almeno {{ limit }} caratteri.",
	 *      maxMessage = "Il titolo non può essere più lungo di {{ limit }} carattere.|Il nome non può essere più lungo di {{ limit }} caratteri."
	 * )
	 * @var string
	 * @Assert\NotBlank()
	 * @ORM\Column(name="titolo", type="string", length=50, nullable=false)
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
	 * @ORM\Column(name="images1", nullable=true)
	 */
	protected $images1;

	/**
	 * @Assert\Image(
	 *     minWidth = 100,
	 *     maxWidth = 1200,
	 *     minHeight = 100,
	 *     maxHeight = 1200
	 * )
	 * @Assert\File(maxSize="1000000")
	 */
	public $file1;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set imgvideo1
	 *
	 * @param string $imgvideo1
	 * @return Caffe
	 */
	public function setImgvideo1($imgvideo1) {
		$this->imgvideo1 = $imgvideo1;

		return $this;
	}

	/**
	 * Get imgvideo1
	 *
	 * @return string 
	 */
	public function getImgvideo1() {
		return $this->imgvideo1;
	}

	/**
	 * Set embedvideo1
	 *
	 * @param string $embedvideo1
	 * @return Caffe
	 */
	public function setEmbedvideo1($embedvideo1) {
		$this->embedvideo1 = $embedvideo1;

		return $this;
	}

	/**
	 * Get embedvideo1
	 *
	 * @return string 
	 */
	public function getEmbedvideo1() {
		return $this->embedvideo1;
	}

	/**
	 * Set autore
	 *
	 * @param string $autore
	 * @return Caffe
	 */
	public function setAutore($autore) {
		$this->autore = $autore;

		return $this;
	}

	/**
	 * Get autore
	 *
	 * @return string 
	 */
	public function getAutore() {
		return $this->autore;
	}

	/**
	 * Set descrizione
	 *
	 * @param string $descrizione
	 * @return Caffe
	 */
	public function setDescrizione($descrizione) {
		$this->descrizione = $descrizione;

		return $this;
	}

	/**
	 * Get descrizione
	 *
	 * @return string 
	 */
	public function getDescrizione() {
		return $this->descrizione;
	}

	/**
	 * Set titolo
	 *
	 * @param string $titolo
	 * @return Caffe
	 */
	public function setTitolo($titolo) {
		$this->titolo = $titolo;

		return $this;
	}

	/**
	 * Get titolo
	 *
	 * @return string 
	 */
	public function getTitolo() {
		return $this->titolo;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 * @return Caffe
	 */
	public function setCreated($created) {
		$this->created = $created;

		return $this;
	}

	/**
	 * Get created
	 *
	 * @return \DateTime 
	 */
	public function getCreated() {
		return $this->created;
	}

	/**
	 * Set updated
	 *
	 * @param \DateTime $updated
	 * @return Caffe
	 */
	public function setUpdated($updated) {
		$this->updated = $updated;

		return $this;
	}

	/**
	 * Get updated
	 *
	 * @return \DateTime 
	 */
	public function getUpdated() {
		return $this->updated;
	}

	/**
	 * Set images1
	 *
	 * @param string $images1
	 * @return Caffe
	 */
	public function setImages1($images1) {
		$this->images1 = $images1;

		return $this;
	}

	/**
	 * Get images1
	 *
	 * @return string 
	 */
	public function getImages1() {
		return $this->images1;
	}

	public function getAbsolutePath() {
		return null === $this->images1 ? null
				: $this->getUploadRootDir() . '/' . $this->images1;
	}

	public function getWebPath() {
		return null === $this->images1 ? null
				: $this->getUploadDir() . '/' . $this->images1;
	}

	protected function getUploadRootDir() {
		// the absolute directory path where uploaded documents should be saved
		return __DIR__ . '/../../../../web/' . $this->getUploadDir();
	}

	protected function getUploadDir() {
		// get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
		return '/bundles/AitamCaffe/images';
	}

	/**
	 * @ORM\prePersist
	 */
	public function preUpload() {
		var_dump($this->images1);
		var_dump($this->file1);
	
		
		if (null !== $this->file1) {
			// do whatever you want to generate a unique name
			$this->images1 = uniqid() . '.' . $this->file1->guessExtension();
		}
	}

	/**
	 * @ORM\postPersist
	 */
	public function upload() {

		if (null === $this->file1) {
			return;
		}

		// if there is an error when moving the file, an exception will
		// be automatically thrown by move(). This will properly prevent
		// the entity from being persisted to the database on error
		$this->file1->move($this->getUploadRootDir(), $this->images1);

		unset($this->file1);
	}

	/**
	 * @ORM\postRemove
	 */
	public function removeUpload() {
		if ($this->images1 = $this->getAbsolutePath()) {
			unlink($this->images1);
		}
	}

	public function getInserisciurl1() {
		return $this->inserisciurl1;
	}

	public function setInserisciurl1( $inserisciurl1) {
		$this->inserisciurl1 = $inserisciurl1;
	}

}
