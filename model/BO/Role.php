

<?php

class Role
{
    private $personnage;
    private $acteur;
    private $idRole;

    public function __construct($idRole, string $personnage, Acteur $acteur )
    {
        $this->setPersonnage($personnage);
        $this->setActeur($acteur);
        $this->setIdRole($idRole);
    }

    public function getPersonnage()
    {
        return $this->personnage;
    }

    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Get the value of idRole
     */ 
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set the value of idRole
     *
     * @return  self
     */ 
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */ 
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Set the value of personnage
     *
     * @return  self
     */ 
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }
}

?>