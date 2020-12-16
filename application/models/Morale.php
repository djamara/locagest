<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Morale
 *
 * @author DELL
 */
class Morale extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function creerMorale($Personne_idPersonne, $DenomPers_Morale, $SiegePers_Morale) {
        //Requete d'insertion
        $sqlInsert = "INSERT INTO pers_morale(Personne_idPersonne, DenomPers_Morale, SiegePers_Morale) "
                . "VALUES(?, ?, ?) ";

        $result = $this->db->query($sqlInsert, array(
            $Personne_idPersonne,
            $DenomPers_Morale,
            $SiegePers_Morale
                )
        );

        return $result;
    }

    public function creerMoraleLocataire($Personne_idPersonne, $denomination, $numRc, $formeJurid, $contrib) {
        //Requete d'insertion
        $sqlInsert = "INSERT INTO pers_morale(Personne_idPersonne, DenomPers_Morale, RCCM_Morale, FomeJuridique_Morale, CompteContrib_Morale) "
                . "VALUES(?, ?, ?, ?, ?) ";

        $result = $this->db->query($sqlInsert, array(
            $Personne_idPersonne,
            $denomination,
            $numRc,
            $formeJurid,
            $contrib
                )
        );

        return $result;
    }

    public function modifierMoraleLocataire($Personne_idPersonne, $denomination, $numRc, $formeJurid, $contrib) {
        //Requete d'insertion
        $sqlInsert = "UPDATE pers_morale SET DenomPers_Morale=?, "
                . "RCCM_Morale=?, FomeJuridique_Morale=?, CompteContrib_Morale=? "
                . "WHERE Personne_idPersonne=?";

        $result = $this->db->query($sqlInsert, array(
            $denomination,
            $numRc,
            $formeJurid,
            $contrib,
            $Personne_idPersonne
                )
        );

        return $result;
    }

    public function getMorale_ByIDPersonne($Personne_idPersonne) {

        $sqlRech = "SELECT * FROM pers_morale WHERE Personne_idPersonne=? ORDER BY Personne_idPersonne DESC";
        $resultPersonne = $this->db->query($sqlRech, array($Personne_idPersonne));

        return $resultPersonne;
    }

}
