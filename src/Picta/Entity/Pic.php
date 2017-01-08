<?php

namespace Picta\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraints\Date;


/**
 * Pic.
 *
 * @ApiResource
 * @ORM\Entity
 * @ORM\Table(name="`pic`")
 */
class Pic
{
  /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @Expose
    */
    private $id;

  /**
    * @var string
    *
    * @ORM\Column(name="title", type="text", nullable=true)
    */
  private $title;

  /**
    * @var string
    *
    * @ORM\Column(name="description", type="text", nullable=true)
    */
  private $description;

  /**
   * @var string
   * @ORM\Column(name="pictureaddress", type="text")
   */
  private $pictureAddress;
  /**
    * @var DateTime
    *
    * @ORM\Column(name="created_at", type="datetime")
    */
  private $createdAt;

  /**
    * @var DateTime
    *
    * @ORM\Column(name="updated_at", type="datetime")
    */
  private $updatedAt;

  /**
    * @ORM\ManyToOne(targetEntity="Picta\Entity\User", inversedBy="pics")
    */
  private $user;

  /**
    * @param User $user
    */
  public function __construct(User $user)
  {
      $this->user = $user;
  }

  /**
    * Get id.
    *
    * @return int
    */
  public function getId(): int
  {
      return $this->id;
  }

  /**
    * Get title.
    *
    * @return string
    */
  public function getTitle(): string
  {
      return $this->title;
  }

  /**
    * Set title.
    *
    * @param string $title
    *
    * @return Pic
    */
  public function setTitle($title): Pic
  {
      $this->title = $title;

      return $this;
  }

  /**
    * Get description.
    *
    * @return string
    */
  public function getDescription(): string
  {
      return $this->description;
  }

  /**
    * Set description.
    *
    * @param string $description
    *
    * @return Pic
    */
  public function setDescription(string $description): Pic
  {
      $this->description = $description;

      return $this;
  }

  /**
    * Get picture address.
    *
    * @return string
    */
   public function getPictureAddress(): string
   {
       return $this->pictureAddress;
   }

  /**
    * Set picture address.
    *
    * @param string $pictureAddress
    *
    * @return Pic
    */
  public function setPictureAddress(string $pictureAddress): Pic
    {
        $this->pictureAddress = $pictureAddress;

        return $this;
    }

  /**
    * Get date of creation.
    *
    * @return DateTime
    */
  public function getCreatedAt(): DateTime
  {
      return $this->createdAt;
  }

  /**
    * Get date of last update.
    *
    * @return DateTime
    */
   public function getUpdatedAt(): DateTime
   {
       return $this->updatedAt;
   }

    /**
      * @ORM\PrePersist
      * @ORM\PreUpdate
      */
    public function timestamps()
    {
        if (is_null($this->createdAt)) {
            $this->createdAt = new DateTime();
        }

        $this->updatedAt = new DateTime();
    }
}
