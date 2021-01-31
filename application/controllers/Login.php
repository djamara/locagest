<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Personne');
        $this->load->model('Physique');
        $this->load->model('Morale');
        $this->load->model('Personne_has_role');
        $this->load->model('Role');
        $this->load->model('User');
    }

    public function login() {
        $this->load->view('login/login_new');
    }

    public function inscription() {
        $this->load->view('login/inscription_agence');
    }

    public function creerAgence() {
        //variable test de retour
        $resultPersonne = false;
        $resultMor = false;
        $resultPersRole = false;
        $resultUser = false;


        $denom = $this->input->post('denom');
        $siege = $this->input->post('siege');
        $email = $this->input->post('email');
        $username = $this->input->post('login');
        $motdepasse = $this->input->post('motdepasse');

        if (!empty($denom) && !empty($siege) && !empty($email) && !empty($username) && !empty($motdepasse)) {

            //var_dump($_POST['nom']);
            //Insertion dans la table Personne
            $resultPersonne = $this->Personne->creerPersonne($siege, $email, null, null, null, null, null);

            //Recuperation de l'ID de la personne via son email
            $resuultPersonneEmail = $this->Personne->getPersonne_ByMail($email);
            foreach ($resuultPersonneEmail->result() as $row) {
                $idPersonneCree = $row->idPersonne;
            }

            //Insertion dans la table Morale
            $resultMor = $this->Morale->creerMorale($idPersonneCree, $denom, $siege);

            //Insertion dans la table Personne_has_role (Liaison Personne et role
            $resultRole = $this->Role->getRole_ByLibelle('agence');
            foreach ($resultRole->result() as $row) {
                $idRoleAgence = $row->idrole;
            }

            //INSERTION
            $resultPersRole = $this->Personne_has_role->creerPersonneHasRole($idPersonneCree, $idRoleAgence,$idPersonneCree);

            //Insertion dans la table USER
            $resultUser = $this->User->creerUser($idPersonneCree, $username, $motdepasse, $email, null);

            if ($resultPersonne == true and $resultMor == true and $resultPersRole == true and $resultUser == true) {
                echo "Success";
                //redirect('login/login');
            } else {
                echo "Echec au niveau des insertions";
            }
        } else {
            echo "Echec";
        }
    }

    public function creerProfile() {
        //variable test de retour
        $resultPersonne = false;
        $resultPhys = false;
        $resultPersRole = false;
        $resultUser = false;


        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $email = $this->input->post('email');
        $username = $this->input->post('login');
        $motdepasse = $this->input->post('motdepasse');

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($username) && !empty($motdepasse)) {

            //var_dump($_POST['nom']);
            //Insertion dans la table Personne
            $resultPersonne = $this->Personne->creerPersonne(null, $email, null, null, null, null, null);

            //Recuperation de l'ID de la personne via son email
            $resuultPersonneEmail = $this->Personne->getPersonne_ByMail($email);
            foreach ($resuultPersonneEmail->result() as $row) {
                $idPersonneCree = $row->idPersonne;
            }

            //Insertion dans la table Physique
            $resultPhys = $this->Physique->creerPhysique($idPersonneCree, null, $nom, $prenom, null, null, null);

            //Insertion dans la table Personne_has_role (Liaison Personne et role
            $resultRole = $this->Role->getRole_ByLibelle('agent');
            foreach ($resultRole->result() as $row) {
                $idRoleProprietaire = $row->idrole;
            }

            //INSERTION
            $resultPersRole = $this->Personne_has_role->creerPersonneHasRole($idPersonneCree, $idRoleProprietaire);

            //Insertion dans la table USER
            $resultUser = $this->User->creerUser($idPersonneCree, $username, $motdepasse, $email, null);

            if ($resultPersonne == true and $resultPhys == true and $resultPersRole == true and $resultUser == true) {
                echo "Success";
                //redirect('login/login');
            } else {
                echo "Echec au niveau des insertions";
            }
        } else {
            echo "Echec";
        }
    }

    public function connecterUser() {

        $login = $this->input->post('login');
        $motdepasse = $this->input->post('motdepasse');

        //Recherche du user avec les caractéristiques de propriétaire ou agence
        $resultRechUser = $this->User->getUser_ByLoginAndPassword($login, $motdepasse);
        foreach ($resultRechUser->result() as $row) {
            $idPersonne = $row->Personne_idPersonne;
            $email = $row->email;
            $iconeUser = $row->userIcon;
        }


        if (isset($idPersonne) && !empty($idPersonne)) {
            //Recuperation du role de l'user
            $resultRechUserRole = $this->Personne_has_role->getPersonneHasRole_ByID($idPersonne);
            foreach ($resultRechUserRole->result() as $row) {
                $idRole = $row->role_idrole;
                $idAgence = $row->idAgence;
            }

            if ($idRole == 3) { // le role 3 est celui de l'agence
                //Recuperation du nom et du prenom
                $resultPersonne = $this->Physique->getPhysique_ByIDPersonne($idPersonne);
                foreach ($resultPersonne->result() as $row) {
                    $nom_prenom = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
                }

                //Ajout des données en session
                //Recuperation du rôle
                $resultRole = $this->Role->getRole_ByID($idRole);
                foreach ($resultRole->result() as $row) {
                    $libelleRole = $row->role_libelle;
                }

                //TypeUser:1=agence, 2=agent

                $sessionData = array(
                    'login' => $login,
                    'role' => $libelleRole,
                    'idPersonne' => $idPersonne,
                    'idAgence' => $idAgence,
                    'typeUser' => 2,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($sessionData);

                echo "Success";
                //redirect('AccueilAdmin/accueil/');
            } else if ($idRole == 4) {
                //Recuperation de la dénomination
                $resultPersonne = $this->Morale->getMorale_ByIDPersonne($idPersonne);
                foreach ($resultPersonne->result() as $row) {
                    $denomination = $row->DenomPers_Morale;
                }

                //Ajout des données en session
                //Recuperation du rôle
                $resultRole = $this->Role->getRole_ByID($idRole);
                foreach ($resultRole->result() as $row) {
                    $libelleRole = $row->role_libelle;
                }

                $sessionData = array(
                    'login' => $login,
                    'role' => $libelleRole,
                    'idPersonne' => $idPersonne,
                    'idAgence' => $idAgence,
                    'typeUser' => 1,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($sessionData);

                echo "Success";
            } else {
                echo "Vous n'êtes pas propriétaire";
            }
        } else {
            echo "Utilisateur inexistant";
        }
    }

    public function deconnecterUser() {
        if (isset($_SESSION['idPersonne'])and !isset($_SESSION['idAgence'])) {
            $sessionData = array('login', 'role', 'idPersonne', 'logged_in');

            $this->session->unset_userdata($sessionData);


            $this->login();
        }
        if (isset($_SESSION['idAgence'])) {
            $sessionData = array('idAgence', 'login', 'role', 'idPersonne', 'logged_in');
            $this->session->unset_userdata($sessionData);

            $this->login();
        }
    }

}
