<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Immeuble
 *
 * @author DELL
 */
class Immeuble extends CI_Model {

    //put your code here
    function __construct() {
        
    }

    public function creerImmeuble($nom, $adresse, $superficie, $dateConstruction, $description) {
        $sql = "INSERT INTO Immeubles(NomImmeubles, AdresseImmeubles, SuperficieImmeubles, "
                . "DateConstructImmeubles, DescriptionImmeubles) VALUES(?, ?, ?, ?, ?)";
        $exeq = $this->db->query($sql, array(
            $nom,
            $adresse,
            $superficie,
            $dateConstruction,
            $description));

        return $exeq;
    }

    public function supprimerImmeuble($idImmeuble) {
        $sql = "DELETE FROM immeubles WHERE idImmeubles=?";

        $exeq = $this->db->query($sql, array(
            $idImmeuble
        ));

        return $exeq;
    }

    public function listerImmeuble($idPersonne) {
        $sql = "SELECT * FROM immeubles WHERE idImmeubles=? ";

        $exeq = $this->db->query($sql, array($idPersonne));

        return $exeq;
    }

    public function getImmeubleCreer($idPersonne, $nom, $adresse, $superficie, $dateConstruction, $description) {
        $sql = "SELECT * FROM immeubles WHERE personne_idPersonne=? AND NomImmeubles=? AND AdresseImmeubles=? AND SuperficieImmeubles=? AND "
                . "DateConstructImmeubles=? AND DescriptionImmeubles=?";
        $exeq = $this->db->query($sql, array(
            $idPersonne,
            $nom,
            $adresse,
            $superficie,
            $dateConstruction,
            $description));

        return $exeq;
    }

    public function getImmeuble($idImmeuble) {
        $sql = "SELECT * FROM immeubles WHERE idImmeubles=? ";

        $exeq = $this->db->query($sql, array($idImmeuble));

        return $exeq;
    }

}
