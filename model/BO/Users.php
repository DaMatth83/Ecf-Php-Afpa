<?php

class Users{
    private $id;
    private $email;
    private $pw;

    public function __construct($id, $email, $pw){

        $this->setId($id);
        $this->setEmail($email);
        $this->setPw($pw);
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