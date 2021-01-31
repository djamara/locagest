<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bien
 *
 * @author DELL
 */
class Bien extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function creerBien($idAgence,$libelle, $localisation, $dateCreation, $nomProprietaire, $idPersonne, $idTypeBien, $idImmeuble, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charges, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentreiImpot, $adresse1CentreImpot, $adresse2CentreImpot, $codePostale, $ville, $description, $notes, $libAssurance, $dateSouscriptionAssurance, $dateEcheanceAssurance) {

        $sql = "INSERT INTO bien(idAgence,bienLibelle, bienLocalisation, bienDateCreation, bienNomProprietaire, "
                . "Personne_idPersonne, TypeBien_idTypeBien, Immeubles_idImmeubles, "
                . "feuilleCadastrale, parcelleCadastrale, categorieCadastrale, valeurLocataiveCadastrale, lot,"
                . "millieme, parking, autresDependance, cave, typeLocation, loyerHC, charges, taxeHabitation,"
                . "taxeFonciere, dateAcquisition, prixAcquisition, fraisAcquisition, nomCentreiImpot,"
                . "adresse1CentreImpot, adresse2CentreImpot, codePostale, ville, description,"
                . "notes, libAssurance, dateSouscriptionAssurance, dateEcheanceAssurance) 
                VALUES(? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $exeq = $this->db->query($sql, array(
			$idAgence,
            $libelle,
            $localisation,
            $dateCreation,
            $nomProprietaire,
            $idPersonne,
            $idTypeBien,
            $idImmeuble,
            $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale,
            $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charges,
            $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition,
            $nomCentreiImpot, $adresse1CentreImpot, $adresse2CentreImpot, $codePostale, $ville,
            $description, $notes, $libAssurance, $dateSouscriptionAssurance, $dateEcheanceAssurance
        ));

        return $exeq;
    }

    public function modifierBien($libelle, $localisation, $dateCreation, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charges, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentreiImpot, $adresse1CentreImpot, $adresse2CentreImpot, $codePostale, $ville, $description, $notes, $libAssurance, $dateSouscriptionAssurance, $dateEcheanceAssurance, $nomProprietaire, $idPersonne, $idBien, $idImmeuble) {

        $sql = "UPDATE bien SET bienLibelle=?, bienLocalisation=?, bienDateCreation=?, "
                . "feuilleCadastrale=?, parcelleCadastrale=?, categorieCadastrale=?, valeurLocataiveCadastrale=?, lot=?,"
                . "millieme=?, parking=?, autresDependance=?, cave=?, typeLocation=?, loyerHC=?, charges=?, taxeHabitation=?,"
                . "taxeFonciere=?, dateAcquisition=?, prixAcquisition=?, fraisAcquisition=?, nomCentreiImpot=?,"
                . "adresse1CentreImpot=?, adresse2CentreImpot=?, codePostale=?, ville=?, description=?,"
                . "notes=?, libAssurance=?, dateSouscriptionAssurance=?, dateEcheanceAssurance=?, bienNomProprietaire=?, "
                . "Personne_idPersonne=?, Immeubles_idImmeubles=? "
                . "WHERE idbien= ?";

		//$sql = "UPDATE bien SET bienLibelle = ? WHERE bien.idbien= ?";

        $exeq = $this->db->query($sql, array(
            $libelle,
            $localisation,
            $dateCreation,
            $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale,
            $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charges,
            $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition,
            $nomCentreiImpot, $adresse1CentreImpot, $adresse2CentreImpot, $codePostale, $ville,
            $description, $notes, $libAssurance, $dateSouscriptionAssurance, $dateEcheanceAssurance,
            $nomProprietaire, $idPersonne, $idImmeuble,
			$idBien
        ));

        return $exeq;
    }

    public function supprimerBien($idBien) {
        $sql = "DELETE FROM bien WHERE idbien=?";

        $exeq = $this->db->query($sql, array(
            $idBien
        ));

        return $exeq;
    }

    public function listerBien($idAgence) {
        /*$sql = "SELECT * FROM bien,personne_loue_bien
                WHERE bien.Personne_idPersonne IN 
                (SELECT Personne_idPersonne FROM personne_has_role WHERE idAgence = ?)
                AND bien.idbien = personne_loue_bien.bien_idbien";
        */
		$sql = "SELECT * FROM bien
				INNER JOIN personne_has_role ON bien.Personne_idPersonne = personne_has_role.Personne_idPersonne
				AND personne_has_role.idAgence = ? and bien.topActif != 0";
        $exeq = $this->db->query($sql, array($idAgence));

        return $exeq;
    }

