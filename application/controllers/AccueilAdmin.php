<?php

class AccueilAdmin extends CI_Controller {

    private $infoLocataire = array();
    private $infoProprietaire = array();
    private $nomPrenom;
    private $userIcon;
    private $emailUser;
    private $data;
    private $message;
    private $dir_separator;
    private $destination_path;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Physique');
        $this->load->model('Morale');
        $this->load->model('Piece');
        $this->load->model('Personne');
        $this->load->model('Physique');
        $this->load->model('User');
        $this->load->model('Role');
        $this->load->model('Bien');
        $this->load->model('Bien_Has_Piece');
        $this->load->model('Bien_Has_Caracteristiques');
        $this->load->model('CaracteristiquesBien');
        $this->load->model('ImageBien');
        $this->load->model('Immeuble');
        $this->load->model('TypeBien');
        $this->load->model('PiecesBien');
        $this->load->model('Personne_has_role');
        $this->load->model('Locations');
        $this->load->model('Paiement');
        $this->load->model('CompteLoyer');
        $this->load->model('GroupeBien');
        $this->load->model('Depenses');

        $this->folder = "imageBien";
        $this->dir_separator = DIRECTORY_SEPARATOR;
        $this->destination_path = dirname(__FILE__, 3) . $this->dir_separator . "assets" . $this->dir_separator;

