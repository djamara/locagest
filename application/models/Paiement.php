<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paiement
 *
 * @author DJAMARA
 */
class Paiement extends CI_Model{
    
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    function ListModePaiement(){
        
    }
    
    public function ListDesMois(){
        
        $requete = "select * from moisannee";
        
        $resultset = $this->db->query($requete);
        
        return $resultset;
    }
    
    public function TypePaiment(){
        
        $requete = "select * from typepaiement";
        
        $resultset = $this->db->query($requete);
        
        return $resultset;
    }
}
