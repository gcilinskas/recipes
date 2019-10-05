<?php

namespace App\Entity;

/**
 * Interface TimeEntityInterface
 */
interface TimeEntityInterface
{
    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime;

    /**
     * @param \DateTime $updatedAt
     *
     * @return TimeEntityInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt): TimeEntityInterface;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @param \DateTime $createdAt
     *
     * @return TimeEntityInterface
     */
    public function setCreatedAt(\DateTime $createdAt): TimeEntityInterface;
}
