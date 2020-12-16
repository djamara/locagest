<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 07/02/2019
 * Time: 00:03
 */

class User extends CI_Model
{

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param  $Personne_idPersonne
     * @param  $login
     * @param  $Password
     * @param  $email
     * @param  $userIcon
     * @return Vrai ou Faux
     */
    public function creerUser($Personne_idPersonne, $login, $Password, $email, $userIcon){

        //Insertion dans la table USER
        $sqlInsertUser="INSERT INTO user(Personne_idPersonne, login, Password, email, userIcon) VALUES(?, ?, ?, ?, ?)";
        $resultUser=$this->db->query($sqlInsertUser, array($Personne_idPersonne, $login, $Password, $email, $userIcon));

        return $resultUser;
    }

    public function updateUser($Personne_idPersonne, $email){

        //Insertion dans la table USER
        $sqlInsertUser="UPDATE user SET email=? WHERE Personne_idPersonne=?";
        $resultUser=$this->db->query($sqlInsertUser, array($email, $Personne_idPersonne,));

        return $resultUser;
    }
    
    public function updateIcone($Personne_idPersonne, $userIcon){

        //Insertion dans la table USER
        $sqlInsertUser="UPDATE user SET userIcon=? WHERE Personne_idPersonne=?";
        $resultUser=$this->db->query($sqlInsertUser, array($userIcon, $Personne_idPersonne,));

        return $resultUser;
    }

    /**
     * @param  $login
     * @param  $Password
     * @return Un resultset contenant L'user avec les valeurs correspondantes (Parcourir pour prendre ce dont on a besoin)
     */
    public function getUser_ByLoginAndPassword($login, $Password){
        $sqlRechUser="SELECT * FROM user WHERE login=? AND password=?";
        $resultRechUser=$this->db->query($sqlRechUser, array($login, $Password));

        return $resultRechUser;
    }
    
    public function getUser_ByIdPersonne($idPersonne){
        $sqlRechUser="SELECT * FROM user WHERE Personne_idPersonne=?";
        $resultRechUser=$this->db->query($sqlRechUser, array($idPersonne));

        return $resultRechUser;
    }
}