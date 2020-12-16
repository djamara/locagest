<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleSessionController
 *
 * @author DELL
 */
class ControleSessionController extends CI_Controller{
    //put your code here
    public function __construct()
    {

        parent::__construct();

        if ($this->session->userdata['login'] == TRUE)
        {
            //do something
        }
        else
        {
            $this->load->view('login/login_new'); //if session is not there, redirect to login page
        }   

    }
}