        //var_dump($this->destination_path);
    }

    public function check_session() {

        if (!isset($this->session->userdata['logged_in']) || !$this->session->userdata['logged_in']) {
            //$this->load->view('login/login_new');
            redirect('/login/login', 'refresh');
        }
    }

    private function setData() {
        //$this->check_session();

        if (isset($_SESSION['idPersonne'])) {
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($_SESSION['idPersonne']);

            foreach ($resultPers->result() as $row) {
                $this->nomPrenom = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
            }

            $resultUser = $this->User->getUser_ByIdPersonne($_SESSION['idPersonne']);
            foreach ($resultUser->result() as $row) {
                $this->userIcon = $row->userIcon;
                $this->emailUser = $row->email;
            }

            $this->data['nomuser'] = $this->nomPrenom;
            $this->data['iconeuser'] = $this->userIcon;
            $this->data['emailuser'] = $this->emailUser;
        }
    }

    public function accueil() {
        
        //var_dump($_SESSION["idPersonne"]);
        $idagence = $_SESSION['idPersonne'];
        
        $this->check_session();
        //Liste des propriétaire
        $nbProprietaire = $this->Personne_has_role->getNbPersonneRole(4,$idagence);

        //Liste des locataires
        $nbLocataire = $this->Personne_has_role->getNbPersonneRole(1,$idagence);

        //Liste des locataires
        $nbLocation = $this->Locations->getNbLocation($idagence);

        //Liste des biens
        $nbBien = $this->Bien->getNbBien($idagence);

        $info['nbBien'] = $nbBien;
        $info['nbProprietaire'] = $nbProprietaire;
        $info['nbLocataire'] = $nbLocataire;
        $info['nbLocation'] = $nbLocation;

        //var_dump($info);

        $this->setData();

        $this->load->view('administration/header');
        //if($page!=""){
        $this->load->view('administration/Accueil', $info);
        //}
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function profile() {
        $this->check_session();

        if (isset($_SESSION['idPersonne'])) {
            //Chargement des infos de l'agent
            //en tant que personne physique
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($_SESSION['idPersonne']);
            $persPhys = array();
            foreach ($resultPers->result() as $row) {
                $persPhys['nom'] = $row->Nom_PersPhys;
                $persPhys['prenom'] = $row->Prenom_PersPhys;
                $persPhys['dateNais'] = $row->DateNaiss_PersPhys;
                $persPhys['lieuNais'] = $row->LieuNaiss_PersPhys;
                $persPhys['sexe'] = $row->SexePersPhys;
                $persPhys['idtypePiece'] = $row->TypePiece_idTypePiece;
                $persPhys['numpiece'] = $row->numpiece;

                $infoPhysiq[] = $persPhys;
            }

            //En tant que personne
            $resultPersonne = $this->Personne->getPersonne_ByID($_SESSION['idPersonne']);
            foreach ($resultPersonne->result() as $row) {
                $pers['situationGeo'] = $row->PersonneSituationGeo;
                $pers['tel'] = $row->PersonneTel;
                $pers['cel'] = $row->PersonneCel;
                $pers['email'] = $row->PersonneEmail;
                $pers['ville'] = $row->PersonneVille;
                $pers['pays'] = $row->PersonnePays;

                $infoPersonne[] = $pers;
            }

            for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                $info['nom'] = $persPhys['nom'];
                $info['prenom'] = $persPhys['prenom'];
                $info['dateNais'] = $persPhys['dateNais'];
                $info['lieuNais'] = $persPhys['lieuNais'];
                $info['sexe'] = $persPhys['sexe'];
                $info['idtypePiece'] = $persPhys['idtypePiece'];
                $info['numpiece'] = $persPhys['numpiece'];
                $info['situationGeo'] = $pers['situationGeo'];
                $info['tel'] = $pers['tel'];
                $info['cel'] = $pers['cel'];
                $info['email'] = $pers['email'];
                $info['ville'] = $pers['ville'];
                $info['pays'] = $pers['pays'];
            }
            //var_dump($info);
            //Chargement de la liste des piece

            $resultPiece = $this->Piece->getPieceLibelle();
            foreach ($resultPiece->result() as $row) {
                $pieceLibelle['libelle'] = $row->TypePieceLibelle;
                //echo var_dump($row->TypePieceLibelle);
            }

            //echo var_dump($info);
            //print_r($pieceLibelle);
        }

        $this->setData();

        $info['nomuser'] = $this->nomPrenom;
        $info['iconeuser'] = $this->userIcon;
        $info['emailuser'] = $this->emailUser;

        $this->load->view('administration/header');
        //if($page!=""){
        $this->load->view('administration/profile', $info);
        //}
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerProfile');
    }

    public function modifierProfile() {
        $this->check_session();

        var_dump($_FILES['photo']);

        $civilite = $this->input->post('sexe');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $piece = $this->input->post('type_piece');
        $numpiece = $this->input->post('numpiece');
        $dateNais = $this->input->post('dateNais');
        $lieuNais = $this->input->post('lieuNais');
        $photo = $_FILES['photo'];
        $adresse1 = $this->input->post('adresse1');
        $ville = $this->input->post('ville');
        $pays = $this->input->post('pays');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $cel = $this->input->post('cel');


        //Initialisation des valeur de test
        $reqUpdatePersonne = false;
        $reqUpdatePhysique = false;
        $reqUpdateUser = false;

        //Update de la personne
        if (isset($_SESSION['idPersonne'])) {
            $idPersonne = $_SESSION['idPersonne'];

            $reqUpdatePersonne = $this->Personne->updatePersonne($idPersonne, $adresse1, $email, $tel, $cel, null, $ville, $pays);

            $reqUpdatePhysique = $this->Physique->updatePhysique($idPersonne, $piece, $nom, $prenom, $dateNais, $lieuNais, $civilite, $numpiece);


            //Upload du fichier image telechargé
            $maxsize = 5242880; //5Megas
            //Test1: fichier correctement uploadé
            if (!isset($photo) OR $photo['error'] > 0)
                echo "l'envoi du fichier a échoué";
            //Test2: taille limite
            if ($photo['size'] > $maxsize)
                echo "La taille maximale est de 5 Mega";

            $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
            if (in_array($extension_upload, $extensions_valides))
                echo "Extension correcte";

            //Taille de l'image
            /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

            /* $this->nomPrenom = $nom . $prenom;
              $this->userIcon = $nom_prenom . "." . $extension_upload; */
            $nom_prenom = $_FILES['file']['name'];
            //var_dump($extension_upload);
            $folder = "user-image";

            $nomFichier = $this->destination_path . $folder . $this->dir_separator . $nom_prenom . "." . $extension_upload;
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nomFichier);
            if ($resultat) {
                echo "Transfert réussi";
                $reqUpdateIcone = $this->User->updateIcone($idPersonne, $nom_prenom . "." . $extension_upload);
            }

            var_dump($nomFichier);

            $reqUpdateUser = $this->User->updateUser($idPersonne, $email);

            if ($reqUpdatePersonne and $reqUpdatePhysique and $reqUpdateUser) {

                $this->setData();
            } else {
                echo 'Erreur';
            }
        } else {
            echo "Session expirée";
        }
    }

    public function GestBiens() {
        $this->check_session();

        //Recuperation de la liste des biens de l'agence
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //INITIALISATION
            $bien = array();

            //Id du propriétaire
            //$idPersonne = $_SESSION['idPersonne'];
            //Liste des biens
            $listeBien = array();
            $listeIdTypeBien = array();
            $listeIdBien = array();
            $reqListBien = $this->Bien->listerBien($idAgence);

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'libelleBien' => $row->bienLibelle,
                    'localisation' => $row->bienLocalisation,
                    'idBien' => $row->idbien,
                    'proprietaire' => $row->bienNomProprietaire,
                );
                $listeIdTypeBien[] = $row->TypeBien_idTypeBien;
                $listeIdBien[] = $row->idbien;

                $listeBien[] = $listeBienUnique;
            }


            $listeTypeBien = array();
            for ($i = 0; $i < sizeof($listeIdTypeBien); $i++) {
                //Recuperation du type de bien
                $reqTypeBien = $this->TypeBien->getTypeBien_ByID($listeIdTypeBien[$i]);
                foreach ($reqTypeBien->result() as $row) {
                    $listeTypeBienUnique = array(
                        'libelleTypeBien' => $row->TypeBienLibelle
                    );
                    $listeTypeBien[] = $listeTypeBienUnique;
                }
            }

            $listeCaracTotale = array();
            for ($i = 0; $i < sizeof($listeIdBien); $i++) {
                //recuperation des caracteristiques
                $listeCaracBien = array();
                $reqCara = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($listeIdBien[$i]);
                foreach ($reqCara->result() as $row) {
                    $listeCaracUnique = array(
                        'idBienHasCarac' => $row->CaracteristiquesBiens_idCaracteristiquesBiens,
                    );
                    $listeCaracBien[] = $listeCaracUnique;
                }

                $listeCaracTotale[] = $listeCaracBien;
            }

            //constitution des donnes à transmettre
            for ($i = 0; $i < sizeof($listeBien); $i++) {
                $info['idBien'] = $listeBien[$i]['idBien'];
                $info['libelleBien'] = $listeBien[$i]['libelleBien'];
                $info['localisation'] = $listeBien[$i]['localisation'];
                $info['localisation'] = $listeBien[$i]['localisation'];
                $info['proprietaire'] = $listeBien[$i]['proprietaire'];
                $info['libelleTypeBien'] = $listeTypeBien[$i]['libelleTypeBien'];

                //recuperation des caracteristiques
                $listeCaracBien = array();
                $reqCara = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($listeIdBien[$i]);
                foreach ($reqCara->result() as $row) {
                    $listeCaracUnique = array(
                        'idBienHasCarac' => $row->CaracteristiquesBiens_idCaracteristiquesBiens,
                    );
                    $listeCaracBien[] = $listeCaracUnique;
                }
                $info['idCaracteristique'] = $listeCaracBien;


                $bien[$i] = $info;
            }
            $infoBien['bien'] = $bien;
        }
        //var_dump($infoBien);
        //Chargement de la liste des proprietaires
        $listeProprietaire = $this->getProprietaire();

        $infoBien['listeProprietaire'] = $listeProprietaire;
        //var_dump($infoBien);

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listBien', $infoBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }
    
    
    public function DetailLocation() {
        $this->check_session();

        //Recuperation de la liste des biens de l'agence
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //INITIALISATION
            $bien = array();

            //Id du propriétaire
            //$idPersonne = $_SESSION['idPersonne'];
            //Liste des biens
            $listeBien = array();
            $listeIdTypeBien = array();
            $listeIdBien = array();
            $reqListBien = $this->Bien->listerBien($idAgence);

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'libelleBien' => $row->bienLibelle,
                    'localisation' => $row->bienLocalisation,
                    'idBien' => $row->idbien,
                    'proprietaire' => $row->bienNomProprietaire,
                    'loyerHC' => $row->loyerHC,
                    'idLocation' =>$row->idlocation
                );
                $listeIdTypeBien[] = $row->TypeBien_idTypeBien;
                $listeIdBien[] = $row->idbien;

                $listeBien[] = $listeBienUnique;
            }


            $listeTypeBien = array();
            for ($i = 0; $i < sizeof($listeIdTypeBien); $i++) {
                //Recuperation du type de bien
                $reqTypeBien = $this->TypeBien->getTypeBien_ByID($listeIdTypeBien[$i]);
                foreach ($reqTypeBien->result() as $row) {
                    $listeTypeBienUnique = array(
                        'libelleTypeBien' => $row->TypeBienLibelle
                    );
                    $listeTypeBien[] = $listeTypeBienUnique;
                }
            }

            $listeCaracTotale = array();
            for ($i = 0; $i < sizeof($listeIdBien); $i++) {
                //recuperation des caracteristiques
                $listeCaracBien = array();
                $reqCara = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($listeIdBien[$i]);
                foreach ($reqCara->result() as $row) {
                    $listeCaracUnique = array(
                        'idBienHasCarac' => $row->CaracteristiquesBiens_idCaracteristiquesBiens,
                    );
                    $listeCaracBien[] = $listeCaracUnique;
                }

                $listeCaracTotale[] = $listeCaracBien;
            }

            //constitution des donnes à transmettre
            for ($i = 0; $i < sizeof($listeBien); $i++) {
                $info['idBien'] = $listeBien[$i]['idBien'];
                $info['libelleBien'] = $listeBien[$i]['libelleBien'];
                $info['localisation'] = $listeBien[$i]['localisation'];
                $info['localisation'] = $listeBien[$i]['localisation'];
                $info['proprietaire'] = $listeBien[$i]['proprietaire'];
                $info['libelleTypeBien'] = $listeTypeBien[$i]['libelleTypeBien'];
                $info['montantLoyer'] = $listeBien[$i]['loyerHC'];
                $info['idLocation'] = $listeBien[$i]['idLocation'];

                //recuperation des caracteristiques
                $listeCaracBien = array();
                $reqCara = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($listeIdBien[$i]);
                foreach ($reqCara->result() as $row) {
                    $listeCaracUnique = array(
                        'idBienHasCarac' => $row->CaracteristiquesBiens_idCaracteristiquesBiens,
                    );
                    $listeCaracBien[] = $listeCaracUnique;
                }
                $info['idCaracteristique'] = $listeCaracBien;


                $bien[$i] = $info;
            }
            $infoBien['bien'] = $bien;
        }
        //var_dump($infoBien);
        //Chargement de la liste des proprietaires
        $listeProprietaire = $this->getProprietaire();

        $infoBien['listeProprietaire'] = $listeProprietaire;
        //var_dump($infoBien);

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/detailLocation', $infoBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function GestGroupeBiens() {
        $this->check_session();

        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }
            //Recuperation de la liste des biens du proprietaire
            //INITIALISATION
            $groupeBien = array();
            $listeGroupeBien = array();

            $listeIdproprietaire = array();

            $reqListBien = $this->GroupeBien->listerGroupeBien($idAgence);

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'idImmeuble' => $row->idImmeubles,
                    'nom' => $row->NomImmeubles,
                    'localisation' => $row->AdresseImmeubles
                );

                $groupeBien['immeuble'][] = $listeBienUnique;

                $reqGetProp = $this->Physique->getPhysique_ByIDPersonne($row->personne_idPersonne);
                foreach ($reqGetProp->result() as $row) {
                    $groupeBien['proprietaire'][] = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
                }
            }

            //var_dump($groupeBien);
        }


        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listGroupeBien', $groupeBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function AddBiens() {
        $this->check_session();

        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }
            //Liste des types de bien
            $listeBien = array();
            $info['bien'] = array();
            $resultBien = $this->TypeBien->listerTypeBien();
            foreach ($resultBien->result() as $row) {
                $listeBien[] = $row->TypeBienLibelle;
            }

            $typeBien['typeBien'] = $listeBien;
            $info['bien'][] = $typeBien;

            //Liste des pieces
            $listePieceBien = array();
            $resultPiece = $this->PiecesBien->listerPiecesBien();
            foreach ($resultPiece->result() as $row) {
                $listePieceBien[] = $row->PiecesLibelle;
            }
            $pieceBien['pieceBien'] = $listePieceBien;
            $info['bien'][] = $pieceBien;

            //Liste des propriétaires
            $listeProprietaire = array();
            $listeProprietaire = $this->Personne->getPersonne_ByRole(4, $idAgence)->result_array();
            $proprietaire['proprietaire'] = $listeProprietaire;
            $info['bien'][] = $proprietaire;

            //Liste de groupements
            $listeGroupement = array();
            $groupeUnique = array();
            $reqGetGroupement = $this->GroupeBien->listerGroupeBien($idAgence);
            foreach ($reqGetGroupement->result() as $row) {
                $groupeUnique['idImmeuble'] = $row->idImmeubles;
                $groupeUnique['nomImmeuble'] = $row->NomImmeubles;

                $listeGroupement[] = $groupeUnique;
            }
            $groupement['groupement'] = $listeGroupement;
            $info['bien'][] = $groupement;
        }
        //var_dump($info);
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/addBien', $info);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerAddBien');
    }

    public function deleteBien() {
        $this->check_session();

        $idBien = $_POST['idbien'];

        $requeteDelBien = $this->Bien->deleteBien($idBien);

        if ($requeteDelBien) {

            echo 'Success';
        } else {

            echo 'Erreur';
        }
    }

    public function AddGroupeBiens() {
        $this->check_session();

        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }
            $groupeBien = array();

            //Liste des propriétaires
            $listeProprietaire = array();
            $listeProprietaire = $this->Personne->getPersonne_ByRole(4, $idAgence)->result_array();
            $groupeBien['proprietaire'] = $listeProprietaire;

            //Liste des biens
            $listeBiens = array();
            $listeBiens = $this->Bien->listerBienImmeubleCreation($idAgence)->result_array();
            $groupeBien['biens'] = $listeBiens;
        }
        //var_dump($groupeBien);
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/addGroupeBien', $groupeBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerAddBien');
    }

    public function creerBien() {
        $this->check_session();

        //ENREGISTREMENT DU BIEN
        if (isset($_SESSION['idPersonne'])) {
			$idAgence = $_SESSION['idAgence'];

            $idPersonne = $this->input->post('propriettaireNom');

			$nombreCopie  = $this->input->post('nombreDeCopie');

			//var_dump([$nombreCopie,$idPersonne]);

            $typeBien = $this->input->post('typeBien');
            $libelleBien = $this->input->post('libelleBien');
            $localisationBien = $this->input->post('localisationBien');
            $superficie = $this->input->post('superficieBien');
            $nbPiece = $this->input->post('nbPieceBien');
            $dateCreationBien = $this->input->post('dateCreationBien');

            $carac1 = $this->input->post('carac1');
            $carac2 = $this->input->post('carac2');
            $carac3 = $this->input->post('carac3');
            $carac4 = $this->input->post('carac4');
            $carac5 = $this->input->post('carac5');
            $carac6 = $this->input->post('carac6');
            $carac7 = $this->input->post('carac7');
            $carac8 = $this->input->post('carac8');
            $carac9 = $this->input->post('carac9');
            $carac10 = $this->input->post('carac10');

            $feuilleCadastrale = $this->input->post('feuilleCadastrale');
            $parcelleCadastrale = $this->input->post('parcelleCadastrale');
            $categorieCadastrale = $this->input->post('categorieCadastrale');
            $valeurLocataiveCadastrale = $this->input->post('valeurLocataiveCadastrale');
            $lot = $this->input->post('lot');
            $millieme = $this->input->post('millieme');
            $parking = $this->input->post('parking');
            $autresDependance = $this->input->post('autresDependance');
            $cave = $this->input->post('cave');
            $typeLocation = $this->input->post('typeLocationBien');
            $loyerHC = str_replace(",", "", $this->input->post('loyerHC'));
            $charge = str_replace(",", "", $this->input->post('charge'));
            $taxeHabitation = $this->input->post('taxeHabitation');
            $taxeFonciere = $this->input->post('taxeFonciere');
            $dateAcquisition = $this->input->post('dateAcquisition');
            $prixAcquisition = $this->input->post('prixAcquisition');
            $fraisAcquisition = $this->input->post('fraisAcquisition');
            $nomCentre = $this->input->post('nomCentre');
            $adresse1 = $this->input->post('adresse1');
            $adresse2 = $this->input->post('adresse2');
            $codePostal = $this->input->post('codePostal');
            $ville = $this->input->post('ville');
            $descriptionBien = $this->input->post('descriptionBien');
            $notes = $this->input->post('notes');
            $assurance = $this->input->post('assurance');
            $dateSouscripAssurance = $this->input->post('dateSouscripAssurance');
            $dateEcheanceAssurance = $this->input->post('dateEcheanceAssurance');

            $idImmeuble = $this->input->post('idImmeuble');

            //recuperation des pieces du bien
            $pieceDuBien = $this->PiecesBien->getPiecesBien_ByLibelle($nbPiece);
            foreach ($pieceDuBien->result() as $row) {
                $idPieceDuBien = $row->idPieces;
            }

            //Recuperation  du type de bien
            $typeBienGet = $this->TypeBien->getTypeBien_ByLibelle($typeBien);
            foreach ($typeBienGet->result() as $row) {
                $idTypeBien = $row->idTypeBien;
            }

            //Recuperation du nom du proprietaire
            $reqGetPersonne = $this->Physique->getPhysique_ByIDPersonne($idPersonne);
            foreach ($reqGetPersonne->result() as $row) {
                if($row->Nom_PersPhys != "" && $row->Prenom_PersPhys != ""){
					$nomProprietaire = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
				}else{
                	$nomProprietaire = $row->DenomPers_Morale;
				}
            }

            //Insertion du Bien
            if ($idImmeuble == 0) {
                $insertBien = $this->Bien->creerBien($idAgence,$libelleBien, $localisationBien, $dateCreationBien, $nomProprietaire,$idPersonne, $idTypeBien, null, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charge, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentre, $adresse1, $adresse2, $codePostal, $ville, $descriptionBien, $notes, $assurance, $dateSouscripAssurance, $dateEcheanceAssurance);
            } else {
                $insertBien = $this->Bien->creerBien($idAgence,$libelleBien, $localisationBien, $dateCreationBien, $nomProprietaire, $idPersonne, $idTypeBien, $idImmeuble, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charge, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentre, $adresse1, $adresse2, $codePostal, $ville, $descriptionBien, $notes, $assurance, $dateSouscripAssurance, $dateEcheanceAssurance);
            }
            //Recuperation de l'id du bien créé
            $getBien = $this->Bien->getBien($libelleBien, $localisationBien, $dateCreationBien, $nomProprietaire);
            foreach ($getBien->result() as $row) {
                $idBienCree = $row->idbien;
            }

            //Insertion de Bien_has_pieces
            $insertBienHasPiece = $this->Bien_Has_Piece->creerBienHasPiece($idBienCree, $idPersonne, $idTypeBien, $idPieceDuBien, $nbPiece, $superficie);



            //Insertion caraceristiques bien
            if (!empty($carac1) or ! empty($carac2) or ! empty($carac3) or ! empty($carac4)
                    or ! empty($carac5) or ! empty($carac6) or ! empty($carac7) or ! empty($carac8)
                    or ! empty($carac9) or ! empty($carac10)) {

                if (!empty($carac1)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac1);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac2)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac2);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac3)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac3);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac4)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac4);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }

                if (!empty($carac5)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac5);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac6)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac6);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac7)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac7);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
                if (!empty($carac8)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac8);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }

                if (!empty($carac9)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac9);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }

                if (!empty($carac10)) {
                    //Recuperation de l'id de la caracteristique
                    $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac10);
                    foreach ($reqCarac->result() as $row) {
                        $idCaracBien = $row->idCaracteristiquesBiens;
                    }

                    //Insertion Bien_has_caracteristiques
                    $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBienCree, $idPersonne, $idTypeBien, $idCaracBien);
                }
            }

            if ($insertBien and $insertBienHasPiece) {
                //redirect('AccueilAdmin/modifierBiens/' . $idBienCree);
                echo 'success';
            } else {
                echo 'Erreur';
            }
        } else {
            echo 'Session expirée';
        }
    }

    public function creerGroupeBien() {
        $this->check_session();

        if (isset($_SESSION['idPersonne'])) {
            $idPersonne = $this->input->post('groupePropriettaireNom');
            $libelle = $this->input->post('libelle');
            $localisation = $this->input->post('localisation');
            $superficie = $this->input->post('superficie');
            $dateCreation = $this->input->post('dateCreation');
            $description = $this->input->post('description');
            $bienAssocie = $this->input->post('biensAssocie');

            $insert = $this->GroupeBien->creerGroupeBien($idPersonne, $libelle, $localisation, $superficie, $dateCreation, $description);

            if (isset($insert)) {
                //Recuperation de l'id genere
                $getImmeuble = $this->Immeuble->getImmeubleCreer($idPersonne, $libelle, $localisation, $superficie, $dateCreation, $description);

                foreach ($getImmeuble->result() as $row) {
                    $idImmeuble = $row->idImmeubles;
                }
                //insertion de idImmeuble dans bien
                if (isset($bienAssocie) && !empty($bienAssocie) && isset($idImmeuble) && !empty($idImmeuble)) {

                    foreach ($bienAssocie as $row) {
                        $insertBien = $this->Bien->updateIdImmeuble($idImmeuble, $row);
                    }
                }
            }

            if ($insert) {
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        } else {
            echo 'Session expirée';
        }
    }

    public function modifierBiens($idBien) {
        $this->check_session();
        if (isset($idBien)) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //Initialisation
            //Liste des types de bien
            $listeBien = array();
            $infoInit = array();
            $resultBien = $this->TypeBien->listerTypeBien();
            foreach ($resultBien->result() as $row) {
                $listeBien[] = $row->TypeBienLibelle;
            }

            $typeBien['typeBien'] = $listeBien;
            $infoInit[] = $typeBien;

            //Liste des pieces
            $listePieceBien = array();
            $resultPiece = $this->PiecesBien->listerPiecesBien();
            foreach ($resultPiece->result() as $row) {
                $listePieceBien[] = $row->PiecesLibelle;
            }
            $pieceBien['pieceBien'] = $listePieceBien;
            $infoInit[] = $pieceBien;


            //Chargement des infos du bien
            $reqGetBien = $this->Bien->getBien_ByID($idBien);
            foreach ($reqGetBien->result() as $row) {
                $bien['libelleBien'] = $row->bienLibelle;
                $bien['localisationBien'] = $row->bienLocalisation;
                $bien['dateCreationBien'] = $row->bienDateCreation;
                $bien['idTypeBien'] = $row->TypeBien_idTypeBien;
                $bien['idProprietaire'] = $row->Personne_idPersonne;
                $bien['idImmeuble'] = $row->Immeubles_idImmeubles;
                $bien['feuilleCadastrale'] = $row->feuilleCadastrale;
                $bien['parcelleCadastrale'] = $row->parcelleCadastrale;
                $bien['categorieCadastrale'] = $row->categorieCadastrale;
                $bien['valeurLocataiveCadastrale'] = $row->valeurLocataiveCadastrale;
                $bien['lot'] = $row->lot;
                $bien['millieme'] = $row->millieme;
                $bien['parking'] = $row->parking;
                $bien['autresDependance'] = $row->autresDependance;
                $bien['cave'] = $row->cave;
                $bien['typeLocation'] = $row->typeLocation;
                $bien['loyerHC'] = $row->loyerHC;
                $bien['charges'] = $row->charges;
                $bien['taxeHabitation'] = $row->taxeHabitation;
                $bien['taxeFonciere'] = $row->taxeFonciere;
                $bien['dateAcquisition'] = $row->dateAcquisition;
                $bien['prixAcquisition'] = $row->prixAcquisition;
                $bien['fraisAcquisition'] = $row->fraisAcquisition;
                $bien['nomCentreiImpot'] = $row->nomCentreiImpot;
                $bien['adresse1CentreImpot'] = $row->adresse1CentreImpot;
                $bien['adresse2CentreImpot'] = $row->adresse2CentreImpot;
                $bien['codePostale'] = $row->codePostale;
                $bien['ville'] = $row->ville;
                $bien['description'] = $row->description;
                $bien['notes'] = $row->notes;
                $bien['libAssurance'] = $row->libAssurance;
                $bien['dateSouscriptionAssurance'] = $row->dateSouscriptionAssurance;
                $bien['dateEcheanceAssurance'] = $row->dateEcheanceAssurance;
            }

            //Recuperation du type de bien
            $reqTypeBien = $this->TypeBien->getTypeBien_ByID($bien['idTypeBien']);
            foreach ($reqTypeBien->result() as $row) {
                $typeBienLibelle = $row->TypeBienLibelle;
            }

            //Recuperation du nombre de piece
            $bienPiece = null;
            $reqGetBienHasPiece = $this->Bien_Has_Piece->getBienHasPiece_ByIdBien($idBien);
            foreach ($reqGetBienHasPiece->result() as $row) {
                $bienPiece['idPiece'] = $row->Pieces_idPieces;
                $bienPiece['NombrePiece'] = $row->NombrePiece;
                $bienPiece['superficiePiece'] = $row->superficiePiece;
            }

            //Recuperation de la piece
            if ($bienPiece != null) {
                $reqGetPieceBien = $this->PiecesBien->getPiecesBien_ByID($bienPiece['idPiece']);
                foreach ($reqGetPieceBien->result() as $row) {
                    $pieceBien = $row->PiecesLibelle;
                }
            }

            //recuperation des caracteristiques
            $reqGetcarac = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($idBien);
            $biencarac = array();
            foreach ($reqGetcarac->result() as $row) {
                $biencarac[] = $row->CaracteristiquesBiens_idCaracteristiquesBiens;
            }

            $libelleCarac = array();
            for ($i = 0; $i < sizeof($biencarac); $i++) {
                $reqgetCaracLibelle = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByID($biencarac[$i]);
                foreach ($reqgetCaracLibelle->result() as $row) {
                    $libelleCarac[] = $row->CaracteristiquesLibelle;
                }
            }

            //Constitution des donnees a transmettre
            $info['idBien'] = $idBien;
            $info['idTypeBien'] = $bien['idTypeBien'];
            $info['idProprietaire'] = $bien['idProprietaire'];
            $info['idImmeuble'] = $bien['idImmeuble'];
            $info['libelleBien'] = $bien['libelleBien'];
            $info['localisationBien'] = $bien['localisationBien'];
            $info['dateCreationBien'] = $bien['dateCreationBien'];
            $info['feuilleCadastrale'] = $bien['feuilleCadastrale'];
            $info['parcelleCadastrale'] = $bien['parcelleCadastrale'];
            $info['categorieCadastrale'] = $bien['categorieCadastrale'];
            $info['valeurLocataiveCadastrale'] = $bien['valeurLocataiveCadastrale'];
            $info['lot'] = $bien['lot'];
            $info['millieme'] = $bien['millieme'];
            $info['parking'] = $bien['parking'];
            $info['autresDependance'] = $bien['autresDependance'];
            $info['cave'] = $bien['cave'];
            $info['typeLocation'] = $bien['typeLocation'];
            $info['loyerHC'] = $bien['loyerHC'];
            $info['charges'] = $bien['charges'];
            $info['taxeHabitation'] = $bien['taxeHabitation'];
            $info['taxeFonciere'] = $bien['taxeFonciere'];
            $info['dateAcquisition'] = $bien['dateAcquisition'];
            $info['prixAcquisition'] = $bien['prixAcquisition'];
            $info['fraisAcquisition'] = $bien['fraisAcquisition'];
            $info['nomCentreiImpot'] = $bien['nomCentreiImpot'];
            $info['adresse1CentreImpot'] = $bien['adresse1CentreImpot'];
            $info['adresse2CentreImpot'] = $bien['adresse2CentreImpot'];
            $info['codePostale'] = $bien['codePostale'];
            $info['ville'] = $bien['ville'];
            $info['description'] = $bien['description'];
            $info['notes'] = $bien['notes'];
            $info['libAssurance'] = $bien['libAssurance'];
            $info['dateSouscriptionAssurance'] = $bien['dateSouscriptionAssurance'];
            $info['dateEcheanceAssurance'] = $bien['dateEcheanceAssurance'];

            $info['typeBien'] = $typeBienLibelle;
            $info['NombrePiece'] = $bienPiece['NombrePiece'];
            $info['superficiePiece'] = $bienPiece['superficiePiece'];
            $info['caracteristques'] = $libelleCarac;
            $info['init'] = $infoInit;

            $infoBien['bien'] = $info;
        }

        //Liste des propriétaires
        $listeProprietaire = $this->Personne->getPersonne_ByRole(4, $idAgence)->result_array();
        $infoBien['bien'][] = $listeProprietaire;

        //Liste de groupements
        $listeGroupement = array();
        $groupeUnique = array();
        $reqGetGroupement = $this->GroupeBien->listerGroupeBien($idAgence);
        foreach ($reqGetGroupement->result() as $row) {
            $groupeUnique['idImmeuble'] = $row->idImmeubles;
            $groupeUnique['nomImmeuble'] = $row->NomImmeubles;

            $listeGroupement[] = $groupeUnique;
        }
        //$groupement['groupement'] = $listeGroupement;
        $infoBien['bien'][] = $listeGroupement;


        //var_dump($_FILES);
        //var_dump($infoBien);
        $this->setData();
        // var_dump(dirname(__FILE__, 3));

        $this->load->view('administration/header');
        $this->load->view('administration/modifierBiens', $infoBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerModifbien');
    }

    public function MultiplierBien(){

		$nombreDeCopie = $this->input->post('nombreDeCopie');

		for ($i = 1; $i <= $nombreDeCopie ;$i++){
			$this->creerBien();
		}

	}

    public function dupliquerBiens($idBien) {
        $this->check_session();
        if (isset($idBien)) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //Initialisation
            //Liste des types de bien
            $listeBien = array();
            $infoInit = array();
            $resultBien = $this->TypeBien->listerTypeBien();
            foreach ($resultBien->result() as $row) {
                $listeBien[] = $row->TypeBienLibelle;
            }

            $typeBien['typeBien'] = $listeBien;
            $infoInit[] = $typeBien;

            //Liste des pieces
            $listePieceBien = array();
            $resultPiece = $this->PiecesBien->listerPiecesBien();
            foreach ($resultPiece->result() as $row) {
                $listePieceBien[] = $row->PiecesLibelle;
            }
            $pieceBien['pieceBien'] = $listePieceBien;
            $infoInit[] = $pieceBien;


            //Chargement des infos du bien
            $reqGetBien = $this->Bien->getBien_ByID($idBien);

            foreach ($reqGetBien->result() as $row) {
                $bien['libelleBien'] = $row->bienLibelle;
                $bien['localisationBien'] = $row->bienLocalisation;
                $bien['dateCreationBien'] = $row->bienDateCreation;
                $bien['idTypeBien'] = $row->TypeBien_idTypeBien;
                $bien['idProprietaire'] = $row->Personne_idPersonne;
                $bien['idImmeuble'] = $row->Immeubles_idImmeubles;
                $bien['feuilleCadastrale'] = $row->feuilleCadastrale;
                $bien['parcelleCadastrale'] = $row->parcelleCadastrale;
                $bien['categorieCadastrale'] = $row->categorieCadastrale;
                $bien['valeurLocataiveCadastrale'] = $row->valeurLocataiveCadastrale;
                $bien['lot'] = $row->lot;
                $bien['millieme'] = $row->millieme;
                $bien['parking'] = $row->parking;
                $bien['autresDependance'] = $row->autresDependance;
                $bien['cave'] = $row->cave;
                $bien['typeLocation'] = $row->typeLocation;
                $bien['loyerHC'] = $row->loyerHC;
                $bien['charges'] = $row->charges;
                $bien['taxeHabitation'] = $row->taxeHabitation;
                $bien['taxeFonciere'] = $row->taxeFonciere;
                $bien['dateAcquisition'] = $row->dateAcquisition;
                $bien['prixAcquisition'] = $row->prixAcquisition;
                $bien['fraisAcquisition'] = $row->fraisAcquisition;
                $bien['nomCentreiImpot'] = $row->nomCentreiImpot;
                $bien['adresse1CentreImpot'] = $row->adresse1CentreImpot;
                $bien['adresse2CentreImpot'] = $row->adresse2CentreImpot;
                $bien['codePostale'] = $row->codePostale;
                $bien['ville'] = $row->ville;
                $bien['description'] = $row->description;
                $bien['notes'] = $row->notes;
                $bien['libAssurance'] = $row->libAssurance;
                $bien['dateSouscriptionAssurance'] = $row->dateSouscriptionAssurance;
                $bien['dateEcheanceAssurance'] = $row->dateEcheanceAssurance;
            }

            //Recuperation du type de bien
            $reqTypeBien = $this->TypeBien->getTypeBien_ByID($bien['idTypeBien']);
            foreach ($reqTypeBien->result() as $row) {
                $typeBienLibelle = $row->TypeBienLibelle;
            }

            //Recuperation du nombre de piece
            $bienPiece = null;
            $reqGetBienHasPiece = $this->Bien_Has_Piece->getBienHasPiece_ByIdBien($idBien);
            foreach ($reqGetBienHasPiece->result() as $row) {
                $bienPiece['idPiece'] = $row->Pieces_idPieces;
                $bienPiece['NombrePiece'] = $row->NombrePiece;
                $bienPiece['superficiePiece'] = $row->superficiePiece;
            }

            //Recuperation de la piece
            if ($bienPiece != null) {
                $reqGetPieceBien = $this->PiecesBien->getPiecesBien_ByID($bienPiece['idPiece']);
                foreach ($reqGetPieceBien->result() as $row) {
                    $pieceBien = $row->PiecesLibelle;
                }
            }

            //recuperation des caracteristiques
            $reqGetcarac = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($idBien);
            $biencarac = array();
            foreach ($reqGetcarac->result() as $row) {
                $biencarac[] = $row->CaracteristiquesBiens_idCaracteristiquesBiens;
            }

            $libelleCarac = array();
            for ($i = 0; $i < sizeof($biencarac); $i++) {
                $reqgetCaracLibelle = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByID($biencarac[$i]);
                foreach ($reqgetCaracLibelle->result() as $row) {
                    $libelleCarac[] = $row->CaracteristiquesLibelle;
                }
            }

            //Constitution des donnees a transmettre
            $info['idBien'] = $idBien;
            $info['idTypeBien'] = $bien['idTypeBien'];
            $info['idProprietaire'] = $bien['idProprietaire'];
            $info['idImmeuble'] = $bien['idImmeuble'];
            $info['libelleBien'] = $bien['libelleBien'];
            $info['localisationBien'] = $bien['localisationBien'];
            $info['dateCreationBien'] = $bien['dateCreationBien'];
            $info['feuilleCadastrale'] = $bien['feuilleCadastrale'];
            $info['parcelleCadastrale'] = $bien['parcelleCadastrale'];
            $info['categorieCadastrale'] = $bien['categorieCadastrale'];
            $info['valeurLocataiveCadastrale'] = $bien['valeurLocataiveCadastrale'];
            $info['lot'] = $bien['lot'];
            $info['millieme'] = $bien['millieme'];
            $info['parking'] = $bien['parking'];
            $info['autresDependance'] = $bien['autresDependance'];
            $info['cave'] = $bien['cave'];
            $info['typeLocation'] = $bien['typeLocation'];
            $info['loyerHC'] = $bien['loyerHC'];
            $info['charges'] = $bien['charges'];
            $info['taxeHabitation'] = $bien['taxeHabitation'];
            $info['taxeFonciere'] = $bien['taxeFonciere'];
            $info['dateAcquisition'] = $bien['dateAcquisition'];
            $info['prixAcquisition'] = $bien['prixAcquisition'];
            $info['fraisAcquisition'] = $bien['fraisAcquisition'];
            $info['nomCentreiImpot'] = $bien['nomCentreiImpot'];
            $info['adresse1CentreImpot'] = $bien['adresse1CentreImpot'];
            $info['adresse2CentreImpot'] = $bien['adresse2CentreImpot'];
            $info['codePostale'] = $bien['codePostale'];
            $info['ville'] = $bien['ville'];
            $info['description'] = $bien['description'];
            $info['notes'] = $bien['notes'];
            $info['libAssurance'] = $bien['libAssurance'];
            $info['dateSouscriptionAssurance'] = $bien['dateSouscriptionAssurance'];
            $info['dateEcheanceAssurance'] = $bien['dateEcheanceAssurance'];

            $info['typeBien'] = $typeBienLibelle;
            $info['NombrePiece'] = $bienPiece['NombrePiece'];
            $info['superficiePiece'] = $bienPiece['superficiePiece'];
            $info['caracteristques'] = $libelleCarac;
            $info['init'] = $infoInit;

            $infoBien['bien'] = $info;
        }

        //Liste des propriétaires
        $listeProprietaire = $this->Personne->getPersonne_ByRole(4, $idAgence)->result_array();
        $infoBien['bien'][] = $listeProprietaire;

        //Liste de groupements
        $listeGroupement = array();
        $groupeUnique = array();
        $reqGetGroupement = $this->GroupeBien->listerGroupeBien($idAgence);
        foreach ($reqGetGroupement->result() as $row) {
            $groupeUnique['idImmeuble'] = $row->idImmeubles;
            $groupeUnique['nomImmeuble'] = $row->NomImmeubles;

            $listeGroupement[] = $groupeUnique;
        }
        //$groupement['groupement'] = $listeGroupement;
        $infoBien['bien'][] = $listeGroupement;


        //var_dump($_FILES);
        //var_dump($infoBien);
        $this->setData();
        // var_dump(dirname(__FILE__, 3));

        $this->load->view('administration/header');
        $this->load->view('administration/dupliquerBiens', $infoBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerModifbien');
    }

    public function modifierGroupeBiens($idImmeuble) {
        $this->check_session();
        if (isset($idImmeuble)) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //Initialisation
            $groupeBien = array();
            $reqGetImmeuble = $this->GroupeBien->getImmeuble_byID($idImmeuble);

            foreach ($reqGetImmeuble->result() as $row) {
                $groupeBien['groupeBien']['id'] = $row->idImmeubles;
                $groupeBien['groupeBien']['nom'] = $row->NomImmeubles;
                $groupeBien['groupeBien']['adresse'] = $row->AdresseImmeubles;
                $groupeBien['groupeBien']['superficie'] = $row->SuperficieImmeubles;
                $groupeBien['groupeBien']['dateCreation'] = $row->DateConstructImmeubles;
                $groupeBien['groupeBien']['description'] = $row->DescriptionImmeubles;
                $groupeBien['groupeBien']['idPersonne'] = $row->personne_idPersonne;
            }

            //Liste des propriétaires
            $listeProprietaire = array();
            $listeProprietaire = $this->Personne->getPersonne_ByRole(4, $idAgence)->result_array();
            $groupeBien['proprietaire'] = $listeProprietaire;

            //Liste des biens
            $listeBiens = array();
            $listeBiens = $this->Bien->listerBienImmeuble($idImmeuble, $idAgence)->result_array();
            $groupeBien['biens'] = $listeBiens;

            //var_dump($groupeBien);
            $this->setData();

            $this->load->view('administration/header');
            $this->load->view('administration/modifierGroupeBien', $groupeBien);
            $this->load->view('administration/menu_footer', $this->data);
        }
    }

    public function modificationBien($idBien) {
        $this->check_session();
        if (isset($idBien)) {
            $idPersonne = $this->input->post('propriettaireNomModif');

            $typeBien = $this->input->post('typeBien');
            $libelleBien = $this->input->post('libelleBien');
            $localisationBien = $this->input->post('localisationBien');
            $superficie = $this->input->post('superficieBien');
            $nbPiece = $this->input->post('nbPieceBien');
            $dateCreationBien = $this->input->post('dateCreationBien');

            $carac1 = $this->input->post('carac1');
            $carac2 = $this->input->post('carac2');
            $carac3 = $this->input->post('carac3');
            $carac4 = $this->input->post('carac4');
            $carac5 = $this->input->post('carac5');
            $carac6 = $this->input->post('carac6');
            $carac7 = $this->input->post('carac7');
            $carac8 = $this->input->post('carac8');
            $carac9 = $this->input->post('carac9');
            $carac10 = $this->input->post('carac10');

            $feuilleCadastrale = $this->input->post('feuilleCadastrale');
            $parcelleCadastrale = $this->input->post('parcelleCadastrale');
            $categorieCadastrale = $this->input->post('categorieCadastrale');
            $valeurLocataiveCadastrale = $this->input->post('valeurLocataiveCadastrale');
            $lot = $this->input->post('lot');
            $millieme = $this->input->post('millieme');
            $parking = $this->input->post('parking');
            $autresDependance = $this->input->post('autresDependance');
            $cave = $this->input->post('cave');
            $typeLocation = $this->input->post('typeLocationBien');
            $loyerHC = str_replace(",", "", $this->input->post('loyerHC'));
            $charge = str_replace(",", "", $this->input->post('charge'));
            $taxeHabitation = $this->input->post('taxeHabitation');
            $taxeFonciere = $this->input->post('taxeFonciere');
            $dateAcquisition = $this->input->post('dateAcquisition');
            $prixAcquisition = $this->input->post('prixAcquisition');
            $fraisAcquisition = $this->input->post('fraisAcquisition');
            $nomCentre = $this->input->post('nomCentre');
            $adresse1 = $this->input->post('adresse1');
            $adresse2 = $this->input->post('adresse2');
            $codePostal = $this->input->post('codePostal');
            $ville = $this->input->post('ville');
            $descriptionBien = $this->input->post('descriptionBien');
            $notes = $this->input->post('notes');
            $assurance = $this->input->post('assurance');
            $dateSouscripAssurance = $this->input->post('dateSouscripAssurance');
            $dateEcheanceAssurance = $this->input->post('dateEcheanceAssurance');

            $idImmeuble = $this->input->post('idImmeuble');


            //Recuperation du bien par l'id

            /* $reqRecuBien = $this->Bien->getBien_ByID($idBien);
              foreach ($reqRecuBien->result() as $row) {
              $idPersonne = $row->Personne_idPersonne;
              } */

            //recuperation des pieces du bien
            $pieceDuBien = $this->PiecesBien->getPiecesBien_ByLibelle($nbPiece);
            foreach ($pieceDuBien->result() as $row) {
                $idPieceDuBien = $row->idPieces;
            }
            
            
            //Recuperation  du type de bien
            $typeBienGet = $this->TypeBien->getTypeBien_ByLibelle($typeBien);
            foreach ($typeBienGet->result() as $row) {
                $idTypeBien = $row->idTypeBien;
            }

            GLOBAL $nomProprietaire;
			//Recuperation du nom du proprietaire
			$reqGetPersonne = $this->Physique->getPhysique_ByIDPersonne($idPersonne);
			foreach ($reqGetPersonne->result() as $row) {
				if($row->Nom_PersPhys != "" && $row->Prenom_PersPhys != ""){
					$nomProprietaire = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
				}else{
					$nomProprietaire = $row->DenomPers_Morale;
				}
			}

			//Update du Bien
            if ($idImmeuble == 0) {
                $insertBien = $this->Bien->modifierBien($libelleBien, $localisationBien, $dateCreationBien, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charge, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentre, $adresse1, $adresse2, $codePostal, $ville, $descriptionBien, $notes, $assurance, $dateSouscripAssurance, $dateEcheanceAssurance, $nomProprietaire, $idPersonne, $idBien, null);
            } else {
                $insertBien = $this->Bien->modifierBien($libelleBien, $localisationBien, $dateCreationBien, $feuilleCadastrale, $parcelleCadastrale, $categorieCadastrale, $valeurLocataiveCadastrale, $lot, $millieme, $parking, $autresDependance, $cave, $typeLocation, $loyerHC, $charge, $taxeHabitation, $taxeFonciere, $dateAcquisition, $prixAcquisition, $fraisAcquisition, $nomCentre, $adresse1, $adresse2, $codePostal, $ville, $descriptionBien, $notes, $assurance, $dateSouscripAssurance, $dateEcheanceAssurance, $nomProprietaire, $idPersonne, $idBien, $idImmeuble);
            }

            //Recuperation de l'id du bien créé
            /* $getBien = $this->Bien->getBien($libelleBien, $localisationBien, $dateCreationBien, $nomProprietaire);
              foreach ($getBien->result() as $row) {
              $idBienCree = $row->idbien;
              } */

            //Insertion de Bien_has_pieces
            $supBienHasPiece = $this->Bien_Has_Piece->supprimerBienHasPiece_ByIdBien($idBien);
            $insertBienHasPiece = false;
            if ($supBienHasPiece) {
                $insertBienHasPiece = $this->Bien_Has_Piece->creerBienHasPiece($idBien, $idPersonne, $idTypeBien, $idPieceDuBien, $nbPiece, $superficie);
            }


            //Insertion caraceristiques bien
            if (!empty($carac1) or ! empty($carac2) or ! empty($carac3) or ! empty($carac4)
                    or ! empty($carac5) or ! empty($carac6) or ! empty($carac7) or ! empty($carac8)
                    or ! empty($carac9) or ! empty($carac10)) {

                $supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);

                if ($supBienHasCara) {
                    if (!empty($carac1)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac1);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques

                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac2)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac2);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }
                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac3)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac3);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac4)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac4);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }

                    if (!empty($carac5)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac5);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        // $supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac6)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac6);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac7)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac7);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                    if (!empty($carac8)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac8);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }

                    if (!empty($carac9)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac9);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        //$supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }

                    if (!empty($carac10)) {
                        //Recuperation de l'id de la caracteristique
                        $reqCarac = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByLibelle($carac10);
                        foreach ($reqCarac->result() as $row) {
                            $idCaracBien = $row->idCaracteristiquesBiens;
                        }

                        //Insertion Bien_has_caracteristiques
                        // $supBienHasCara = $this->Bien_Has_Caracteristiques->supprimerBienHasCarateristiques_ByIdBien($idBien);
                        if ($supBienHasCara) {
                            $reqInsertBiencara = $this->Bien_Has_Caracteristiques->creerBienHasCarateristiques($idBien, $idPersonne, $idTypeBien, $idCaracBien);
                        }
                    }
                }
            }


            if ($insertBien and $insertBienHasPiece) {
                //redirect('AccueilAdmin/modifierBiens/' . $idBien);
                echo 'success';
            } else {
                echo 'Erreur';
            }
        }
    }

    public function modificationGroupeBien($idImmeuble) {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            if (isset($idImmeuble)) {
                $idPersonne = $this->input->post('groupePropriettaireNomModif');
                $libelle = $this->input->post('libelle');
                $localisation = $this->input->post('localisation');
                $superficie = $this->input->post('superficie');
                $dateCreation = $this->input->post('dateCreation');
                $description = $this->input->post('description');
                $bienAssocie = $this->input->post('biensAssocie');

                $insert = $this->GroupeBien->modifierGroupeBien($idPersonne, $libelle, $localisation, $superficie, $dateCreation, $description, $idImmeuble);

                //Suppression puis insertion de idImmeuble dans bien
                $deleteBien = $this->Bien->deleteIdImmeuble($idImmeuble);
                if (isset($bienAssocie) && !empty($bienAssocie)) {

                    foreach ($bienAssocie as $row) {
                        $insertBien = $this->Bien->updateIdImmeuble($idImmeuble, $row);
                    }
                }

                if ($insert) {
                    echo 'Success';
                } else {
                    echo 'Erreur';
                }
            }
        } else {
            echo 'Session expirée';
        }
    }

    public function GestLocataire() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }
            //INITIALISATION
            $infoLocataire = array();

            //Recuperation de la liste des locataires
            //Par le role
            $roleLocataire = $this->Personne_has_role->getPersonneHasRole_Locataire($idAgence);
			$locataire = $roleLocataire->Result_array();


			$infoLocataire['locataire'] = $locataire;
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listLocataire', $infoLocataire);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function AddLocataire() {
        $this->check_session();
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/addLocataire');
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerAddLocataire', $this->data);
    }

    public function creerLocataire() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            $typePersonne = $this->input->post('type-personne');
            $civilite = $this->input->post('sexe');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $dateNais = $this->input->post('dateNais');
            $lieuNais = $this->input->post('lieuNais');
            $denomination = $this->input->post('denomination');
            $numRc = $this->input->post('numRc');
            $formeJurid = $this->input->post('formeJurid');
            $contrib = $this->input->post('contrib');
            //$photo = $_FILES['photo'];
            $adresse1 = $this->input->post('adresse1');
            $ville = $this->input->post('ville');
            $pays = $this->input->post('pays');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $cel = $this->input->post('cel');

            //Initialisation des variables de retour
            $reqCreerPersonne = false;
            $resultPhys = false;
            $resultPersRole = false;
            $resultUpdateAgence = false;

            //Insertion dans la table Personne
            $reqCreerPersonne = $this->Personne->creerPersonne($adresse1, $email, $tel, $cel, null, $ville, $pays);

            //Recuperation de l'ID de la personne via son email
            $resuultPersonneEmail = $this->Personne->getPersonne_ByMail($email);
            foreach ($resuultPersonneEmail->result() as $row) {
                $idPersonneCree = $row->idPersonne;
            }

            if ($typePersonne == 0) {
                //Insertion dans la table Physique
                $resultPhys = $this->Physique->creerPhysique($idPersonneCree, null, $nom, $prenom, $dateNais, $lieuNais, $civilite);
            } else {
                //Insertion dans la table Morale
                $resultPhys = $this->Morale->creerMoraleLocataire($idPersonneCree, $denomination, $numRc, $formeJurid, $contrib);
            }
            //Insertion dans la table Personne_has_role (Liaison Personne et role
            $resultRole = $this->Role->getRole_ByLibelle('locataire');
            foreach ($resultRole->result() as $row) {
                $idRoleLocataire = $row->idrole;
            }

            //INSERTION
            $resultPersRole = $this->Personne_has_role->creerPersonneHasRole($idPersonneCree, $idRoleLocataire);

            //Ajout de l'id de l'agence
            $resultUpdateAgence = $this->Personne_has_role->setIdAgence($idAgence, $idPersonneCree);

            //Upload du fichier image telechargé
            /* $maxsize = 5242880; //5Megas
              //Test1: fichier correctement uploadé
              if (!isset($photo) OR $photo['error'] > 0)
              echo "l'envoi du fichier a échoué";
              //Test2: taille limite
              if ($photo['size'] > $maxsize)
              echo "La taille maximale est de 5 Mega";

              $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
              //1. strrchr renvoie l'extension avec le point (« . »).
              //2. substr(chaine,1) ignore le premier caractère de chaine.
              //3. strtolower met l'extension en minuscules.
              $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
              if (in_array($extension_upload, $extensions_valides))
              echo "Extension correcte";

              //Taille de l'image
              /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */


            /* $nomFichier = "C:/xampp/htdocs/Locagest/assets/user-image/{$idPersonne}.{$extension_upload}";
              $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nomFichier);
              if ($resultat)
              echo "Transfert réussi";

              $reqUpdateUser = $this->User->updateUser($idPersonne, $idPersonne . "." . $extension_upload); */

            if ($reqCreerPersonne and $resultPhys and $resultPersRole and $resultUpdateAgence) {
                //redirect('AccueilAdmin/GestLocataire');
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        }
    }

    public function locataireInfo($idLocataire) {
        $this->check_session();
        if (isset($idLocataire)) {
            //Chargement des infos du proprietaire
            $infoPhysiq = array();
            $infoMor = array();
            //en tant que personne physique
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($idLocataire);
            foreach ($resultPers->result() as $row) {
                $persPhys['nom'] = $row->Nom_PersPhys;
                $persPhys['prenom'] = $row->Prenom_PersPhys;
                $persPhys['dateNais'] = $row->DateNaiss_PersPhys;
                $persPhys['lieuNais'] = $row->LieuNaiss_PersPhys;
                $persPhys['sexe'] = $row->SexePersPhys;

                $infoPhysiq[] = $persPhys;
            }

            //en tant que personne morale
            $resultPers = $this->Morale->getMorale_ByIDPersonne($idLocataire);
            foreach ($resultPers->result() as $row) {
                $persMor['denomination'] = $row->DenomPers_Morale;
                $persMor['numRC'] = $row->RCCM_Morale;
                $persMor['formJurid'] = $row->FomeJuridique_Morale;
                $persMor['compteContrib'] = $row->CompteContrib_Morale;

                $infoMor[] = $persMor;
            }

            //En tant que personne
            $resultPersonne = $this->Personne->getPersonne_ByID($idLocataire);
            foreach ($resultPersonne->result() as $row) {
                $pers['situationGeo'] = $row->PersonneSituationGeo;
                $pers['tel'] = $row->PersonneTel;
                $pers['cel'] = $row->PersonneCel;
                $pers['email'] = $row->PersonneEmail;
                $pers['ville'] = $row->PersonneVille;
                $pers['pays'] = $row->PersonnePays;

                $infoPersonne[] = $pers;
            }

            for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                if (sizeof($infoPhysiq) > 0) {
                    $info['nom'] = $persPhys['nom'];
                    $info['prenom'] = $persPhys['prenom'];
                    $info['dateNais'] = $persPhys['dateNais'];
                    $info['lieuNais'] = $persPhys['lieuNais'];
                    $info['sexe'] = $persPhys['sexe'];
                    $info['typePersonne'] = '0';
                }
                if (sizeof($infoMor) > 0) {
                    $info['denomination'] = $persMor['denomination'];
                    $info['numRC'] = $persMor['numRC'];
                    $info['formJurid'] = $persMor['formJurid'];
                    $info['compteContrib'] = $persMor['compteContrib'];
                    $info['typePersonne'] = '1';
                }
                $info['situationGeo'] = $pers['situationGeo'];
                $info['tel'] = $pers['tel'];
                $info['cel'] = $pers['cel'];
                $info['email'] = $pers['email'];
                $info['ville'] = $pers['ville'];
                $info['pays'] = $pers['pays'];
            }
            //var_dump($info);
            //Chargement de la liste des piece

            $resultPiece = $this->Piece->getPieceLibelle();
            foreach ($resultPiece->result() as $row) {
                $pieceLibelle['libelle'] = $row->TypePieceLibelle;
                //echo var_dump($row->TypePieceLibelle);
            }

            //echo var_dump($pieceLibelle);
            //print_r($pieceLibelle);
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/locataireInfos', $info);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function locataireModif($idLocataire) {
        $this->check_session();
        if (isset($idLocataire)) {
            //Chargement des infos du locataire
            $infoPhysiq = array();
            $infoMor = array();
            //en tant que personne physique
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($idLocataire);
            foreach ($resultPers->result() as $row) {
                $persPhys['nom'] = $row->Nom_PersPhys;
                $persPhys['prenom'] = $row->Prenom_PersPhys;
                $persPhys['dateNais'] = $row->DateNaiss_PersPhys;
                $persPhys['lieuNais'] = $row->LieuNaiss_PersPhys;
                $persPhys['sexe'] = $row->SexePersPhys;

                $infoPhysiq[] = $persPhys;
            }
            //en tant que personne morale
            $resultPers = $this->Morale->getMorale_ByIDPersonne($idLocataire);
            foreach ($resultPers->result() as $row) {
                $persMor['denomination'] = $row->DenomPers_Morale;
                $persMor['numRC'] = $row->RCCM_Morale;
                $persMor['formJurid'] = $row->FomeJuridique_Morale;
                $persMor['compteContrib'] = $row->CompteContrib_Morale;

                $infoMor[] = $persMor;
            }

            //En tant que personne
            $resultPersonne = $this->Personne->getPersonne_ByID($idLocataire);
            foreach ($resultPersonne->result() as $row) {
                $pers['situationGeo'] = $row->PersonneSituationGeo;
                $pers['tel'] = $row->PersonneTel;
                $pers['cel'] = $row->PersonneCel;
                $pers['email'] = $row->PersonneEmail;
                $pers['ville'] = $row->PersonneVille;
                $pers['pays'] = $row->PersonnePays;

                $infoPersonne[] = $pers;
            }

            for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                if (sizeof($infoPhysiq) > 0) {
                    $info['nom'] = $persPhys['nom'];
                    $info['prenom'] = $persPhys['prenom'];
                    $info['dateNais'] = $persPhys['dateNais'];
                    $info['lieuNais'] = $persPhys['lieuNais'];
                    $info['sexe'] = $persPhys['sexe'];
                    $info['typePersonne'] = '0';
                }
                if (sizeof($infoMor) > 0) {
                    $info['denomination'] = $persMor['denomination'];
                    $info['numRC'] = $persMor['numRC'];
                    $info['formJurid'] = $persMor['formJurid'];
                    $info['compteContrib'] = $persMor['compteContrib'];
                    $info['typePersonne'] = '1';
                }
                $info['situationGeo'] = $pers['situationGeo'];
                $info['tel'] = $pers['tel'];
                $info['cel'] = $pers['cel'];
                $info['email'] = $pers['email'];
                $info['ville'] = $pers['ville'];
                $info['pays'] = $pers['pays'];
            }
            //var_dump($info);
            //Chargement de la liste des piece

            $resultPiece = $this->Piece->getPieceLibelle();
            foreach ($resultPiece->result() as $row) {
                $pieceLibelle['libelle'] = $row->TypePieceLibelle;
                //echo var_dump($row->TypePieceLibelle);
            }

            //echo var_dump($pieceLibelle);
            //print_r($pieceLibelle);
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/locataireModif', $info);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function modifierLocataire($idLocataire) {
        $this->check_session();
        if (isset($idLocataire)) {
            $typePersonne = $this->input->post('typePersonne');
            $civilite = $this->input->post('sexe');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $dateNais = $this->input->post('dateNais');
            $lieuNais = $this->input->post('lieuNais');
            $denomination = $this->input->post('denomination');
            $numRc = $this->input->post('numRc');
            $formeJurid = $this->input->post('formeJurid');
            $contrib = $this->input->post('contrib');
            //$photo = $_FILES['photo'];
            $adresse1 = $this->input->post('adresse1');
            $ville = $this->input->post('ville');
            $pays = $this->input->post('pays');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $cel = $this->input->post('cel');

            //Update de la personne
            $reqUpdatePersonne = $this->Personne->updatePersonne($idLocataire, $adresse1, $email, $tel, $cel, null, $ville, $pays);

            if ($typePersonne == 0) {
                $reqUpdatePhysique = $this->Physique->updatePhysique($idLocataire, null, $nom, $prenom, $dateNais, $lieuNais, $civilite, null);
            } else {
                $reqUpdatePhysique = $this->Morale->modifierMoraleLocataire($idLocataire, $denomination, $numRc, $formeJurid, $contrib);
            }

            //Upload du fichier image telechargé
            $maxsize = 5242880; //5Megas
            //Test1: fichier correctement uploadé
            /* if (!isset($photo) OR $photo['error'] > 0)
              echo "l'envoi du fichier a échoué";
              //Test2: taille limite
              if ($photo['size'] > $maxsize)
              echo "La taille maximale est de 5 Mega";

              $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
              //1. strrchr renvoie l'extension avec le point (« . »).
              //2. substr(chaine,1) ignore le premier caractère de chaine.
              //3. strtolower met l'extension en minuscules.
              $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
              if (in_array($extension_upload, $extensions_valides))
              echo "Extension correcte";

              //Taille de l'image
              /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

            /* $this->nomPrenom = $nom . $prenom;
              $this->userIcon = $nom_prenom . "." . $extension_upload; */
            /* $nom_prenom = $nom . $prenom;
              var_dump($extension_upload);

              $nomFichier = "C:/xampp/htdocs/Locagest/assets/user-image/{$nom_prenom}.{$extension_upload}";
              $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nomFichier);
              if ($resultat) {
              echo "Transfert réussi";
              $reqUpdateUser = $this->User->updateIcone($idPersonne, $nom_prenom . "." . $extension_upload);
              }

              $reqUpdateUser = $this->User->updateUser($idPersonne, $email); */


            if ($reqUpdatePersonne and $reqUpdatePhysique) {
                $this->setData();
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        } else {
            echo 'Erreur';
        }
    }

    public function supprimerLocataire($idLocataire) {
        $this->check_session();
        //Initiialisation des variables de retour
        $reqUpdatePersonne = false;
        if (isset($idLocataire)) {
            //Update de la personne
            $reqUpdatePersonne = $this->Personne->supprimerPersonne($idLocataire);

            if ($reqUpdatePersonne) {
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        } else {
            echo 'Erreur';
        }
    }

    public function bienInfo($idBien = 0) {
        $this->check_session();
        if (isset($idBien)) {
            //Initialisation
            //Liste des types de bien
            $listeBien = array();
            $infoInit = array();
            $resultBien = $this->TypeBien->listerTypeBien();
            foreach ($resultBien->result() as $row) {
                $listeBien[] = $row->TypeBienLibelle;
            }

            $typeBien['typeBien'] = $listeBien;
            $infoInit[] = $typeBien;

            //Liste des pieces
            $listePieceBien = array();
            $resultPiece = $this->PiecesBien->listerPiecesBien();
            foreach ($resultPiece->result() as $row) {
                $listePieceBien[] = $row->PiecesLibelle;
            }
            $pieceBien['pieceBien'] = $listePieceBien;
            $infoInit[] = $pieceBien;


            //Chargement des infos du bien
            $reqGetBien = $this->Bien->getBien_ByID($idBien);
            foreach ($reqGetBien->result() as $row) {
                $bien['libelleBien'] = $row->bienLibelle;
                $bien['localisationBien'] = $row->bienLocalisation;
                $bien['dateCreationBien'] = $row->bienDateCreation;
                $bien['idTypeBien'] = $row->TypeBien_idTypeBien;
                $bien['proprietaire'] = $row->bienNomProprietaire;
                $bien['feuilleCadastrale'] = $row->feuilleCadastrale;
                $bien['parcelleCadastrale'] = $row->parcelleCadastrale;
                $bien['categorieCadastrale'] = $row->categorieCadastrale;
                $bien['valeurLocataiveCadastrale'] = $row->valeurLocataiveCadastrale;
                $bien['lot'] = $row->lot;
                $bien['millieme'] = $row->millieme;
                $bien['parking'] = $row->parking;
                $bien['autresDependance'] = $row->autresDependance;
                $bien['cave'] = $row->cave;
                $bien['typeLocation'] = $row->typeLocation;
                $bien['loyerHC'] = $row->loyerHC;
                $bien['charges'] = $row->charges;
                $bien['taxeHabitation'] = $row->taxeHabitation;
                $bien['taxeFonciere'] = $row->taxeFonciere;
                $bien['dateAcquisition'] = $row->dateAcquisition;
                $bien['prixAcquisition'] = $row->prixAcquisition;
                $bien['fraisAcquisition'] = $row->fraisAcquisition;
                $bien['nomCentreiImpot'] = $row->nomCentreiImpot;
                $bien['adresse1CentreImpot'] = $row->adresse1CentreImpot;
                $bien['adresse2CentreImpot'] = $row->adresse2CentreImpot;
                $bien['codePostale'] = $row->codePostale;
                $bien['ville'] = $row->ville;
                $bien['description'] = $row->description;
                $bien['notes'] = $row->notes;
                $bien['libAssurance'] = $row->libAssurance;
                $bien['dateSouscriptionAssurance'] = $row->dateSouscriptionAssurance;
                $bien['dateEcheanceAssurance'] = $row->dateEcheanceAssurance;
                $idImmeuble = $row->Immeubles_idImmeubles;
            }

            //Recuperation du groupement de bien associé
            //Liste des propriétaires
            $bien['groupement'] = "Aucun groupement d'appartenance";
            if (isset($idImmeuble) && $idImmeuble != null) {
                $reqGetImmeuble = $this->Immeuble->getImmeuble($idImmeuble);
                foreach ($reqGetImmeuble->result() as $row) {
                    $bien['groupement'] = $row->NomImmeubles;
                }
            }

            //Recuperation du type de bien
            $reqTypeBien = $this->TypeBien->getTypeBien_ByID($bien['idTypeBien']);
            foreach ($reqTypeBien->result() as $row) {
                $typeBienLibelle = $row->TypeBienLibelle;
            }

            //Recuperation du nombre de piece
            $bienPiece = null;
            $reqGetBienHasPiece = $this->Bien_Has_Piece->getBienHasPiece_ByIdBien($idBien);
            foreach ($reqGetBienHasPiece->result() as $row) {
                $bienPiece['idPiece'] = $row->Pieces_idPieces;
                $bienPiece['NombrePiece'] = $row->NombrePiece;
                $bienPiece['superficiePiece'] = $row->superficiePiece;
            }

            //Recuperation de la piece
            if ($bienPiece != null) {
                $reqGetPieceBien = $this->PiecesBien->getPiecesBien_ByID($bienPiece['idPiece']);
                foreach ($reqGetPieceBien->result() as $row) {
                    $pieceBien = $row->PiecesLibelle;
                }
            }

            //recuperation des caracteristiques
            $reqGetcarac = $this->Bien_Has_Caracteristiques->listerBienHasCarateristiques($idBien);
            $biencarac = array();
            foreach ($reqGetcarac->result() as $row) {
                $biencarac[] = $row->CaracteristiquesBiens_idCaracteristiquesBiens;
            }

            $libelleCarac = array();
            for ($i = 0; $i < sizeof($biencarac); $i++) {
                $reqgetCaracLibelle = $this->CaracteristiquesBien->getCaracteristiquesBiens_ByID($biencarac[$i]);
                foreach ($reqgetCaracLibelle->result() as $row) {
                    $libelleCarac[] = $row->CaracteristiquesLibelle;
                }
            }

            //Constitution des donnees a transmettre
            $info['libelleBien'] = $bien['libelleBien'];
            $info['localisationBien'] = $bien['localisationBien'];
            $info['dateCreationBien'] = $bien['dateCreationBien'];
            $info['feuilleCadastrale'] = $bien['feuilleCadastrale'];
            $info['proprietaire'] = $bien['proprietaire'];
            $info['parcelleCadastrale'] = $bien['parcelleCadastrale'];
            $info['categorieCadastrale'] = $bien['categorieCadastrale'];
            $info['valeurLocataiveCadastrale'] = $bien['valeurLocataiveCadastrale'];
            $info['lot'] = $bien['lot'];
            $info['millieme'] = $bien['millieme'];
            $info['parking'] = $bien['parking'];
            $info['autresDependance'] = $bien['autresDependance'];
            $info['cave'] = $bien['cave'];
            $info['typeLocation'] = $bien['typeLocation'];
            $info['loyerHC'] = $bien['loyerHC'];
            $info['charges'] = $bien['charges'];
            $info['taxeHabitation'] = $bien['taxeHabitation'];
            $info['taxeFonciere'] = $bien['taxeFonciere'];
            $info['dateAcquisition'] = $bien['dateAcquisition'];
            $info['prixAcquisition'] = $bien['prixAcquisition'];
            $info['fraisAcquisition'] = $bien['fraisAcquisition'];
            $info['nomCentreiImpot'] = $bien['nomCentreiImpot'];
            $info['adresse1CentreImpot'] = $bien['adresse1CentreImpot'];
            $info['adresse2CentreImpot'] = $bien['adresse2CentreImpot'];
            $info['codePostale'] = $bien['codePostale'];
            $info['ville'] = $bien['ville'];
            $info['description'] = $bien['description'];
            $info['notes'] = $bien['notes'];
            $info['libAssurance'] = $bien['libAssurance'];
            $info['dateSouscriptionAssurance'] = $bien['dateSouscriptionAssurance'];
            $info['dateEcheanceAssurance'] = $bien['dateEcheanceAssurance'];
            $info['groupement'] = $bien['groupement'];

            $info['typeBien'] = $typeBienLibelle;
            $info['NombrePiece'] = $bienPiece['NombrePiece'];
            $info['superficiePiece'] = $bienPiece['superficiePiece'];
            $info['caracteristques'] = $libelleCarac;
            $info['init'] = $infoInit;

            $infoBien['bien'] = $info;
        }

        //var_dump($infoBien);
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/bienInfos', $infoBien);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function groupeBienInfo($idImmeuble = 0) {
        $this->check_session();
        if (isset($idImmeuble)) {
            //Initialisation
            $groupeBien = array();
            $reqGetImmeuble = $this->GroupeBien->getImmeuble_byID($idImmeuble);

            foreach ($reqGetImmeuble->result() as $row) {
                $groupeBien['groupeBien']['id'] = $row->idImmeubles;
                $groupeBien['groupeBien']['nom'] = $row->NomImmeubles;
                $groupeBien['groupeBien']['adresse'] = $row->AdresseImmeubles;
                $groupeBien['groupeBien']['superficie'] = $row->SuperficieImmeubles;
                $groupeBien['groupeBien']['dateCreation'] = $row->DateConstructImmeubles;
                $groupeBien['groupeBien']['description'] = $row->DescriptionImmeubles;
                $idProprietaire = $row->personne_idPersonne;
            }

            //Liste des propriétaires
            if (isset($idProprietaire) && $idProprietaire != null) {
                $reqGetPersonne = $this->Physique->getPhysique_ByIDPersonne($idProprietaire);
                foreach ($reqGetPersonne->result() as $row) {
                    $groupeBien['proprietaire'] = $row->Nom_PersPhys . " " . $row->Prenom_PersPhys;
                }
            }

            //var_dump($groupeBien);
            $this->setData();

            $this->load->view('administration/header');
            $this->load->view('administration/groupeBienInfo', $groupeBien);
            $this->load->view('administration/menu_footer', $this->data);
        }
    }

    public function imageBien($idBien = 0, $idTypeBien = 0) {
        $this->check_session();
        $folder = "image-bien";
        $folderBien = $this->destination_path . $folder . $this->dir_separator . $idBien;

        $reeqGetBien = $this->Bien->getBien_ByID($idBien);
        $libelleBien;
        if ($reeqGetBien != null) {
            foreach ($reeqGetBien->result() as $row) {
                $libelleBien = $row->bienLibelle;
                $idPersonne = $row->Personne_idPersonne;
            }
        }

        //var_dump($imageId);
        //var_dump($imageNom);
        //Upload des fichiers
        if (!empty($_FILES)) {

            $temp = $_FILES['file']['tmp_name'];

            $cptImage = 0;
            //$idPersonne = $_SESSION['idPersonne'];

            if (!is_dir($folderBien)) {
                mkdir($folderBien);
            }

            //$target_path = $destination_path . $idBien . $idPersonne . $cptImage;
            $target_path = $folderBien . $this->dir_separator . $_FILES['file']['name'];
            //move_uploaded_file($temp, $target_path);
            //Upload du fichier image telechargé
            $maxsize = 5242880; //5Megas
            //Test1: fichier correctement uploadé
            if (!isset($_FILES['file']) OR $_FILES['file']['error'] > 0) {
                echo "l'envoi du fichier a échoué";
            }
            //Test2: taille limite
            if ($_FILES['file']['size'] > $maxsize) {
                echo "La taille maximale est de 5 Mega";
            }
            $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.
            $extension_upload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
            if (in_array($extension_upload, $extensions_valides)) {
                echo "Extension correcte";
            }
            //Taille de l'image
            /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

            /* $this->nomPrenom = $nom . $prenom;
              $this->userIcon = $nom_prenom . "." . $extension_upload; */
            //$nom_prenom = $nom . $prenom;
            //var_dump($extension_upload);
            //$nomFichier = $target_path . "." . $extension_upload;
            $nomFichier = $target_path;
            var_dump($nomFichier);

            $nomRelatifFichier = $_FILES['file']['name'];

            $resultat = move_uploaded_file($temp, $nomFichier);

            if ($resultat) {
                $reqInsertImage = $this->ImageBien->creerImageBien($nomRelatifFichier, $idBien, $idPersonne, $idTypeBien, null);
            }

            $cptImage++;
        }
        //var_dump($_FILES);

        $this->setData();

        $bien = array(
            'idBien' => $idBien,
            'idTypeBien' => $idTypeBien,
            'libelleBien' => $libelleBien
        );

        $this->load->view('administration/header', $this->data);
        $this->load->view('administration/imageBien', $bien);
        $this->load->view('administration/menu_footer', $bien);
    }

    public function removeFile($idBien) {
        $this->check_session();
        if (isset($idBien)) {
            $file = $this->input->post("file");
            $folder = "image-bien";

            //var_dump($file);
            $folderBien = $this->destination_path . $folder . $this->dir_separator . $idBien . $this->dir_separator;

            if ($file && file_exists($folderBien . $file)) {
                unlink($folderBien . $file);

                //Suppression de l'image en BD
                $reqSupImage = $this->ImageBien->supprimerImage($idBien, $file);
            }

            $folderParent = $this->destination_path . $folder . $this->dir_separator . $idBien;
            if (is_dir($folderParent)) {
                /* if (!glob($folderParent . "*")) {
                  rmdir($folderParent);
                  } */

                if (sizeof(scandir($folderParent)) < 2) {
                    rmdir($folderParent);
                }
            }
        }
    }

    public function listeImage($idBien) {
        $this->check_session();
        $folder = "image-bien";
        $folderBien = $this->destination_path . $folder . $this->dir_separator . $idBien;

        //Charegement des fichier uploadé
        if ($idBien != 0) {
            /* $imageId;
              $imageNom;

              $idImage;
              $nomImage;

              $imageRef;

              $reqGetImage = $this->ImageBien->getImagesByIdBien($idBien);
              foreach ($reqGetImage->result() as $row) {
              $idImage = $row->idImages;
              $nomImage = $row->ImagesLien;

              $imageId[]['idImage'] = $idImage;
              $imageNom[]['nomImage'] = $nomImage;
              }


              for ($i = 0; $i < sizeof($imageId); $i++) {
              $imageRef[$i]['idImage'] = $imageId[$i]['idImage'];
              $imageRef[$i]['nomImage'] = $imageNom[$i]['nomImage'];
              } */

            //var_dump($imageRef);

            $files = get_filenames($folderBien);

            //Nous avons besoin du nom et de la taille des fichier pour le chargement du dropzone
            if ($files) {
                foreach ($files as &$file) {
                    $file = array(
                        "name" => $file,
                        'size' => filesize($folderBien . $this->dir_separator . $file)
                    );
                }
            }

            header("Content-type: text/json");
            header("Content-type: application/json");

            echo json_encode($files);
        }

        //header("Content-type:text/json");
    }

    /* public function ajouterPaiement($idLocation = 0) {
      $this->setData();

      $info['nomuser'] = $this->nomPrenom;
      $info['iconeuser'] = $this->userIcon;
      $info['emailuser'] = $this->emailUser;

      $this->load->view('administration/header');
      //if($page!=""){
      $this->load->view('administration/ajoutPaiement', $info);
      //}
      $this->load->view('administration/menu_footer', $this->data);
      //$this->load->view('administration/footer/footerProfile');
      } */

    public function listePaiement() {
        $this->check_session();
        $requeteDelLocation = $this->Locations->getAllLocation();
        $location = $requeteDelLocation->result_array();

        $location['bien'] = $location;
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listePaiement', $location);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function ajouterPaiement($idlocation) {
        $this->check_session();
        $this->setData();


        $location = $this->Locations->getAllLocationbyId($idlocation)->result_array();

        //Recuperation du proprietaire
        $proprietaire = $this->Bien->getProprietaireBien($location[0]['idbien'])->result_array();
        //Ajout des infos en session
        $sessionData = array(
            'location' => $location,
            'proprietaire' => $proprietaire
        );
        $this->session->set_userdata($sessionData);
//var_dump(json_encode($sessionData));
        $listedesMois = $this->Paiement->ListDesMois()->result_array();
        $typePaiement = $this->Paiement->TypePaiment()->result_array();
        $location['locationInfo'] = $location;
        $location['listeMois'] = $listedesMois;
        $location['TypePaiement'] = $typePaiement;



        $this->load->view('administration/header');
        $this->load->view('administration/ajoutPaiement', $location);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function GestAgents() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            //Recuperation de l'id de l'agence
            $idAgence = $_SESSION['idPersonne'];

            //INITIALISATION
            $infoLocataire = array();

            //Recuperation de la liste des agents
            //Par le role
            $roleLocataire = $this->Personne_has_role->getPersonneHasRole_Agent($idAgence);

            $idPersonne = array();
            foreach ($roleLocataire->result() as $row) {
                $idPersonne[] = $row->Personne_idPersonne;
            }

            $listePersonne = array();

            if (!empty($idPersonne)) {
                foreach ($idPersonne as $id) {
                    $reqRechPers = $this->Personne->getPersonne_ByID($id);
                    $reqRechPhys = $this->Physique->getPhysique_ByIDPersonne($id);

                    foreach ($reqRechPers->result() as $row) {
                        $personne = array(
                            'situationGeo' => $row->PersonneSituationGeo,
                            'email' => $row->PersonneEmail,
                            'cel' => $row->PersonneCel,
                            'idPersonne' => $row->idPersonne
                        );

                        $infoPersonne[] = $personne;
                    }

                    foreach ($reqRechPhys->result() as $row) {
                        $physique = array(
                            'nom' => $row->Nom_PersPhys,
                            'prenom' => $row->Prenom_PersPhys,
                        );

                        $infoPhysique[] = $physique;
                    }
                }

                for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                    $info['nom'] = $infoPhysique[$i]['nom'];
                    $info['prenom'] = $infoPhysique[$i]['prenom'];
                    $info['situationGeo'] = $infoPersonne[$i]['situationGeo'];
                    $info['idPersonne'] = $infoPersonne[$i]['idPersonne'];
                    $info['email'] = $infoPersonne[$i]['email'];
                    $info['cel'] = $infoPersonne[$i]['cel'];

                    $locataire[$i] = $info;
                }
                $infoLocataire['locataire'] = $locataire;


                //var_dump($infoLocataire);
            }
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listAgent', $infoLocataire);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function GestProprietaire() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //INITIALISATION
            $infoLocataire = array();

            //Recuperation de la liste des locataires
            //Par le role
            $proprietaires = $this->Personne_has_role->getPersonneHasRole_Propriettaire($idAgence);

            //var_dump($proprietaires);
            $infoLocataire['locataire'] = $proprietaires;
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/listProprietaire', $infoLocataire);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function AddAgent() {
        $this->check_session();
        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/addAgent');
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerAddLocataire', $this->data);
    }

    public function AddProprietaire() {
        $this->check_session();
        $this->setData();
        $this->load->view('administration/header');
        $this->load->view('administration/addProprietaire');
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerAddLocataire', $this->data);
    }

    public function creerAgent() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            //Recuperation de l'id de l'agence
            $idAgence = $_SESSION['idPersonne'];

            $civilite = $this->input->post('sexe');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $email = $this->input->post('email');

            //Initialisation des variables de retour
            $reqCreerPersonne = false;
            $resultPhys = false;
            $resultPersRole = false;
            $resultUpdateIdAgence = false;

            //Insertion dans la table Personne
            $reqCreerPersonne = $this->Personne->creerPersonne(null, $email, null, null, null, null, null);

            //Recuperation de l'ID de la personne via son email
            $resuultPersonneEmail = $this->Personne->getPersonne_ByMail($email);
            foreach ($resuultPersonneEmail->result() as $row) {
                $idPersonneCree = $row->idPersonne;
            }

            //Insertion dans la table Physique
            $resultPhys = $this->Physique->creerPhysique($idPersonneCree, null, $nom, $prenom, null, null, $civilite);

            //Insertion dans la table Personne_has_role (Liaison Personne et role
            $resultRole = $this->Role->getRole_ByLibelle('agent');
            foreach ($resultRole->result() as $row) {
                $idRoleAgent = $row->idrole;
            }

            //INSERTION
            $resultPersRole = $this->Personne_has_role->creerPersonneHasRole($idPersonneCree, $idRoleAgent);

            //Insertion de l'id de l'agent
            $updteIdAgent = $this->Personne_has_role->setIdAgence($idAgence, $idPersonneCree);

            //Insertion dans la table USER
            //username=email, password=123456
            $resultUser = $this->User->creerUser($idPersonneCree, $email, "123456", $email, null);


            if ($reqCreerPersonne and $resultPhys and $resultPersRole and $updteIdAgent and $resultUser) {
                //redirect('AccueilAdmin/GestLocataire');
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        }
    }

    public function creerProprietaire() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }
            $typePersonne = $this->input->post('type-personne-prop');
            $civilite = $this->input->post('sexe');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $dateNais = $this->input->post('dateNais');
            $lieuNais = $this->input->post('lieuNais');
            $denomination = $this->input->post('denomination');
            $numRc = $this->input->post('numRc');
            $formeJurid = $this->input->post('formeJurid');
            $contrib = $this->input->post('contrib');
            //$photo = $_FILES['photo'];
            $adresse1 = $this->input->post('adresse1');
            $ville = $this->input->post('ville');
            $pays = $this->input->post('pays');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $cel = $this->input->post('cel');

            //Initialisation des variables de retour
            $reqCreerPersonne = false;
            $resultPhys = false;
            $resultPersRole = false;
            $resultUpdateAgence = false;

            //Insertion dans la table Personne
            $reqCreerPersonne = $this->Personne->creerPersonne($adresse1, $email, $tel, $cel, null, $ville, $pays);

            //Recuperation de l'ID de la personne via son email
            $resuultPersonneEmail = $this->Personne->getPersonne_ByMail($email);
            foreach ($resuultPersonneEmail->result() as $row) {
                $idPersonneCree = $row->idPersonne;
            }

            if ($typePersonne == 0) {
                //Insertion dans la table Physique
                $resultPhys = $this->Physique->creerPhysique($idPersonneCree, null, $nom, $prenom, $dateNais, $lieuNais, $civilite);
            } else {
                //Insertion dans la table Morale
                $resultPhys = $this->Morale->creerMoraleLocataire($idPersonneCree, $denomination, $numRc, $formeJurid, $contrib);
            }

            //Insertion dans la table Personne_has_role (Liaison Personne et role
            $resultRole = $this->Role->getRole_ByLibelle('proprietaire');
            foreach ($resultRole->result() as $row) {
                $idRoleLocataire = $row->idrole;
            }

            //INSERTION
            $resultPersRole = $this->Personne_has_role->creerPersonneHasRole($idPersonneCree, $idRoleLocataire,$idAgence);

            //Ajout de l'id de l'agence
            $resultUpdateAgence = $this->Personne_has_role->setIdAgence($idAgence, $idPersonneCree);

            //Upload du fichier image telechargé
            /* $maxsize = 5242880; //5Megas
              //Test1: fichier correctement uploadé
              if (!isset($photo) OR $photo['error'] > 0)
              echo "l'envoi du fichier a échoué";
              //Test2: taille limite
              if ($photo['size'] > $maxsize)
              echo "La taille maximale est de 5 Mega";

              $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
              //1. strrchr renvoie l'extension avec le point (« . »).
              //2. substr(chaine,1) ignore le premier caractère de chaine.
              //3. strtolower met l'extension en minuscules.
              $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
              if (in_array($extension_upload, $extensions_valides))
              echo "Extension correcte";

              //Taille de l'image
              /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */


            /* $nomFichier = "C:/xampp/htdocs/Locagest/assets/user-image/{$idPersonne}.{$extension_upload}";
              $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nomFichier);
              if ($resultat)
              echo "Transfert réussi";

              $reqUpdateUser = $this->User->updateUser($idPersonne, $idPersonne . "." . $extension_upload); */

            if ($reqCreerPersonne and $resultPhys and $resultPersRole and $resultUpdateAgence) {
                //redirect('AccueilAdmin/GestLocataire');
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        }
    }

    public function modifierProprietaire($idProprietaire) {
        $this->check_session();
        if (isset($idProprietaire)) {
            $typePersonne = $this->input->post('typePersonne');
            $civilite = $this->input->post('sexe');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $dateNais = $this->input->post('dateNais');
            $lieuNais = $this->input->post('lieuNais');
            $denomination = $this->input->post('denomination');
            $numRc = $this->input->post('numRc');
            $formeJurid = $this->input->post('formeJurid');
            $contrib = $this->input->post('contrib');
            //$photo = $_FILES['photo'];
            $adresse1 = $this->input->post('adresse1');
            $ville = $this->input->post('ville');
            $pays = $this->input->post('pays');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $cel = $this->input->post('cel');

            //Update de la personne
            $reqUpdatePersonne = $this->Personne->updatePersonne($idProprietaire, $adresse1, $email, $tel, $cel, null, $ville, $pays);

            if ($typePersonne == 0) {
                $reqUpdatePhysique = $this->Physique->updatePhysique($idProprietaire, null, $nom, $prenom, $dateNais, $lieuNais, $civilite, null);
            } else {
                $reqUpdatePhysique = $this->Morale->modifierMoraleLocataire($idProprietaire, $denomination, $numRc, $formeJurid, $contrib);
            }

            //Upload du fichier image telechargé
            $maxsize = 5242880; //5Megas
            //Test1: fichier correctement uploadé
            /* if (!isset($photo) OR $photo['error'] > 0)
              echo "l'envoi du fichier a échoué";
              //Test2: taille limite
              if ($photo['size'] > $maxsize)
              echo "La taille maximale est de 5 Mega";

              $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
              //1. strrchr renvoie l'extension avec le point (« . »).
              //2. substr(chaine,1) ignore le premier caractère de chaine.
              //3. strtolower met l'extension en minuscules.
              $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
              if (in_array($extension_upload, $extensions_valides))
              echo "Extension correcte";

              //Taille de l'image
              /* $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
              if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande"; */

            /* $this->nomPrenom = $nom . $prenom;
              $this->userIcon = $nom_prenom . "." . $extension_upload; */
            /* $nom_prenom = $nom . $prenom;
              var_dump($extension_upload);

              $nomFichier = "C:/xampp/htdocs/Locagest/assets/user-image/{$nom_prenom}.{$extension_upload}";
              $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nomFichier);
              if ($resultat) {
              echo "Transfert réussi";
              $reqUpdateUser = $this->User->updateIcone($idPersonne, $nom_prenom . "." . $extension_upload);
              }

              $reqUpdateUser = $this->User->updateUser($idPersonne, $email); */


            if ($reqUpdatePersonne and $reqUpdatePhysique) {
                $this->setData();
                echo 'Success';
            } else {
                echo 'Erreur';
            }
        } else {
            echo 'Erreur';
        }
    }

    public function proprietaireInfo($idProprietaire) {
        $this->check_session();
        if (isset($idProprietaire)) {
            //Chargement des infos du proprietaire
            $infoPhysiq = array();
            $infoMor = array();
            //en tant que personne physique
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($idProprietaire);
            foreach ($resultPers->result() as $row) {
                $persPhys['nom'] = $row->Nom_PersPhys;
                $persPhys['prenom'] = $row->Prenom_PersPhys;
                $persPhys['dateNais'] = $row->DateNaiss_PersPhys;
                $persPhys['lieuNais'] = $row->LieuNaiss_PersPhys;
                $persPhys['sexe'] = $row->SexePersPhys;

                $infoPhysiq[] = $persPhys;
            }
            
            //en tant que personne morale
            $resultPers = $this->Morale->getMorale_ByIDPersonne($idProprietaire);
            foreach ($resultPers->result() as $row) {
                $persMor['denomination'] = $row->DenomPers_Morale;
                $persMor['numRC'] = $row->RCCM_Morale;
                $persMor['formJurid'] = $row->FomeJuridique_Morale;
                $persMor['compteContrib'] = $row->CompteContrib_Morale;

                $infoMor[] = $persMor;
            }

            //En tant que personne
            $resultPersonne = $this->Personne->getPersonne_ByID($idProprietaire);
            foreach ($resultPersonne->result() as $row) {
                $pers['situationGeo'] = $row->PersonneSituationGeo;
                $pers['tel'] = $row->PersonneTel;
                $pers['cel'] = $row->PersonneCel;
                $pers['email'] = $row->PersonneEmail;
                $pers['ville'] = $row->PersonneVille;
                $pers['pays'] = $row->PersonnePays;

                $infoPersonne[] = $pers;
            }

            for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                if (sizeof($infoPhysiq) > 0) {
                    $info['nom'] = $persPhys['nom'];
                    $info['prenom'] = $persPhys['prenom'];
                    $info['dateNais'] = $persPhys['dateNais'];
                    $info['lieuNais'] = $persPhys['lieuNais'];
                    $info['sexe'] = $persPhys['sexe'];
                    $info['typePersonne'] = '0';
                }
                if (sizeof($infoMor) > 0) {
                    $info['denomination'] = $persMor['denomination'];
                    $info['numRC'] = $persMor['numRC'];
                    $info['formJurid'] = $persMor['formJurid'];
                    $info['compteContrib'] = $persMor['compteContrib'];
                    $info['typePersonne'] = '1';
                }
                $info['situationGeo'] = $pers['situationGeo'];
                $info['tel'] = $pers['tel'];
                $info['cel'] = $pers['cel'];
                $info['email'] = $pers['email'];
                $info['ville'] = $pers['ville'];
                $info['pays'] = $pers['pays'];
            }
            //var_dump($info);
            //Chargement de la liste des piece

            $resultPiece = $this->Piece->getPieceLibelle();
            foreach ($resultPiece->result() as $row) {
                $pieceLibelle['libelle'] = $row->TypePieceLibelle;
                //echo var_dump($row->TypePieceLibelle);
            }

            //echo var_dump($pieceLibelle);
            //print_r($pieceLibelle);
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/proprietaireInfos', $info);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    public function proprietaireModif($idProprietaire) {
        $this->check_session();
        if (isset($idProprietaire)) {
            //Chargement des infos du proprietaire
            $infoPhysiq = array();
            $infoMor = array();
            //en tant que personne physique
            $resultPers = $this->Physique->getPhysique_ByIDPersonne($idProprietaire);
            foreach ($resultPers->result() as $row) {
                $persPhys['nom'] = $row->Nom_PersPhys;
                $persPhys['prenom'] = $row->Prenom_PersPhys;
                $persPhys['dateNais'] = $row->DateNaiss_PersPhys;
                $persPhys['lieuNais'] = $row->LieuNaiss_PersPhys;
                $persPhys['sexe'] = $row->SexePersPhys;

                $infoPhysiq[] = $persPhys;
            }
            
            //en tant que personne morale
            $resultPers = $this->Morale->getMorale_ByIDPersonne($idProprietaire);
            foreach ($resultPers->result() as $row) {
                $persMor['denomination'] = $row->DenomPers_Morale;
                $persMor['numRC'] = $row->RCCM_Morale;
                $persMor['formJurid'] = $row->FomeJuridique_Morale;
                $persMor['compteContrib'] = $row->CompteContrib_Morale;

                $infoMor[] = $persMor;
            }

            //En tant que personne
            $resultPersonne = $this->Personne->getPersonne_ByID($idProprietaire);
            foreach ($resultPersonne->result() as $row) {
                $pers['situationGeo'] = $row->PersonneSituationGeo;
                $pers['tel'] = $row->PersonneTel;
                $pers['cel'] = $row->PersonneCel;
                $pers['email'] = $row->PersonneEmail;
                $pers['ville'] = $row->PersonneVille;
                $pers['pays'] = $row->PersonnePays;

                $infoPersonne[] = $pers;
            }

            for ($i = 0; $i < sizeof($infoPersonne); $i++) {
                if (sizeof($infoPhysiq) > 0) {
                    $info['nom'] = $persPhys['nom'];
                    $info['prenom'] = $persPhys['prenom'];
                    $info['dateNais'] = $persPhys['dateNais'];
                    $info['lieuNais'] = $persPhys['lieuNais'];
                    $info['sexe'] = $persPhys['sexe'];
                    $info['typePersonne'] = '0';
                }
                if (sizeof($infoMor) > 0) {
                    $info['denomination'] = $persMor['denomination'];
                    $info['numRC'] = $persMor['numRC'];
                    $info['formJurid'] = $persMor['formJurid'];
                    $info['compteContrib'] = $persMor['compteContrib'];
                    $info['typePersonne'] = '1';
                }
                $info['situationGeo'] = $pers['situationGeo'];
                $info['tel'] = $pers['tel'];
                $info['cel'] = $pers['cel'];
                $info['email'] = $pers['email'];
                $info['ville'] = $pers['ville'];
                $info['pays'] = $pers['pays'];
            }
            //var_dump($info);
            //Chargement de la liste des piece

            $resultPiece = $this->Piece->getPieceLibelle();
            foreach ($resultPiece->result() as $row) {
                $pieceLibelle['libelle'] = $row->TypePieceLibelle;
                //echo var_dump($row->TypePieceLibelle);
            }

            //echo var_dump($pieceLibelle);
            //print_r($pieceLibelle);
        }

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/proprietaireModif', $info);
        $this->load->view('administration/menu_footer', $this->data);
        //$this->load->view('administration/footer/footerGeneral');
    }

    private function getProprietaire() {
        if (isset($_SESSION['idPersonne'])) {
            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            //INITIALISATION
            $infoLocataire = array();
            $infoPhysique = array();

            //Recuperation de la liste des locataires
            //Par le role
            $roleLocataire = $this->Personne_has_role->getPersonneHasRole_Propriettaire($idAgence);

            $listePersonne = array();

			$infoLocataire['locataire'] = $roleLocataire;

			return $infoLocataire;

        }
    }

    public function bilanBiens() {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            //INITIALISATION
            $bien = array();

            //Id du propriétaire
            //$idPersonne = $_SESSION['idPersonne'];
            //Liste des biens
            $listeBien = array();

            $reqListBien = $this->Locations->getAllLocation();

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'libelleBien' => $row->bienLibelle,
                    'idBien' => $row->idbien,
                    'idLocation'=>$row->idlocation
                );

                $bien[] = $listeBienUnique;
            }

            $reqCompteLoyer = $this->CompteLoyer->getAllCompteLoyer();
            $paiementFait = array();
            foreach ($reqCompteLoyer->result() as $row) {
                $loye['idLoyer'] = $row->idloyer;
                $loye['datePaiment'] = $row->Loyer_datePaiement;
                $loye['montant'] = $row->Loyer_MontantVerse;
                $loye['mois'] = $row->moisannee_idMois;
                $loye['idBien'] = $row->bien_idbien;

                $paiementFait[] = $loye;
            }

            $listeBien['bien'] = $bien;
            $listeBien['loyer'] = $paiementFait;
        }
        //var_dump($listeBien);

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/BilanBien', $listeBien);
        $this->load->view('administration/menu_footer', $this->data);
    }
    
    public function bilanBiensDetail($idlocation) {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            //INITIALISATION
            $bien = array();

            //Id du propriétaire
            //$idPersonne = $_SESSION['idPersonne'];
            //Liste des biens
            $listeBien = array();

            $reqListBien = $this->Locations->getAllLocationbyId($idlocation);

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'libelleBien' => $row->bienLibelle,
                    'idBien' => $row->idbien,
                    'idLocation'=>$row->idlocation
                );

                $bien[] = $listeBienUnique;
            }

            $reqCompteLoyer = $this->CompteLoyer->getAllCompteLoyer();
            $paiementFait = array();
            foreach ($reqCompteLoyer->result() as $row) {
                $loye['idLoyer'] = $row->idloyer;
                $loye['datePaiment'] = $row->Loyer_datePaiement;
                $loye['montant'] = $row->Loyer_MontantVerse;
                $loye['mois'] = $row->moisannee_idMois;
                $loye['idBien'] = $row->bien_idbien;

                $paiementFait[] = $loye;
            }

            $listeBien['bien'] = $bien;
            $listeBien['loyer'] = $paiementFait;
        }
        //var_dump($listeBien);

        $this->setData();

        $this->load->view('administration/header');
        $this->load->view('administration/BilanBienDetail', $listeBien);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function resultatBilan($annee, $idbien) {
        $this->check_session();
        if (isset($_SESSION['idPersonne'])) {
            //INITIALISATION
            $bien = array();

            //Id du propriétaire
            //$idPersonne = $_SESSION['idPersonne'];
            //Liste des biens
            $listeBien = array();

            $reqListBien = $this->Locations->getAllLocation();

            foreach ($reqListBien->result() as $row) {
                $listeBienUnique = array(
                    'libelleBien' => $row->bienLibelle,
                    'idBien' => $row->idbien
                );

                $bien[] = $listeBienUnique;
            }

            $dateDebut = $annee . "-01-01";
            $dateFin = $annee . "-12-31";

            if ($idbien == 0) {
                $reqCompteLoyerAnnee = $this->CompteLoyer->getAllCompteLoyerTrieAnnee($dateDebut, $dateFin);
                $paiementFait = array();
                foreach ($reqCompteLoyerAnnee->result() as $row) {
                    $loye['idLoyer'] = $row->idloyer;
                    $loye['montant'] = $row->Loyer_MontantVerse;
                    $loye['mois'] = $row->moisannee_idMois;
                    $loye['idBien'] = $row->bien_idbien;

                    $paiementFait[] = $loye;
                }
            } else {
                $reqCompteLoyerAnnee = $this->CompteLoyer->getAllCompteLoyerTrieAnneeIdBien($dateDebut, $dateFin, $idbien);
                $paiementFait = array();
                foreach ($reqCompteLoyerAnnee->result() as $row) {
                    $loye['idLoyer'] = $row->idloyer;
                    $loye['montant'] = $row->Loyer_MontantVerse;
                    $loye['mois'] = $row->moisannee_idMois;
                    $loye['idBien'] = $row->bien_idbien;

                    $paiementFait[] = $loye;
                }
            }

            $listeBien['bien'] = $bien;
            $listeBien['loyer'] = $paiementFait;
        }
        //var_dump($listeBien);
        echo json_encode($listeBien);
    }

    /*     * **************DJAMARA******************* */

    public function Gestlocations() {
        $this->check_session();
        //Recuperation de la liste des biens de l'agence
        if (isset($_SESSION['idPersonne'])) {

            $idAgence = 0;
            //Recuperation de l'id de l'agence
            if ($_SESSION['typeUser'] == 1) {
                $idAgence = $_SESSION['idPersonne'];
            } else {
                $idAgence = $_SESSION['idAgence'];
            }

            $reqLocation = $this->Locations->getAllLocation($idAgence);

            $Location = $reqLocation->result_array();
            //var_dump($Location);

            $location['locations'] = $Location;
        }

        $this->setData();
        $this->load->view('administration/header');
        $this->load->view('administration/listLocations', $location);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function AddLocation() {
        $this->check_session();
        $this->setData();

        $idPersonne = $_SESSION['idPersonne'];
        $reqListBien = $this->Bien->listerBienPasLoueJoinTypeBien();

        $Bien = $reqListBien->result_array();
        //var_dump($Bien);
        $bien['bien'] = $Bien;

        $this->load->view('administration/header');
        $this->load->view('administration/listBienLocation', $bien);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function setLocation($idbien, $role = 1) {
        $this->check_session();

        $this->setData();
        $idAgence = 0;
        //Recuperation de l'id de l'agence
        if ($_SESSION['typeUser'] == 1) {
            $idAgence = $_SESSION['idPersonne'];
        } else {
            $idAgence = $_SESSION['idAgence'];
        }


        $Bien = $this->Bien->getBien_ByID($idbien)->result_array();
        $locataire = $this->Personne->getPersonne_ByRole($role, $idAgence)->result_array();

        
        $Bien['locataire'] = $locataire;
        $Bien['bien'] = $Bien;

        $this->load->view('administration/header');
        $this->load->view('administration/setLocation', $Bien);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function ModifierLocation($idlocation) {
        $this->check_session();
        $this->setData();
        $idAgence = 0;
        //Recuperation de l'id de l'agence
        if ($_SESSION['typeUser'] == 1) {
            $idAgence = $_SESSION['idPersonne'];
        } else {
            $idAgence = $_SESSION['idAgence'];
        }

        $location = $this->Locations->getAllLocationbyId($idlocation)->result_array();
        $locataire = $this->Personne->getPersonne_ByRole(1, $idAgence)->result_array();


        $location['location'] = $location;
        $location['locataire'] = $locataire;

        $this->load->view('administration/header');
        $this->load->view('administration/ModifierLocation', $location);
        $this->load->view('administration/menu_footer', $this->data);
    }

    public function InsererLocation() {
        $this->check_session();

        $idLocataire = $_POST['idlocataire'];
        $idBien = $_POST['idbien'];
        $idProprioBien = $_POST['idProprioBien'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];
        $montantavance = str_replace(",", "", $_POST['montantavance']);
        $montantcaution = str_replace(",", "", $_POST['montantcaution']);
        $montantannexe = str_replace(",", "", $_POST['montantannexe']);
        $totalMontant = $montantavance + $montantcaution + $montantannexe;

        $requeteCreerLocation = $this->Locations->InsererLocation($idLocataire, $idBien, $datedebut, $datefin, $montantavance, $montantannexe, $montantcaution, $totalMontant);

        if ($requeteCreerLocation) {

            echo 'Success';
        } else {

            echo 'Erreur';
        }
    }

    public function updateLocation() {

        $this->check_session();

        $idLocataire = $_POST['idlocataire'];
        $idBien = $_POST['idbien'];
        $idProprioBien = $_POST['idProprioBien'];
        $datedebut = $_POST['datedebut'];
        $datefin = $_POST['datefin'];
        $montantavance = str_replace(",", "", $_POST['montantavance']);
        $montantcaution = str_replace(",", "", $_POST['montantcaution']);
        $montantannexe = str_replace(",", "", $_POST['montantannexe']);
        $totalMontant = $montantavance + $montantcaution + $montantannexe;

        $requeteCreerLocation = $this->Locations->UpdateLocation($idLocataire, $idBien, $datedebut, $datefin, $montantavance, $montantannexe, $montantcaution, $totalMontant);

        if ($requeteCreerLocation) {

            echo 'Success';
        } else {

            echo 'Erreur';
        }
    }

    public function supprimerLocation() {

        $this->check_session();

        $idLocation = $_POST['idlocation'];

        $requeteDelLocation = $this->Locations->supprimerLocationbyId($idLocation);

        if ($requeteDelLocation) {

            echo 'Success';
        } else {

            echo 'Erreur';
        }
    }

    public function PayerMensualite() {
        $this->check_session();

        $nombreEcheance = $_POST['Nbreecheance'];
        $idlocation = $_POST['idLocation'];
        $montant = str_replace(",", "", $_POST['montant']);
        $typePaiement = $_POST['typepaiement'];
        $numcheque = NULL;
        if (isset($_POST['numcheque'])) {
            $numcheque = $_POST['numcheque'];
        }
        $dateDebut = $_POST['dateDebut'];
        $dateFin = $_POST['dateFin'];

        $dateDans30Jours = new DateTime($dateDebut);

        $dateDans1Mois = new DateTime($dateDebut);


        //$dateDans30Jours = date_format($dateDans30Jours, 'Y-m-d');

        $sessionData = array(
            'montant' => $montant,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'datePaiement' => date('d/m/Y')
        );
        $this->session->set_userdata($sessionData);

        for ($i = 0; $i < $nombreEcheance; $i++) {

            //ajouter 30 jours sur la date de debut
            $interval = new DateInterval('P30D');
            $dateDans30Jours->add($interval);
            $dateDans30Jours = $dateDans30Jours->format('Y-m-d');
            $moisdateDebut = new DateTime($dateDebut);
            $moisdateDebut = $moisdateDebut->format('n');

            $dateDebut = new DateTime($dateDebut);
            $dateDebut = $dateDebut->format('Y-m-d');


            $this->CompteLoyer->ReglerLoyer($dateDebut, $dateDans30Jours, $montant / $nombreEcheance, $moisdateDebut, $numcheque, $idlocation, $typePaiement);
            //echo "La date aujourd'hui est:".$dateDebut."dans 30 jours sera :".$dateDans30Jours." et dans 1 mois sera :".$dateDans1Mois."\n";
            //ajouter 1 mois sur la date de debut
            $interval2 = new DateInterval('P1M');
            $dateDebut = new DateTime($dateDebut);
            $dateDebut->add($interval2);
            $dateDebut = $dateDebut->format('Y-m-d');

            $dateDans30Jours = new DateTime($dateDebut);
        }
        /* if (ReglerLoyer($dateDebut,$dateFin,$montant,$idMois,$numcheque,$idlocation)==true) {
          echo "success";
          }else{
          echo "erreur";
          } */

        //echo "Et le nombre de mois est :".$_POST['Nbreecheance'];
        //echo "Et le numero de la location est :".$_POST['idLocation'];
    }

    function addDepenses() {
        $this->check_session();
        $this->setData();
        $idAgence = 0;
        //Recuperation de l'id de l'agence
        if ($_SESSION['typeUser'] == 1) {
            $idAgence = $_SESSION['idPersonne'];
        } else {
            $idAgence = $_SESSION['idAgence'];
        }
        $reqListBien = $this->Bien->listerBien($idAgence);
        $listBien = $reqListBien->result_array();

        $reqListTravaux = $this->Depenses->listTravaux();
        $listTravaux = $reqListTravaux;


        $donnees = array("listeBiens" => $listBien, "travaux" => $listTravaux);

        $this->load->view('administration/header');
        $this->load->view('administration/addDepenses', $donnees);
        $this->load->view('administration/menu_footer', $this->data);
    }

    function getRecuPaiement() {
        $this->check_session();
        $this->setData();

        $this->load->view('administration/recu-paiement');
    }

    function modifierDepenses($idDepense) {
        $this->check_session();
        $this->setData();
        $idAgence = 0;
        //Recuperation de l'id de l'agence
        if ($_SESSION['typeUser'] == 1) {
            $idAgence = $_SESSION['idPersonne'];
        } else {
            $idAgence = $_SESSION['idAgence'];
        }
        $reqListBien = $this->Bien->listerBien($idAgence);
        $listBien = $reqListBien->result_array();

        $reqListTravaux = $this->Depenses->listTravaux();
        $depenses = $this->Depenses->getDepensesbyId($idDepense);

        $listTravaux = $reqListTravaux;


        $donnees = array("listeBiens" => $listBien, "travaux" => $listTravaux, "depense" => $depenses[0]);

        $this->load->view('administration/header');
        $this->load->view('administration/modifierDepenses', $donnees);
        $this->load->view('administration/menu_footer', $this->data);
    }

    function insertDepenses() {

        $idBien = $_POST['nombien'];
        $idTypeTravaux = $_POST['typereparation'];
        $Nom_Intervenant = $_POST['nomTechnicien'];
        $Contact_Intervenant = $_POST['contactTech'];
        $Adresse_Intervenant = $_POST['adresseTech'];
        $Date_Travaux = $_POST['dateRealisation'];
        $Montant_Travaux = str_replace(",", "", $_POST['montantrealisation']);

        $depense = $this->Depenses->insertDepenses($idBien, $idTypeTravaux, $Nom_Intervenant, $Contact_Intervenant, $Adresse_Intervenant, $Date_Travaux, $Montant_Travaux);

        $message = "";
        if ($depense == false) {
            $message = "Erreur";
        } else {
            $message = "success";
        }

        echo $message;
    }

    function listDepenses() {
        $this->check_session();
        $this->setData();
        $depenses = $this->Depenses->listerDepenses();

        $data = array("depenses" => $depenses);
        $this->load->view('administration/header');
        $this->load->view('administration/listDepenses', $data);
        $this->load->view('administration/menu_footer', $this->data);
    }

    function getBienByID() {

        $idBien = $_POST['idBien'];
        $reqGetBien = $this->Bien->getBien_ByID($idBien);
        $bien = $reqGetBien->result();

        $message = "nous sommes atteins";
        echo json_encode($bien[0]);
    }

}
