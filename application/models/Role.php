<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 06/02/2019
 * Time: 23:48
 */

class Role extends CI_Model
{

    /**
     * Role constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Un resultset contenant la liste des roles
     */
    public function getRole(){
        $sqlSelectRole="SELECT * FROM role ";
        $resultRole=$this->db->query($sqlSelectRole);

        return $resultRole;
    }

    /**
     * @param $role_libelle
     * @return Un resultset contenant le/les roles trouvés
     */
    public function getRole_ByLibelle($role_libelle){
        $sqlSelectRoleProprietaire="SELECT * FROM role WHERE role_libelle LIKE ?";
        $resultRole=$this->db->query($sqlSelectRoleProprietaire, array("%".$role_libelle."%"));

        return $resultRole;
    }

    public function getRole_ByID($idrole){
        $sqlSelectRoleProprietaire="SELECT * FROM role WHERE idrole=?";
        $resultRole=$this->db->query($sqlSelectRoleProprietaire, array($idrole));

        return $resultRole;
    }
}