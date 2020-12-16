<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locations
 *
 * @author DJAMARA
 */
class Locations extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    public function InsererLocation($idLocataire, $idBien,$datedebut,
                $datefin,$montantavance,$montantannexe,$montantcaution,$totalMontant){
        
        $requete = 'INSERT INTO personne_loue_bien(Personne_idPersonne,bien_idbien,'
                . 'dateDebutlocation,dateFinLocation,montantAvance,montantCaution,montantAnnexe,montantTotal) '
                . 'VALUES (?,?,?,?,?,?,?,?)';
        $resultset = $this->db->query($requete,array($idLocataire, $idBien,$datedebut,
                $datefin,$montantavance,$montantcaution,$montantannexe,$totalMontant));
        
        return $resultset;
    }
    
    public function UpdateLocation($idLocataire, $idBien,$datedebut,
                $datefin,$montantavance,$montantannexe,$montantcaution,$totalMontant){
        
        $requete = 'UPDATE personne_loue_bien '
                . 'SET personne_loue_bien.Personne_idPersonne = ?, '
                . 'dateDebutlocation = ?,dateFinLocation = ?,montantAvance = ?,montantCaution = ?,'
                . 'montantAnnexe = ? , montantTotal = ? '
                . 'WHERE bien_idbien = ?';
        
        $resultset = $this->db->query($requete,array($idLocataire,$datedebut,
                $datefin,$montantavance,$montantannexe,$montantcaution,$totalMontant,$idBien));
        
        return $resultset;
    }
    
    public function getAllLocation(){
        
        /*$requete = "SELECT * FROM bien,typebien,persphys,personne_loue_bien,personne
        WHERE bien.idbien = personne_loue_bien.bien_idbien
        AND bien.TypeBien_idTypeBien = typebien.idTypeBien
        AND personne.idPersonne = personne_loue_bien.Personne_idPersonne
        AND persphys.Personne_idPersonne = personne_loue_bien.Personne_idPersonne
        AND personne_loue_bien.top_validite = 1";*/
		$requete = "SELECT *, 
					(SELECT CONCAT(persphys.Nom_PersPhys,' ',persphys.Prenom_PersPhys) 
						FROM persphys WHERE persphys.Personne_idPersonne = personne_loue_bien.Personne_idPersonne ) AS nomPhy,
					(SELECT pers_morale.DenomPers_Morale 
						FROM pers_morale WHERE pers_morale.Personne_idPersonne = personne_loue_bien.Personne_idPersonne) AS nomMorale,
					(SELECT if((nomPhy='NULL'OR nomPhy=''),nomMorale,nomPhy) ) AS nom
					FROM personne_loue_bien
					INNER JOIN bien ON personne_loue_bien.bien_idbien = bien.idbien
					INNER JOIN typebien ON typebien.idTypeBien = bien.TypeBien_idTypeBien
					INNER JOIN personne ON personne.idPersonne = personne_loue_bien.Personne_idPersonne";
        
        $resultset = $this->db->query($requete);
        
        return $resultset;
    }
    
    public function getAllLocationbyId($idlocation){
        
        /*$requete = "SELECT * FROM bien,persphys,personne_loue_bien,personne,typebien
        WHERE bien.idbien = personne_loue_bien.bien_idbien
        AND personne.idPersonne = personne_loue_bien.Personne_idPersonne
        AND persphys.Personne_idPersonne = personne_loue_bien.Personne_idPersonne
        AND typebien.idTypeBien = bien.TypeBien_idTypeBien
        AND personne_loue_bien.idlocation = ?
        AND personne_loue_bien.top_validite = 1";*/
		$requete = "SELECT *, 
					(SELECT CONCAT(persphys.Nom_PersPhys,' ',persphys.Prenom_PersPhys) 
						FROM persphys WHERE persphys.Personne_idPersonne = personne_loue_bien.Personne_idPersonne ) AS nomPhy,
					(SELECT pers_morale.DenomPers_Morale 
						FROM pers_morale WHERE pers_morale.Personne_idPersonne = personne_loue_bien.Personne_idPersonne) AS nomMorale,
					(SELECT if((nomPhy='NULL'OR nomPhy=''),nomMorale,nomPhy) ) AS nom
					FROM personne_loue_bien
					INNER JOIN bien ON personne_loue_bien.bien_idbien = bien.idbien
					INNER JOIN typebien ON typebien.idTypeBien = bien.TypeBien_idTypeBien
					INNER JOIN personne ON personne.idPersonne = personne_loue_bien.Personne_idPersonne
					WHERE personne_loue_bien.idlocation = ?";
        
        $resultset = $this->db->query($requete,array($idlocation));
        
        return $resultset;
    }
    
    public function supprimerLocationbyId($idlocation){
        
        $requete = "UPDATE personne_loue_bien SET personne_loue_bien.top_validite = 0"
                . " WHERE personne_loue_bien.idlocation = ?";
        
        $resultset = $this->db->query($requete,array($idlocation));
        
        return $resultset;
    }
    
      public function getNbLocation() {
        $sql = "select COUNT(idlocation) as nbLocation from personne_loue_bien WHERE topValideLocation=1";

        $resultNbLocation = $this->db->query($sql);

        foreach ($resultNbLocation->result() as $row) {
            $retour = $row->nbLocation;
        }

        return $retour;
    }
}
