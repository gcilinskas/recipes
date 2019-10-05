<?php

namespace App\Entity\Traits;

use App\Entity\TimeEntityInterface;

/**
 * Class TimeEntityTrait
 */
class TimeEntityTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     *
     * @return TimeEntityInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt): TimeEntityInterface
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return TimeEntityInterface
     */
    public function setCreatedAt(\DateTime $createdAt): TimeEntityInterface
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
