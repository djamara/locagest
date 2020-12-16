<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupeBien
 *
 * @author DELL
 */
class GroupeBien extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function creerGroupeBien($idPersonne, $nom, $adresse, $superficie, $dateCreation, $description) {
        $sql = "INSERT INTO immeubles(personne_idPersonne, NomImmeubles, AdresseImmeubles, SuperficieImmeubles, "
                . "DateConstructImmeubles, DescriptionImmeubles) "
                . "VALUES(?, ?, ?, ?, ?, ?)";

        $exeq = $this->db->query($sql, array(
            $idPersonne,
            $nom,
            $adresse,
            $superficie,
            $dateCreation,
            $description
        ));

        return $exeq;
    }
    
    public function modifierGroupeBien($idPersonne, $nom, $adresse, $superficie, $dateCreation, $description, $idImmeuble) {
        $sql = "UPDATE immeubles SET personne_idPersonne=?, NomImmeubles=?, AdresseImmeubles=?, "
                . "SuperficieImmeubles=?, "
                . "DateConstructImmeubles=?, DescriptionImmeubles=? WHERE idImmeubles=? ";

        $exeq = $this->db->query($sql, array(
            $idPersonne,
            $nom,
            $adresse,
            $superficie,
            $dateCreation,
            $description,
            $idImmeuble
        ));

        return $exeq;
    }

    public function listerGroupeBien($idAgence) {
        $sql = "SELECT * FROM immeubles WHERE personne_idPersonne IN (SELECT Personne_idPersonne FROM personne_has_role WHERE idAgence=?)";
        $exeq = $this->db->query($sql, array($idAgence));

        return $exeq;
    }

    public function getImmeuble_byID($idImmeuble) {
        $sql = "SELECT * FROM immeubles WHERE idImmeubles=?";

        $exeq = $this->db->query($sql, array($idImmeuble));
        return $exeq;
    }

}
