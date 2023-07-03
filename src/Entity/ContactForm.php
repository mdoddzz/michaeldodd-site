<?php

namespace App\Entity;

use App\Repository\ContactFormRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactFormRepository::class)]
class ContactForm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\Column]
    private ?bool $requestCV = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
        $metadata->addPropertyConstraint('email', new NotBlank());
        $metadata->addPropertyConstraint('message', new NotBlank());
    }

    public function isRequestCV(): ?bool
    {
        return $this->requestCV;
    }

    public function setRequestCV(bool $requestCV): static
    {
        $this->requestCV = $requestCV;

        return $this;
    }

}
