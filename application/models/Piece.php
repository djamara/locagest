<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 08/02/2019
 * Time: 02:39
 */

class Piece extends CI_Model {

    /**
     * Piece constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getPiece(){
        $sqlSelectRole="SELECT * FROM typepiece ";
        $resultRole=$this->db->query($sqlSelectRole);

        return $resultRole;
    }

    public function getPieceLibelle(){
        $sqlSelectRole="SELECT TypePieceLibelle FROM typepiece ";
        $resultRole=$this->db->query($sqlSelectRole);

        return $resultRole;
    }

    public function getPiece_ByID($idPiece){
        $sqlSelectRoleProprietaire="SELECT * FROM typepiece WHERE idTypePiece=?";
        $resultRole=$this->db->query($sqlSelectRoleProprietaire, array($idPiece));

        return $resultRole;
    }

    public function getPiece_ByLibelle($piece_libelle){
        $sqlSelectRoleProprietaire="SELECT * FROM typepiece WHERE TypePieceLibelle LIKE ?";
        $resultRole=$this->db->query($sqlSelectRoleProprietaire, array("%".$piece_libelle."%"));

        return $resultRole;
    }
}