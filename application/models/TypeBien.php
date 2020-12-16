<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeBien
 *
 * @author DELL
 */
class TypeBien extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function listerTypeBien(){
        $sqlSelect="SELECT * FROM typebien ";
        $result=$this->db->query($sqlSelect);

        return $result;
    }
    
    public function getTypeBien_ByLibelle($typeBien_libelle){
        $sqlSelect="SELECT * FROM typebien WHERE TypeBienLibelle LIKE ?";
        $resultRole=$this->db->query($sqlSelect, array("%".$typeBien_libelle."%"));

        return $resultRole;
    }

    public function getTypeBien_ByID($idTypeBien){
        $sqlSelect="SELECT * FROM typebien WHERE idTypeBien=?";
        $result=$this->db->query($sqlSelect, array($idTypeBien));

        return $result;
    }

}
