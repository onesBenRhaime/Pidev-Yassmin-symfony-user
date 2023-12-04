<?php

namespace App\Entity;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User  implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mdp = null;

    #[ORM\Column(length: 255 ,type:"string", columnDefinition:"ENUM('Medecin', 'Coach', 'Client')")]
    private ?string $role = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): static
    {
        $this->age = $age;

        return $this;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->mail;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->mail;
    }

    

    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }
    public function getUserN(): string
    {
        return  $this->$username;
    }


    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->mdp;
    }
  /**
     * This method can be removed in Symfony 6.0 - is not needed for apps that do not check user passwords.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
    public function getMdp(): ?string
    {
        return $this->mdp;
    }
    public function setMdp(?string $mdp): static
    {
        $this->mdp = $mdp;
    
        return $this;
    }
   
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = [];
        
        if($this->role == 'Medecin'){
            $roles[] = 'ROLE_Medecin';
        }elseif($this->role == 'Client'){   
            $roles[] = 'ROLE_Client';
        }elseif($this->role == 'Coach'){   
            $roles[] = 'ROLE_Coach';
        }
        // guarantee every user at least has ROLE_USER

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        if($this->role == 'Medecin'){
            $roles[] = 'ROLE_Medecin';
        }elseif($this->role == 'Client'){   
            $roles[] = 'ROLE_Client';
        }elseif($this->role == 'Coach'){   
            $roles[] = 'ROLE_Coach';
        }
    
        $this->roles = $roles;
        return $this;
    }




    public function getRole(): ?string
    {
        return $this->role;

    }

    
    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }

   

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
