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
    public $type;
    public $identifiant;


    public function __construct($nom,$prenom,$username,$name_messenger,$remaining_message,$email)
    {
        $this->setId(0);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setUsername($username);
        $this->setNameMessenger($name_messenger);
        $this->setRemainingMessage($remaining_message);
        $this->setEmail($email);
        $this->type='client';
        $this->identifiant="";
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


    public function setIdentifiant($id)
    {
        $this->identifiant=$id;
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


    public function getIdentifiant()
    {
        return $this->identifiant;
    }


    /**********************************************************************************************************************/
    /*******************************************************CONTACTS****************************************************/
    /**********************************************************************************************************************/
    public function getContact()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("SELECT * FROM contact WHERE id_user=:id_user");
        $requete->bindValue(':id_user',$this->getId());
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getGroup()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            (SELECT g.nom_groupe,g.id_groupe,COUNT(*) as nombre FROM contact_groupe cg, groupe g WHERE cg.id_groupe=g.id_groupe AND id_user=:id_user GROUP BY cg.id_groupe)
            UNION
            (SELECT nom_groupe,id_groupe, 0 as nombre FROM groupe WHERE id_groupe NOT IN (SELECT id_groupe FROM contact_groupe))
            
            ");
        $requete->bindValue(':id_user',$this->getId());
        $requete->execute();
        return $requete->fetchAll();
    }

    /**********************************************************************************************************************/

    function register($id_type,$password)
    {
        $autorisation=$this->autorise_inscription();
        $connexion=DAO::getConnection();

        if($autorisation['isAllowed']==1)
        {

                $requete=$connexion->prepare("
					INSERT INTO users(nom, user_name, email, password, name_messenger, id_type) 
					VALUES (:nom, :user_name, :email, :password, :name_messenger, :id_type)
					");

                $requete->bindValue(':nom', utf8_decode($this->nom), PDO::PARAM_STR);
                $requete->bindValue(':user_name', $this->username, PDO::PARAM_STR);
                $requete->bindValue(':email', $this->email, PDO::PARAM_STR);
                $requete->bindValue(':password', $password, PDO::PARAM_STR);
                $requete->bindValue(':name_messenger', $this->username, PDO::PARAM_STR);
                $requete->bindValue(':id_type', $id_type, PDO::PARAM_INT);
                $requete->execute();

                $this->id=$connexion->lastInsertId();
        }

        echo $autorisation['isAllowed']."/".$autorisation['message']."/".$this->id;
    }



    function getNumberMessageSent()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            SELECT * FROM message WHERE id_user=:id_user
        ");

        $requete->bindValue(':id_user',$this->id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->rowCount();
    }


    function getRechargement()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            SELECT SUM(quantite) as quantite FROM rechargement WHERE id_user=:id_user
        ");

        $requete->bindValue(':id_user',$this->id,PDO::PARAM_INT);
        $requete->execute();
        $reponse=$requete->fetch();
        return (trim($reponse['quantite'])!="")?$reponse['quantite']:0;

    }

    /**********************************************************************************************************************/

    function getNumberMessageSentToday()
    {
        $connexion=DAO::getConnection();
        $requete=$connexion->prepare("
            SELECT * FROM message WHERE id_user=:id_user AND DATE(date_envoi)=DATE(NOW())
        ");

        $requete->bindValue(':id_user',$this->id,PDO::PARAM_INT);
        $requete->execute();
        return $requete->rowCount();
    }

/**********************************************************************************************************************/

/**********************************************************************************************************************/

    public function autorise_inscription()
    {

        $texte=array('isAllowed'=>0, 'message'=>'');
        $connexion=DAO::getConnection();

        //quand le mail est correcte
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            //on verifie si l'email n'existe pas encore
            $requete=$connexion->prepare("
							SELECT * FROM users 
							WHERE 
							email=:email
			");

            $requete->bindValue(':email', $this->email, PDO::PARAM_STR);
            $requete->execute();

            //sil'email n'existe pas encore
            if($requete->rowCount()==0)
            {

                $requete_username=$connexion->prepare("
                                SELECT * FROM users 
                                WHERE 
                                user_name=:username
                ");

                $requete_username->bindValue(':username', $this->username, PDO::PARAM_STR);
                $requete_username->execute();

                if($requete_username->rowCount()==0)
                    {
                        //est Autorisé à s'inscrire
                        $texte['message']="Inscription réussie";
                        $texte['isAllowed']=1;
                    }
                    else
                    {

                        $texte['message']="username_already_used";
                        $texte['isAllowed']=0;
                    }
             }
             else
             {
                    //le nombre d'inscription a atteint le nombre max d'inscription / jour
                    $texte['message']="email_used";
                    $texte['isAllowed']=0;
             }
        }
        else
        {
            $texte['message']="email_non_valide";
            $texte['isAllowed']=0;
        }



        return $texte;

    }



}