<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Depenses
 *
 * @author DJAMARA
 */
class Depenses extends CI_Model {
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    function insertDepenses($idBien,$idTypeTravaux,$Nom_Intervenant,$Contact_Intervenant,$Adresse_Intervenant,$Date_Travaux,$Montant_Travaux){
        
        $req = "INSERT INTO depenses SET idBien = ?,"
                . "idTypeTravaux = ? ,"
                . "Nom_Intervenant = ?,Contact_Intervenant = ? , Adresse_Intervenant = ? ,Date_Travaux = ?,Montant_Travaux = ?";
        
        $array = array($idBien,$idTypeTravaux,$Nom_Intervenant,$Contact_Intervenant,$Adresse_Intervenant,$Date_Travaux,$Montant_Travaux);
        $exeq = $this->db->query($req,$array);
        
        return $exeq;
    }
    
     public function listerDepenses() {
         
        $sql = "SELECT *, DATE_FORMAT(depenses.Date_Travaux,'%d%-%m%-%Y') as dateTrav FROM depenses,bien,typetravaux 
                where typetravaux.idTypeTravaux = depenses.idTypeTravaux and depenses.idbien = bien.idbien";

        $exeq = $this->db->query($sql);
        $exeq = $exeq->result();
        
        return $exeq;
    }
    
     public function getDepensesbyId($idDepense) {
         
        $sql = "SELECT *, DATE_FORMAT(depenses.Date_Travaux,'%d%-%m%-%Y') as dateTrav FROM depenses,bien,typetravaux 
                where typetravaux.idTypeTravaux = depenses.idTypeTravaux and depenses.idbien = bien.idbien and idDepenses = ?";

        $exeq = $this->db->query($sql,$idDepense);
        $exeq = $exeq->result();
        
        return $exeq;
    }
    
    function listTravaux(){
        
        $sql = "SELECT * FROM typetravaux";

        $exeq = $this->db->query($sql);
        $exeq = $exeq->result_array();
        
        return $exeq;
    }
}
