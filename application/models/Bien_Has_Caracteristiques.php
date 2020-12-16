<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bien_Hhas_Caracteristiques
 *
 * @author DELL
 */
class Bien_Has_Caracteristiques extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function creerBienHasCarateristiques($idBien, $idPersonneBien, $idTypeBien, $idCaracteristiquesBien) {
        $sql="INSERT INTO bien_has_caracteristiquesbiens(bien_idbien, bien_Personne_idPersonne, bien_TypeBien_idTypeBien, "
                . "CaracteristiquesBiens_idCaracteristiquesBiens) VALUES(?, ?, ?, ?)";
        $exeq= $this->db->query($sql, array(
            $idBien,
            $idPersonneBien,
            $idTypeBien,
            $idCaracteristiquesBien));
        
        return $exeq;
    }
    
    public function supprimerBienHasCarateristiques($idBien, $idCaracteristiquesBien){
        $sql= "DELETE FROM bien_has_caracteristiquesbiens WHERE bien_idbien=? AND CaracteristiquesBiens_idCaracteristiquesBiens=?";
        
        $exeq= $this->db->query($sql, array(
            $idBien, $idCaracteristiquesBien
        ));
        
        return $exeq;
    }
    
    public function supprimerBienHasCarateristiques_ByIdBien($idBien){
        $sql= "DELETE FROM bien_has_caracteristiquesbiens WHERE bien_idbien=?";
        
        $exeq= $this->db->query($sql, array(
            $idBien
        ));
        
        return $exeq;
    }
    
    public function listerBienHasCarateristiques($idBien) {
        $sql="SELECT * FROM bien_has_caracteristiquesbiens WHERE bien_idbien=?";
        
        $exeq= $this->db->query($sql, array($idBien));
        
        return $exeq;
    }
    
    public function getBienHasCarateristiques($idBien, $idCaracteristiquesBien) {
        $sql="SELECT * FROM bien_has_caracteristiquesbiens WHERE bien_idbien=? AND CaracteristiquesBiens_idCaracteristiquesBiens=? ";
        
        $exeq= $this->db->query($sql, array($idBien, $idCaracteristiquesBien));
        
        return $exeq;
    }

}
