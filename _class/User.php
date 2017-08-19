<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 15:56
 */
class User
{
    public $id;
    public $nom;
    public $prenom;
    public $username;
    public $name_messenger;
    public $remaining_message;
    public $email;


    public function __construct($id,$nom,$prenom,$username,$name_messenger,$remaining_message,$email)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setUsername($username);
        $this->setNameMessenger($name_messenger);
        $this->setRemainingMessage($remaining_message);
        $this->setEmail($email);
    }


    /***************SETTER*****************/
    public function setId($id)
    {
        $this->id=$id;
    }


    public function setNom($nom)
    {
        $this->nom=$nom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom=$prenom;
    }


    public function setUsername($username)
    {
        $this->username=$username;
    }



    public function setNameMessenger($name_messenger)
    {
        $this->name_messenger=$name_messenger;
    }



    public function setRemainingMessage($remaining_message)
    {
        $this->remaining_message=$remaining_message;
    }


    public function setEmail($email)
    {
        $this->email=$email;
    }





    /***************GETTER*****************/
    public function getId()
    {
        return $this->id;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function getUsername()
    {
        return $this->username;
    }



    public function getNameMessenger()
    {
        return $this->name_messenger;
    }



    public function getRemainingMessage()
    {
        return $this->remaining_message;
    }


    public function getEmail()
    {
        return $this->email;
    }

}