<?php

namespace Picta\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Picta\Entity\Pic;

/**
 * User.
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User extends BaseUser
{
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
   protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    protected $name;

    /**
     * @var date
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var date
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="Picta\Entity\Pic", mappedBy="user", cascade={"remove"})
     */
    protected $pics;

    public function __construct()
    {
        parent::__construct();
        $this->pics = new ArrayCollection();
        $this->roles = array('ROLE_USER');
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function timestamps()
    {
        if (is_null($this->createdAt)) {
            $this->createdAt = new \DateTime();
        }

        $this->updatedAt = new \DateTime();
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param Pic $pic
     *
     * @return User
     */
    public function addPic(Pic $pic)
    {
        $this->pics[] = $pic;

        return $this;
    }

    /**
     * @return ArrayCollection<Pic>
     */
    public function getPics()
    {
        return $this->pics;
    }

    public function isEqualTo(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }
}
