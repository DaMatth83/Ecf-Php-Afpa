<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Offres
 *
 * @author Vince
 */
class Film
{
    private $id;
    private $title;
    private $realisateur;
    private $affiche;
    private $annee;
    private $roles;

    public function __construct($id, $title, $realisateur, $affiche, $annee)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setRealisateur($realisateur);
        $this->setAffiche($affiche);
        $this->setAnnee($annee);
        $this->roles = array();
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getRealisateur()
    {
        return $this->realisateur;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of affiche
     */ 
    public function getAffiche()
    {
        return $this->affiche;
    }

    /**
     * Set the value of affiche
     *
     * @return  self
     */ 
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;

        return $this;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

 public function addRole(Role $role)
    {
        $this->roles[] = $role;
    }

    public function getRoles()
    {
        return $this->roles;
    }
}
