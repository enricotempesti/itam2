<?php

namespace Aitam\RaccontiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Racconti
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Aitam\RaccontiBundle\Entity\RaccontiRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Racconti {

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
     * @Assert\Url()
     * @var string 
     */
    protected $inserisciurl2;

    /**
     * @var string
     * @ORM\Column(name="imgvideo1", type="string",length=70, nullable=true)
     */
    protected $imgvideo1;

    /**
     * @var string
     * @ORM\Column(name="imgvideo2", type="string",length=70, nullable=true)
     */
    protected $imgvideo2;

    /**
     * @var string
     * @ORM\Column(name="embedvideo1", type="string",length=30, nullable=true)
     */
    protected $embedvideo1;

    /**
     * @var string
     * @ORM\Column(name="embedvideo2", type="string",length=30, nullable=true)
     */
    protected $embedvideo2;

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
     *      min = "250",
     *      max = "3000",
     *      minMessage = "la descrizione deve essere lungo almeno {{ limit }} carattere.|Il nome deve essere lungo almeno {{ limit }} caratteri.",
     *      maxMessage = "la descrizione non può essere più lungo di {{ limit }} carattere.|Il nome non può essere più lungo di {{ limit }} caratteri."
     * )
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="descrizione", type="text", nullable=true)
     */
    protected $descrizione;

    /**
     * @var string
     * @Assert\Length(
     *      min = "30",
     *      max = "250",
     *      minMessage = "la descrizione breve deve essere lungo almeno {{ limit }} carattere.|Il nome deve essere lungo almeno {{ limit }} caratteri.",
     *      maxMessage = "la descrizione breve non può essere più lungo di {{ limit }} carattere.|Il nome non può essere più lungo di {{ limit }} caratteri."
     * )
     * @Assert\NotBlank()
     * @ORM\Column(name="descrizionebreve", type="string", length=255, nullable=true)
     */
    protected $descrizionebreve;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    protected $tipo;

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
     * @var boolean
     *
     * @ORM\Column(name="isactive", type="boolean", nullable=true)
     */
    protected $isactive;

    /**
     * @ORM\Column(name="images1", nullable=true)
     */
    protected $images1;

    /**
     * @ORM\Column(name="images2", nullable=true)
     */
    protected $images2;

    /**
     * @ORM\Column(name="images3", nullable=true)
     */
    protected $images3;

    /**
     * @ORM\Column(name="images4", nullable=true)
     */
    protected $images4;

    /**
     * @ORM\Column(name="images5", nullable=true)
     */
    protected $images5;

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
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 1200,
     *     minHeight = 100,
     *     maxHeight = 1200
     * )
     * @Assert\File(maxSize="1000000")
     */
    public $file2;

    /**
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 1200,
     *     minHeight = 100,
     *     maxHeight = 1200
     * )
     * @Assert\File(maxSize="1000000")
     */
    public $file3;

    /**
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 1200,
     *     minHeight = 100,
     *     maxHeight = 1200
     * )
     * @Assert\File(maxSize="1000000")
     */
    public $file4;

    /**
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 1200,
     *     minHeight = 100,
     *     maxHeight = 1200
     * )
     * @Assert\File(maxSize="1000000")
     */
    public $file5;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set autore
     *
     * @param string $autore
     * @return Racconti
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
     * @return Racconti
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
     * Set descrizionebreve
     *
     * @param string $descrizionebreve
     * @return Racconti
     */
    public function setDescrizionebreve($descrizionebreve) {
        $this->descrizionebreve = $descrizionebreve;

        return $this;
    }

    /**
     * Get descrizionebreve
     *
     * @return string 
     */
    public function getDescrizionebreve() {
        return $this->descrizionebreve;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Racconti
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     * @return Racconti
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

    public function getCreated() {
        return $this->created;
    }

    public function setCreated(datetime $created) {
        $this->created = $created;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function setUpdated(datetime $updated) {
        $this->updated = $updated;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     * @return Racconti
     */
    public function setIsactive($isactive) {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean 
     */
    public function getIsactive() {
        return $this->isactive;
    }

    public $i;

    public function getAbsolutePath() {
        for ($i = 1; $i <= 5; ++$i) {
            return null === $this->{'images' . $i} ? null : $this->getUploadRootDir() . '/' . $this->{'images' . $i};
        }
    }

    public function getWebPath() {
        for ($i = 1; $i <= 5; ++$i) {
            return null === $this->{'images'} . $i ? null : $this->getUploadDir() . '/' . $this->{'images'} . $i;
        }
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return '/bundles/raccontibundle/immagini';
    }

    /**
     * @ORM\prePersist
     */
    public function preUpload() {
        for ($i = 1; $i <= 5; ++$i) {
            if (null !== $this->{'file' . $i}) {
                // do whatever you want to generate a unique name
                $this->{'images' . $i} = uniqid() . '.' . $this->{'file' . $i}->guessExtension();
            }
        }
    }

    /**
     * @ORM\postPersist
     */
    public function upload() {
        for ($i = 1; $i <= 5; ++$i) {
            if (null !== $this->{'file' . $i}) {
                $this->{'file' . $i}->move($this->getUploadRootDir(), $this->{'images' . $i});
                ((unset) $this->{'file' . $i});
            }
        }
    }

    /**
     * @ORM\postRemove
     */
    public function removeUpload() {

        for ($i = 1; $i <= 5; ++$i) {
            if
            ($this->{'images' . $i} = $this->getUploadRootDir() . '/' . $this->{'images' . $i}) {
                unlink($this->{'images' . $i});
            }
        }
    }

    /**
     * Set images1
     *
     * @param string $images1
     * @return Racconti
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

    /**
     * Set images2
     *
     * @param string $images2
     * @return Racconti
     */
    public function setImages2($images2) {
        $this->images2 = $images2;

        return $this;
    }

    /**
     * Get images2
     *
     * @return string 
     */
    public function getImages2() {
        return $this->images2;
    }

    /**
     * Set images3
     *
     * @param string $images3
     * @return Racconti
     */
    public function setImages3($images3) {
        $this->images3 = $images3;

        return $this;
    }

    /**
     * Get images3
     *
     * @return string 
     */
    public function getImages3() {
        return $this->images3;
    }

    /**
     * Set images4
     *
     * @param string $images4
     * @return Racconti
     */
    public function setImages4($images4) {
        $this->images4 = $images4;

        return $this;
    }

    /**
     * Get images4
     *
     * @return string 
     */
    public function getImages4() {
        return $this->images4;
    }

    /**
     * Set images5
     *
     * @param string $images5
     * @return Racconti
     */
    public function setImages5($images5) {
        $this->images5 = $images5;

        return $this;
    }

    /**
     * Get images5
     *
     * @return string 
     */
    public function getImages5() {
        return $this->images5;
    }

    public static function getTypes() {
        return array('testimonial' => 'Testimonial', 'viaggio' => 'Viaggio', 'racconto' => 'Racconto');
    }

    public static function getTypeValues() {
        return array_keys(self::getTypes());
    }

    public function getInserisciurl1() {
        return $this->inserisciurl1;
    }

    public function setInserisciurl1($inserisciurl1) {
        $this->inserisciurl1 = $inserisciurl1;
    }

    public function getInserisciurl2() {
        return $this->inserisciurl2;
    }

    public function setInserisciurl2($inserisciurl2) {
        $this->inserisciurl2 = $inserisciurl2;
    }

    /**
     * Set imgvideo1
     *
     * @param string $imgvideo1
     * @return Racconti
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
     * Set imgvideo2
     *
     * @param string $imgvideo2
     * @return Racconti
     */
    public function setImgvideo2($imgvideo2) {
        $this->imgvideo2 = $imgvideo2;

        return $this;
    }

    /**
     * Get imgvideo2
     *
     * @return string 
     */
    public function getImgvideo2() {
        return $this->imgvideo2;
    }

    /**
     * Set embedvideo1
     *
     * @param string $embedvideo1
     * @return Racconti
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
     * Set embedvideo2
     *
     * @param string $embedvideo2
     * @return Racconti
     */
    public function setEmbedvideo2($embedvideo2) {
        $this->embedvideo2 = $embedvideo2;

        return $this;
    }

    /**
     * Get embedvideo2
     *
     * @return string 
     */
    public function getEmbedvideo2() {
        return $this->embedvideo2;
    }

}