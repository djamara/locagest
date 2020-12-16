<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CaracteristiquesBien
 *
 * @author DELL
 */
class CaracteristiquesBien extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function listerCaracteristiquesBiens(){
        $sqlSelect="SELECT * FROM caracteristiquesbiens ";
        $result=$this->db->query($sqlSelect);

        return $result;
    }
    
    public function getCaracteristiquesBiens_ByLibelle($typeBien_libelle){
        $sqlSelect="SELECT * FROM caracteristiquesbiens WHERE CaracteristiquesLibelle LIKE ?";
        $resultRole=$this->db->query($sqlSelect, array("%".$typeBien_libelle."%"));

        return $resultRole;
    }

    public function getCaracteristiquesBiens_ByID($idCaracteristiquesBiens){
        $sqlSelect="SELECT * FROM caracteristiquesbiens WHERE idCaracteristiquesBiens=?";
        $result=$this->db->query($sqlSelect, array($idCaracteristiquesBiens));

        return $result;
    }

}
