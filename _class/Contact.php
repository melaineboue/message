<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 15/08/2017
 * Time: 16:28
 */
class Contact
{

    public $id;
    public $name;
    public $number;
    public $owner;

    public function __construct($name,$number,$owner)
    {
        $this->id=0;
        $this->name=$name;
        $this->number=$number;
        $this->owner=$owner;
    }



    /************SETTER****************/
    public function setId($id)
    {
        $this->id=$id;
    }

    public function setName($iname)
    {
        $this->name=$iname;
    }

    public function setNumber($number)
    {
        $this->number=$number;
    }

    public function setOwner($owner)
    {
        $this->owner=$owner;
    }


    /************GETTER****************/
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getOwner()
    {
        return $this->owner;
    }








}