    public function getBien($libelle, $localisation, $dateCreation, $nomProprietaire) {
        $sql = "SELECT * FROM bien WHERE bienLibelle=? AND bienLocalisation=? AND bienDateCreation=?"
                . " AND bienNomProprietaire=? ";

        $exeq = $this->db->query($sql, array(
            $libelle,
            $localisation,
            $dateCreation,
            $nomProprietaire));

        return $exeq;
    }

    public function ListBienPasLoue($libelle, $localisation, $dateCreation, $nomProprietaire) {
        $sql = "select * from bien where bien.idbien not in (select personne_loue_bien.bien_idbien from personne_loue_bien)";

        $exeq = $this->db->query($sql);

        return $exeq;
    }

    public function listerBienJoinTypeBien() {

        $sql = "SELECT * FROM bien, typebien WHERE TypeBien_idTypeBien = idTypeBien ";
        $exeq = $this->db->query($sql);

        return $exeq;
    }

    public function listerBienPasLoueJoinTypeBien() {

        $sql = "SELECT * FROM bien, typebien WHERE TypeBien_idTypeBien = idTypeBien "
                . "and bien.idbien not in "
                . "(select personne_loue_bien.bien_idbien from personne_loue_bien where top_validite = 0)";
        $exeq = $this->db->query($sql);

        return $exeq;
    }

    public function getBien_ByID($idBien) {
        $sql = "SELECT * FROM bien,typebien WHERE TypeBien_idTypeBien = idTypeBien and idbien=? ";

        $exeq = $this->db->query($sql, array($idBien));

        return $exeq;
    }

    public function getNbBien($idAgence) {
        $sql = "select COUNT(idbien) as nbBien from bien where idAgence = ?";

        $resultNbBien = $this->db->query($sql,array($idAgence));
        foreach ($resultNbBien->result() as $row) {
            $retour = $row->nbBien;
        }

        return $retour;
    }

    public function listerBienImmeubleCreation($idAgence) {
        $sql = "SELECT bien.idbien, bien.bienLibelle, bien.Immeubles_idImmeubles FROM bien "
                . "WHERE ISNULL(bien.Immeubles_idImmeubles) "
                . "AND bien.Personne_idPersonne IN (SELECT Personne_idPersonne FROM personne_has_role WHERE idAgence=?)";

        $exeq = $this->db->query($sql, array($idAgence));

        return $exeq;
    }

    public function listerBienImmeuble($idImmeuble, $idAgence) {
        $sql = "SELECT bien.idbien, bien.bienLibelle, bien.Immeubles_idImmeubles FROM bien WHERE ISNULL(bien.Immeubles_idImmeubles) 
                AND bien.Personne_idPersonne IN (SELECT Personne_idPersonne FROM personne_has_role WHERE idAgence=?) 
                UNION
                SELECT bien.idbien, bien.bienLibelle, bien.Immeubles_idImmeubles FROM bien WHERE bien.Immeubles_idImmeubles=?  
                AND bien.Personne_idPersonne IN (SELECT Personne_idPersonne FROM personne_has_role WHERE idAgence=?)";

        $exeq = $this->db->query($sql, array($idAgence, $idImmeuble, $idAgence));

        return $exeq;
    }

    public function deleteIdImmeuble($idImmeuble) {
        $sql = "UPDATE bien SET Immeubles_idImmeubles=null WHERE Immeubles_idImmeubles=?";

        $result = $this->db->query($sql, array($idImmeuble));

        return $result;
    }

    public function updateIdImmeuble($idImmeuble, $idBien) {
        $sql = "UPDATE bien SET Immeubles_idImmeubles=? WHERE idbien=?";

        $result = $this->db->query($sql, array($idImmeuble, $idBien));

        return $result;
    }

    public function deleteBien($idBien) {
        $sql = "UPDATE bien SET topActif = 0 WHERE idbien=?";

        $result = $this->db->query($sql, array($idBien));

        return $result;
    }
    
    public function getProprietaireBien($idBien) {
        $sql = "SELECT * from personne, persphys, bien "
                . "where bien.Personne_idPersonne=personne.idPersonne "
                . "and persphys.Personne_idPersonne=personne.idPersonne "
                . "and bien.idbien=?";

        $result = $this->db->query($sql, array($idBien));

        return $result;
    }
    
}
