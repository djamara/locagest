<?php

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/02/2019
 * Time: 23:11
 */
class Personne extends CI_Model {

    /**
     * Personne constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * @param  $PersonneSituationGeo
     * @param  $PersonneEmail
     * @param  $PersonneTel
     * @param  $PersonneCel
     * @param  $PersonneNumeroCB
     * @return Vari ou Faux
     */
    public function creerPersonne($PersonneSituationGeo, $PersonneEmail, $PersonneTel, $PersonneCel, $PersonneNumeroCB, $PersonneVille, $PersonnePays) {

        //Insertion dans la table Personne
        $sqlInsertPersonne = "INSERT INTO personne(PersonneSituationGeo, PersonneEmail, PersonneTel, 
            PersonneCel, PersonneNumeroCB, PersonneVille, PersonnePays) 
                            VALUES(?, ?, ?, ?, ?, ?, ?)";
        $resultPersonne = $this->db->query($sqlInsertPersonne, array($PersonneSituationGeo,
            $PersonneEmail,
            $PersonneTel,
            $PersonneCel,
            $PersonneNumeroCB,
            $PersonneVille,
            $PersonnePays));

        return $resultPersonne;
    }

    public function updatePersonne($idPersonne, $PersonneSituationGeo, $PersonneEmail, $PersonneTel, $PersonneCel, $PersonneNumeroCB, $PersonneVille, $PersonnePays) {
        $sqlUpdatePersonne = "UPDATE personne SET PersonneSituationGeo=?, PersonneEmail=?, PersonneTel=?, PersonneCel=?, PersonneNumeroCB=?, 
                            PersonneVille=?, PersonnePays=? WHERE idPersonne=?";

        $resultPersonne = $this->db->query($sqlUpdatePersonne, array(
            $PersonneSituationGeo,
            $PersonneEmail,
            $PersonneTel,
            $PersonneCel,
            $PersonneNumeroCB,
            $PersonneVille,
            $PersonnePays,
            $idPersonne));

        return $resultPersonne;
    }

    /**
     * @param null $email
     * @return Un resultset contenant la personne trouvée
     */
    public function getPersonne_ByMail($email) {

        $sqlTrouvePersonneParMail = "SELECT * FROM personne WHERE PersonneEmail=? AND top_validite=0";
        $resultPersonneEmail = $this->db->query($sqlTrouvePersonneParMail, array($email));

        return $resultPersonneEmail;
    }

    public function getPersonne_ByID($id) {

        $sqlTrouvePersonneParMail = "SELECT * FROM personne WHERE idPersonne=? AND top_validite=0 ORDER BY idPersonne DESC";
        $resultPersonneEmail = $this->db->query($sqlTrouvePersonneParMail, array($id));

        return $resultPersonneEmail;
    }
    
    public function getPersonne_ByRole($role, $idAgence) {

        /*$sql = "SELECT *, DATE_FORMAT(persphys.DateNaiss_PersPhys,'%Y%-%m%-%d') as dateNaiss"
                . " FROM personne,personne_has_role,role,persphys "
                . "WHERE personne.idPersonne = personne_has_role.Personne_idPersonne "
                . "and persphys.Personne_idPersonne = personne.idPersonne "
                . "and personne_has_role.role_idrole = role.idrole "
                ."AND personne_has_role.idAgence=? "
                . "and role.idrole = ? AND top_validite=0 ORDER BY idPersonne DESC";*/
        $sql = "SELECT *,DATE_FORMAT(persphys.DateNaiss_PersPhys,'%Y%-%m%-%d') as dateNaiss
                FROM personne 
                LEFT JOIN pers_morale
                ON personne.idPersonne = pers_morale.Personne_idPersonne
                LEFT JOIN persphys
                ON personne.idPersonne = persphys.Personne_idPersonne
                INNER JOIN personne_has_role
                ON personne.idPersonne = personne_has_role.Personne_idPersonne
                WHERE personne_has_role.idAgence = ?
                AND personne_has_role.role_idrole = ?";
        
        $resultPersonne = $this->db->query($sql, array($idAgence, $role));

        return $resultPersonne;
    }
    
    public function supprimerPersonne($idPersonne) {
        $sqlUpdatePersonne = "UPDATE personne SET top_validite=1 WHERE idPersonne=?";

        $resultPersonne = $this->db->query($sqlUpdatePersonne, array($idPersonne));

        return $resultPersonne;
    }

}
