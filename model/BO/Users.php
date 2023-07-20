<?php

<<<<<<< HEAD
class Users{
    private $id;
    private $email;
    private $pw;

    public function __construct($id, $email, $pw){

        $this->setId($id);
        $this->setEmail($email);
        $this->setPw($pw);
=======
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
class Offres
{

    private $id;
    private $title;
    private $description;

    public function __construct($id, $title, $description)
    {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDescription($description);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
    }

    /**
     * Get the value of id
<<<<<<< HEAD
     */ 
=======
     */
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
<<<<<<< HEAD
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pw
     */ 
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * Set the value of pw
     *
     * @return  self
     */ 
    public function setPw($pw)
    {
        $this->pw = $pw;

        return $this;
    }
}


?>
=======
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
