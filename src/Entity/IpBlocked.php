<?php

namespace App\Entity;

use App\Repository\IpBlockedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IpBlockedRepository::class)
 */
class IpBlocked
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
        /**
     * @ORM\Column(type="string", length=255)
     */
    private string $ipAddress;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $blockedAt;

    public function __construct(string $ipAddress)
    {
        date_default_timezone_set('Africa/Lagos');
        $this->ipAddress = $ipAddress;
        $this->blockedAt = new \DateTimeImmutable('now');
    }
    
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getBlockedAt(): ?\DateTimeImmutable
    {
        return $this->blockedAt;
    }

    public function setBlockedAt(\DateTimeImmutable $blockedAt): self
    {
        $this->blockedAt = $blockedAt;

        return $this;
    }

}
