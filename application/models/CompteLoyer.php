<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CompteLoyer
 *
 * @author DELL
 */
class CompteLoyer extends CI_Model {

    //put your code here
    public function getAllCompteLoyer() {
        $sqlSelectCompteLoyer = "select bien_idbien, idloyer, DATE_FORMAT(Loyer_datePaiement,'%d/%m%/%Y') as Loyer_datePaiement, REPLACE(FORMAT(Loyer_MontantVerse,0),',',' ') as Loyer_MontantVerse, moisannee_idMois
                                    from compteloyer, personne_loue_bien
                                    WHERE compteloyer.idlocation=personne_loue_bien.idlocation";
        $resultCompteLoyer = $this->db->query($sqlSelectCompteLoyer);

        return $resultCompteLoyer;
    }

    public function getAllCompteLoyerTrieAnnee($dateDebut, $dateFin) {
        $sqlSelectCompteLoyer = 'select bien_idbien, idloyer, REPLACE(FORMAT(Loyer_MontantVerse,0),","," ") as Loyer_MontantVerse, moisannee_idMois
                                    from compteloyer, personne_loue_bien
                                    WHERE compteloyer.idlocation=personne_loue_bien.idlocation
                                    AND (Loyer_datePaiement BETWEEN ? AND ?)';
        $resultCompteLoyer = $this->db->query($sqlSelectCompteLoyer, array($dateDebut, $dateFin));

        return $resultCompteLoyer;
    }

    public function getAllCompteLoyerTrieAnneeIdBien($dateDebut, $dateFin, $idBien) {
        $sqlSelectCompteLoyer = 'select bien_idbien, idloyer, REPLACE(FORMAT(Loyer_MontantVerse,0),","," ") as Loyer_MontantVerse, moisannee_idMois
                                    from compteloyer, personne_loue_bien
                                    WHERE compteloyer.idlocation=personne_loue_bien.idlocation
                                    AND (Loyer_datePaiement BETWEEN ? AND ?)
                                    AND bien_idbien=?';
        $resultCompteLoyer = $this->db->query($sqlSelectCompteLoyer, array($dateDebut, $dateFin, $idBien));

        return $resultCompteLoyer;
    }

    public function ReglerLoyer($dateDebut, $dateFin, $montant, $idMois, $numcheque, $idlocation, $typePaiement) {

        $requete = "INSERT INTO compteloyer(Loyer_dateDebutPeriode,Loyer_dateFinPeriode,
                    Loyer_MontantVerse,moisannee_idMois,Loyer_NumCheque,idlocation,typepaiement_idTypePaiement)
                    VALUES(?,?,?,?,?,?,?)
                    ";

        $resultset = $this->db->query($requete, array($dateDebut, $dateFin, $montant, $idMois, $numcheque, $idlocation, $typePaiement));
    }

}
