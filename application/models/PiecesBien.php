<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PiecesBien
 *
 * @author DELL
 */
class PiecesBien extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function listerPiecesBien(){
        $sqlSelect="SELECT * FROM pieces ";
        $result=$this->db->query($sqlSelect);

        return $result;
    }
    
    public function getPiecesBien_ByLibelle($pieceBien_libelle){
        $sqlSelect="SELECT * FROM pieces WHERE PiecesLibelle LIKE ?";
        $resultRole=$this->db->query($sqlSelect, array("%".$pieceBien_libelle."%"));

        return $resultRole;
    }

    public function getPiecesBien_ByID($idPiecesBien){
        $sqlSelect="SELECT * FROM pieces WHERE idPieces=?";
        $result=$this->db->query($sqlSelect, array($idPiecesBien));

        return $result;
    }

}
