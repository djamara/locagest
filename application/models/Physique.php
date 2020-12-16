<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/02/2019
 * Time: 23:29
 */

class Physique extends CI_Model
{

    /**
     * Physique constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param  $Personne_idPersonne
     * @param  $TypePiece_idTypePiece
     * @param  $Nom_PersPhys
     * @param  $Prenom_PersPhys
     * @param  $DateNaiss_PersPhys
     * @param  $LieuNaiss_PersPhys
     * @param  $SexePersPhys
     * @return Vrai ou Faux
     */
    public function creerPhysique($Personne_idPersonne, $TypePiece_idTypePiece, $Nom_PersPhys, $Prenom_PersPhys,
                                  $DateNaiss_PersPhys, $LieuNaiss_PersPhys, $SexePersPhys){

        //Insertion dans la table Physique
        $sqlInsertPhys="INSERT INTO persphys(Personne_idPersonne, TypePiece_idTypePiece, Nom_PersPhys, Prenom_PersPhys,
                        DateNaiss_PersPhys, LieuNaiss_PersPhys, SexePersPhys) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $resultPhys= $this->db->query($sqlInsertPhys,
            array(
                $Personne_idPersonne,
                $TypePiece_idTypePiece,
                $Nom_PersPhys,
                $Prenom_PersPhys,
                $DateNaiss_PersPhys,
                $LieuNaiss_PersPhys,
                $SexePersPhys
            )
        );

        return $resultPhys;
    }

    public function updatePhysique($Personne_idPersonne, $TypePiece_idTypePiece, $Nom_PersPhys, $Prenom_PersPhys,
                                  $DateNaiss_PersPhys, $LieuNaiss_PersPhys, $SexePersPhys, $numpiece){

        //Insertion dans la table Physique
        $sqlInsertPhys="UPDATE persphys SET TypePiece_idTypePiece=?, Nom_PersPhys=?, Prenom_PersPhys=?,
                        DateNaiss_PersPhys=?, LieuNaiss_PersPhys=?, SexePersPhys=?, numpiece=? WHERE Personne_idPersonne=?";
        $resultPhys= $this->db->query($sqlInsertPhys,
            array(
                $TypePiece_idTypePiece,
                $Nom_PersPhys,
                $Prenom_PersPhys,
                $DateNaiss_PersPhys,
                $LieuNaiss_PersPhys,
                $SexePersPhys,
                $numpiece,
                $Personne_idPersonne
            )
        );

        return $resultPhys;
    }

    /**
     * @param $Personne_idPersonne
     * @return Un resultset contenant la/les personnes physiques trouvées
     */
    public function getPhysique_ByIDPersonne($Personne_idPersonne){

        //$sqlRech="SELECT * FROM persphys WHERE Personne_idPersonne=? ORDER BY Personne_idPersonne DESC";
        $sqlRech="SELECT * FROM personne LEFT JOIN persphys ON personne.idPersonne = persphys.Personne_idPersonne
				  LEFT JOIN pers_morale ON personne.idPersonne = pers_morale.Personne_idPersonne 
				  WHERE personne.idPersonne = ?";
        $resultPersonne=$this->db->query($sqlRech, array($Personne_idPersonne));

        return $resultPersonne;
    }
}
