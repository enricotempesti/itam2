<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\EntityRepository;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ApplicationSonataUserBundle\Repository\userRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser {
	/**
	 * @var integer $id
	 */
	protected $id;

	protected $image;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $biography;

	/**
	 * 
	 */
	public $file;

	/**
	 * Get id
	 *
	 * @return integer $id
	 */
	public function getId() {
		return $this->id;
	}

	public function getImage() {
		return $this->image;
	}

	public function setImage($image) {
		$this->image = $image;
	}

}
