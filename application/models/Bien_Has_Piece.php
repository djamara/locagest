<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bien_Has_Piece
 *
 * @author DELL
 */
class Bien_Has_Piece extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function creerBienHasPiece($idBien, $idPersonneBien, $idTypeBien, $idPieceBien, $nbPiece, $superficie) {
        $sql="INSERT INTO bien_has_pieces(bien_idbien, bien_Personne_idPersonne, bien_TypeBien_idTypeBien, "
                . "Pieces_idPieces, NombrePiece, superficiePiece) VALUES(?, ?, ?, ?, ?, ?)";
        $exeq= $this->db->query($sql, array(
            $idBien,
            $idPersonneBien,
            $idTypeBien,
            $idPieceBien,
            $nbPiece,
            $superficie
        ));
        
        return $exeq;
    }
    
    public function supprimerBienHasPiece($idBien, $idPieceBien){
        $sql= "DELETE FROM bien_has_pieces WHERE bien_idbien=? AND Pieces_idPieces=?";
        
        $exeq= $this->db->query($sql, array(
            $idBien, $idPieceBien
        ));
        
        return $exeq;
    }
    
    public function supprimerBienHasPiece_ByIdBien($idBien){
        $sql= "DELETE FROM bien_has_pieces WHERE bien_idbien=?";
        
        $exeq= $this->db->query($sql, array(
            $idBien
        ));
        
        return $exeq;
    }
    
    public function listerBienHasPiece($idBien, $idPieceBien) {
        $sql="SELECT * FROM bien_has_pieces WHERE bien_idbien=? AND Pieces_idPieces=?";
        
        $exeq= $this->db->query($sql, array($idBien, $idPieceBien));
        
        return $exeq;
    }
    
    public function getBienHasPiece($idBien, $idPieceBien) {
        $sql="SELECT * FROM bien_has_pieces WHERE bien_idbien=? AND Pieces_idPieces=? ";
        
        $exeq= $this->db->query($sql, array($idBien, $idPieceBien));
        
        return $exeq;
    }
    public function getBienHasPiece_ByIdBien($idBien) {
        $sql="SELECT * FROM bien_has_pieces WHERE bien_idbien=? ";
        
        $exeq= $this->db->query($sql, array($idBien));
        
        return $exeq;
    }

}
