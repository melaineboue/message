<?php

/**
 * Created by PhpStorm.
 * User: Melaine
 * Date: 19/08/2017
 * Time: 14:55
 */
class DAO
{


    public  static $connexion;
    private static  $host="localhost";
    private static  $database_name="message";
    private static  $user="root";
    private static  $password="";




    public static function producePassword()
    {


        $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ@-_abcdefghijklmnopqrstuvwxyz0123456789";
        $password="";

        for($i=0;$i<10;$i++)
        {

            $nb=rand(0,strlen($letters)-1);
            $password.=$letters[$nb];

        }

        return $password;
    }


    public static function getConnection()
    {
        DAO::$connexion=new PDO('mysql:host='.DAO::$host.';dbname='.DAO::$database_name, DAO::$user, DAO::$password);
        return DAO::$connexion;
    }

}