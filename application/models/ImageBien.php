<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageBien
 *
 * @author DELL
 */
class ImageBien extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function creerImageBien($imageLien, $idBien, $idPersonneBien, $idTypeBien, $description) {
        $sqlReq = "INSERT INTO images(ImagesLien, bien_idbien, bien_Personne_idPersonne"
                . ", bien_TypeBien_idTypeBien, ImagesDescription) VALUES(?, ?, ?, ?, ?)";

        $exeq = $this->db->query($sqlReq, array(
            $imageLien,
            $idBien,
            $idPersonneBien,
            $idTypeBien,
            $description
        ));

        return $exeq;
    }

    public function supprimerImage($idBien, $nomImage) {
        $sql = "DELETE FROM images WHERE bien_idbien=? AND ImagesLien=?";
        $exeq = $this->db->query($sql, array($idBien, $nomImage));

        return $exeq;
    }

    public function getImagesByIdBien($idBien) {
        $sql = "SELECT * FROM images WHERE bien_idbien=?";
        $exeq = $this->db->query($sql, array($idBien));

        return $exeq;
    }

}
