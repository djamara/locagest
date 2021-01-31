<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/02/2019
 * Time: 23:59
 */
class Personne_has_role extends CI_Model {

    /**
     * Personne_has_role constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param $Personne_idPersonne
     * @param $role_idrole
     * @return Vrai ou Faux
     */
    public function creerPersonneHasRole($Personne_idPersonne, $role_idrole,$idAgence) {

        $sqlInsertPersonneRole = "INSERT INTO personne_has_role(Personne_idPersonne, role_idrole,idAgence) VALUES(?,?,?)";
        $resultPersRole = $this->db->query($sqlInsertPersonneRole, array($Personne_idPersonne, $role_idrole,$idAgence));

        return $resultPersRole;
    }
    
    public function setIdAgence($idAgence, $Personne_idPersonne){
        $sqlUpdate="UPDATE personne_has_role set idAgence=? WHERE Personne_idPersonne=?";
        
        $result=$this->db->query($sqlUpdate, array($idAgence, $Personne_idPersonne));
        
        return $result;
    }

    /**
     * @param $Personne_idPersonne
     * @return Un resultset contenant Le/les PersonneHasRole trouvé
     */
    public function getPersonneHasRole_ByID($Personne_idPersonne) {
        $sqlRechUserRole = "SELECT * FROM personne_has_role WHERE Personne_idPersonne=?";
        $resultRechUserRole = $this->db->query($sqlRechUserRole, array($Personne_idPersonne));

        return $resultRechUserRole;
    }

    public function getPersonneHasRole_Locataire($idAgence) {
        //Les personnes qui sont valides
        /*$sqlRechUserRole = "SELECT *
                            FROM personne_has_role 
                            WHERE role_idrole=1
                            AND idAgence=?
                            AND Personne_idPersonne NOT IN(SELECT idPersonne FROM personne WHERE top_validite=1)";*/
        $sqlRechUserRole = "SELECT *, 
							(SELECT CONCAT(persphys.Nom_PersPhys,' ',persphys.Prenom_PersPhys)  FROM persphys WHERE persphys.Personne_idPersonne = personne.idPersonne) AS nomPhysique,
							(SELECT pers_morale.DenomPers_Morale FROM pers_morale WHERE pers_morale.Personne_idPersonne = personne.idPersonne) AS nomMorale,
							(SELECT IF( (nomPhysique = '' OR nomPhysique IS NULL) ,nomMorale,nomPhysique) ) AS Nom
							FROM personne
							INNER JOIN personne_has_role ON personne_has_role.Personne_idPersonne = personne.idPersonne
							WHERE personne_has_role.role_idrole = 1
							AND personne_has_role.idAgence = ?";

		$resultRechUserRole = $this->db->query($sqlRechUserRole, array($idAgence));

        return $resultRechUserRole;
    }
    
    public function getPersonneHasRole_Propriettaire($idAgence) {
        //Les personnes qui sont valides
        /*$sqlRechUserRole = "SELECT *
                            FROM personne_has_role 
                            WHERE role_idrole=4
                            AND idAgence=?
                            AND Personne_idPersonne NOT IN(SELECT idPersonne FROM personne WHERE top_validite=1)";
        */
		$sqlRechUserRole = "SELECT *, 
							(SELECT CONCAT(persphys.Nom_PersPhys,' ',persphys.Prenom_PersPhys)  FROM persphys WHERE persphys.Personne_idPersonne = personne.idPersonne) AS nomPhysique,
							(SELECT pers_morale.DenomPers_Morale FROM pers_morale WHERE pers_morale.Personne_idPersonne = personne.idPersonne) AS nomMorale,
							(SELECT IF( (nomPhysique = '' OR nomPhysique IS NULL) ,nomMorale,nomPhysique) ) AS Nom
							FROM personne
							INNER JOIN personne_has_role ON personne_has_role.Personne_idPersonne = personne.idPersonne
							WHERE personne_has_role.role_idrole = 4
							AND personne_has_role.idAgence = ?";

        $resultRechUserRole = $this->db->query($sqlRechUserRole, array($idAgence));

        return $resultRechUserRole->result_array();
    }
    
    public function getPersonneHasRole_Agent($idAgence) {
        //Les personnes qui sont valides
        $sqlRechUserRole = "SELECT * 
                            FROM personne_has_role 
                            WHERE role_idrole=3
                            AND idAgence=?
                            AND Personne_idPersonne NOT IN(SELECT idPersonne FROM personne WHERE top_validite=1)";
        $resultRechUserRole = $this->db->query($sqlRechUserRole, array($idAgence));

        return $resultRechUserRole;
    }
    
     public function getNbPersonneRole($idRole,$idagence) {
        $sql = "select COUNT(Personne_idPersonne) as nbResultat from personne_has_role where role_idrole=?"
                . " AND personne_has_role.idAgence = ?";

        $resultRechUserRole = $this->db->query($sql, array($idRole,$idagence));

        foreach ($resultRechUserRole->result() as $row) {
            $retour = $row->nbResultat;
        }

        return $retour;
    }

}
