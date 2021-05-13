<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(
 * fields = {"email"},
 * message="L'Email que vous avez indiquez existe déja"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Email()
     */
    private $email;

    

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\Length(min="8" , minMessage="Votre mot de passe doit faire au minimum 8 caracteres")
     * @Assert\EqualTo(propertyPath="confirm_password" , message="vous devez ecrire le meme message")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password" , message="vous devez ecrire le meme message")
     */
    public $confirm_password;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): string
    {
        return (string) $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): self
    {
        $this->User = $User;

        return $this;
    }



    public function eraseCredentials(){

    }

    public function getSalt(){

    }

    public function getRoles(){
        return ['ROLE_USER'];
    }

    public function __toString()
    {
        return $this->getUsername();
    }
    
}