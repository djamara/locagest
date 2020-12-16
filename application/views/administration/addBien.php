<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Gestion des biens</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="<?php echo site_url() . "/AccueilAdmin/GestBiens"; ?>">Biens</a></li>
                        <li class="active">Création d'un bien</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">

                                <div class="panel-body">

                                    <!-- Alert layout example -->
                                    <div class="alert alert-warning">
                                        <strong>INFORMATIONS: </strong> Le bouton de validation est unique pour tous les onglets.
                                        <br>Merci de valider après avoir rempli au minimum les champs obligatoires
                                    </div>
                                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/creerBien" id="form-bien" method="post" enctype="multipart/form-data">
                        <!--Default Tabs (Left Aligned)-->
                        <!--===================================================-->
                        <div class="tab-base">

                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#tabInfoGene">INFORMATIONS GENERALES </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tabInfoComp">INFORMATIONS COMPLEMENTAIRE</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tabAssurance">ASSURANCE</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tabGroupement">GROUPEMENT ASSOCIÉ</a>
                                </li>

                            </ul>

                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="tabInfoGene" class="tab-pane fade active in">

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">INFORMATIONS CONCERNANT LE PROPRIÉTAIRE</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->
                                                <?php
                                                //var_dump($bien[2]);
                                                //$proprietaire = $bien[2]['proprietaire'];
                                                //echo json_encode($proprietaire)
                                                ?>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">NOM ET PRÉNOMS</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" id="propriettaireNom" name="propriettaireNom" required>
                                                                <option value="0">Sélectionner le propriétaire</option>
                                                                <?php
                                                                //var_dump($bien);
                                                                $proprietaire = $bien[2]['proprietaire'];
                                                                for ($i = 0; $i < sizeof($proprietaire); $i++) {
                                                                    echo '<option value="' . $proprietaire[$i]['idPersonne'] . '">' . $proprietaire[$i]['Nom_PersPhys'] . " " . $proprietaire[$i]['Prenom_PersPhys'] ."".$proprietaire[$i]["DenomPers_Morale"]. '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE NAISSANCE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="jj/mm/aaaa" id="dateNaissProprio" class="form-control" name="dateNaissProprio" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LIEU DE NAISSANCE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="lieuNaisProprio" class="form-control" name="lieuNaisProprio" disabled>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">INFORMATIONS GENERALES CONCERNANT LE BIEN</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">TYPE DE BIEN</label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="typeBien">
                                                                <?php
                                                                //var_dump($bien);
                                                                $typeBien = $bien[0]['typeBien'];
                                                                for ($i = 0; $i < sizeof($typeBien); $i++) {
                                                                    echo '<option value="' . $typeBien[$i] . '">' . $typeBien[$i] . '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LIBELLE <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="libelleBien" class="form-control" value="<?php //echo $nom                                         ?>" name="libelleBien" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LOCALISATION <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                         ?>" name="localisationBien" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">CARACTERISTIQUES</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">SUPERFICIE (m<sup>2</sup>) <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="Superficie en mètre carré" id="superficieBien" class="form-control" name="superficieBien" value="<?php //echo $situationGeo                                         ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">NOMBRE DE PIECE<span class="text-danger">*</span> </label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="nbPieceBien">

                                                                <?php
                                                                //var_dump($bien);
                                                                $pieceBien = $bien[1]['pieceBien'];
                                                                for ($i = 0; $i < sizeof($pieceBien); $i++) {
                                                                    echo '<option value="' . $pieceBien[$i] . '">' . $pieceBien[$i] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE CONSTRUCTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dateCreationBien">
                                                        </div>
                                                    </div>



                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabInfoComp" class="tab-pane fade">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-main text-bold">INFORMATIONS COMPLEMENTAIRES CONCERNANT LE BIEN</h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group pad-ver">
                                            <label class="col-md-3 control-label">TYPE D'HABITAT</label>
                                            <div class="col-md-9">

                                                <!--Disabled Radio Buttons -->
                                                <div class="row">
                                                    <div class="radio col-md-3">
                                                        <input id="demo-disabled-form-radio" class="magic-radio" type="radio" name="typeHabitat" checked>
                                                        <label for="demo-disabled-form-radio">Immeuble collectif</label>
                                                    </div>
                                                    <div class="radio col-md-3">
                                                        <input id="demo-disabled-form-radio-2" class="magic-radio" type="radio" name="typeHabitat">
                                                        <label for="demo-disabled-form-radio-2">Immeuble individuel</label>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group pad-ver">
                                            <label class="col-md-3 control-label">RÉGIME JURIDIQUE DE L’IMMEUBLE</label>
                                            <div class="col-md-9">

                                                <!--Disabled Radio Buttons -->
                                                <div class="row">
                                                    <div class="radio col-md-3">
                                                        <input id="demo-disabled-form-radio-3" class="magic-radio" type="radio" name="regimeImmeuble" checked>
                                                        <label for="demo-disabled-form-radio-3">Copropriété</label>
                                                    </div>
                                                    <div class="radio col-md-3">
                                                        <input id="demo-disabled-form-radio-4" class="magic-radio" type="radio" name="regimeImmeuble">
                                                        <label for="demo-disabled-form-radio-4">Mono propriété</label>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">AUTRES CARACTERISTIQUES</label>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="carac1" value="Accès Internet">
                                                        <label for="demo-form-checkbox">Accès internet</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox" name="carac2" value="Garage">
                                                        <label for="demo-form-checkbox-2">Garage</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox" name="carac3" value="Piscine">
                                                        <label for="demo-form-checkbox-3">Piscine</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox4" class="magic-checkbox" type="checkbox" name="carac4" value="Espace vert">
                                                        <label for="demo-form-checkbox4">espace vert</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-5" class="magic-checkbox" type="checkbox" name="carac5" value="Club de sport">
                                                        <label for="demo-form-checkbox-5">club de sport</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-6" class="magic-checkbox" type="checkbox" name="carac6" value="Cave">
                                                        <label for="demo-form-checkbox-6">Cave</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox7" class="magic-checkbox" type="checkbox" name="carac7" value="Terrasse">
                                                        <label for="demo-form-checkbox7">Terrasse</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-8" class="magic-checkbox" type="checkbox" name="carac8" value="Gardien">
                                                        <label for="demo-form-checkbox-8">Gardien</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-9" class="magic-checkbox" type="checkbox" name="carac9" value="Jardin">
                                                        <label for="demo-form-checkbox-9">Jardin</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-10" class="magic-checkbox" type="checkbox" name="carac10" value="Aire de jeux">
                                                        <label for="demo-form-checkbox-10">Aire de jeux</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">

                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">FEUILLE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="feuilleCadastrale" id="libelleBien" class="form-control" value="<?php //echo $nom                                        ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PARCELLE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="parcelleCadastrale"  id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CATÉGORIE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="categorieCadastrale" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">VALEUR LOCATIVE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="valeurLocaCadastrale" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LOT </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="lot" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">MILLIEME </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" name="millieme">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PARKING </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" name="parking">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">AUTRES DEPENDANCES </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" name="autreDependance">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CAVE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                        ?>" name="cave">
                                                        </div>
                                                    </div>



                                                    <!--<div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Lieu de naissance </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="" name="lieuNais" value="<?php //echo $lieuNais                                        ?>">
                                                        </div>
                                                    </div>

                                                    <!--<div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Photo </label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control btn btn-default" name="photo">
                                                            <span class="text-semibold">Formats acceptés: GIF, JPG, PNG. Taille maximale: 15 Mo</span>
                                                        </div>
                                                    </div>-->

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">INFORMATIONS LOCATIVES</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">TYPE DE LOCATION PROPOSES </label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="typeLocationBien">
                                                                <option value="">--</option>
                                                                <option value="Meublée">Meublée</option>
                                                                <option value="Vide">Vide</option>
                                                                <option value="Saisonnière">Saisonnière</option>
                                                                <?php
                                                                //var_dump($bien);
                                                                /* $pieceBien = $bien[1]['pieceBien'];
                                                                  for ($i = 0; $i < sizeof($pieceBien); $i++) {
                                                                  echo '<option value="' . $pieceBien[$i] . '">' . $pieceBien[$i] . '</option>';
                                                                  } */
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">LOYER HC</label>
                                                        <div class="col-sm-4">

                                                            <input type="text" placeholder="" id="loyerHC" class="form-control money" value="<?php //echo $nom                                        ?>" name="loyerHC" required>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CHARGES </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control money" value="<?php //echo $nom                                       ?>" name="charge">
                                                        </div>
                                                    </div>



                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">INFORMATIONS FINANCIERES</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">TAXE D'HABITATION </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="taxeHabitation">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">TAXE FONCIERE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>"  name="taxeFonciere">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="dd/mm/yyyy" id="localisationBien" class="form-control" name="dateAcquisition">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PRIX D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="prixAcquisition">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">FRAIS D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="fraisAcquisition">
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">CENTRE D'IMPOTS</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">NOM DU CENTRE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="nomCentre">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">ADRESSE 1 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="adresse1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">ADRESSE 2 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="adresse" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="adresse2">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CODE POSTAL </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="codePostal">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">VILLE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php //echo $nom                                       ?>" name="ville">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DESCRIPTION </label>
                                                        <div class="col-sm-9">

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Ex: Studio meublé tout confort" name="descriptionBien"></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">NOTES </label>
                                                        <div class="col-sm-9">

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Autres informations." name="notes"></textarea>

                                                        </div>
                                                    </div>

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabAssurance" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">ASSURANCE PROPRIETAIRE</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">ASSURANCE </label>
                                                        <div class="col-sm-9">

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Décrivez le type d'assurance en quelques mots" name="assurance"></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE SOUSCRIPTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="jj/mm/aaaa" id="libelleBien" class="form-control"  name="dateSouscripAssurance">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE D'ECHEANCE  </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="dd/mm/yyyy" id="localisationBien" class="form-control" name="dateEcheanceAssurance">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tabGroupement" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">GROUPEMENT ASSOCIÉ</h3>

                                                </div>
                                                <hr>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">NOM DU GROUPEMENT</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" id="idImmeuble" name="idImmeuble">
                                                                <option value="0">Sélectionner le groupement</option>
                                                                <?php
                                                                //var_dump($bien);
                                                                $immeuble = $bien[3]['groupement'];
                                                                for ($i = 0; $i < sizeof($immeuble); $i++) {
                                                                    echo '<option value="' . $immeuble[$i]['idImmeuble'] . '">' . $immeuble[$i]['nomImmeuble'] . '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--===================================================-->
                        <!--End Default Tabs (Left Aligned)-->
                        <div class="row">
                            <div class="text-center">
                                <button class="btn btn-default">Annuler</button>
                                <button class="btn btn-success" type="submit" name="enregistrerBien">Enregistrer les modification</button>

                            </div>
                        </div>
                    </form>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2017 Your Company</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

    <script src="<?php echo base_url(); ?>/assets/Admin/js/jquery.min.js"></script>
    <script>
        var tableauProprietaire = <?php echo json_encode($proprietaire) ?>;
        console.log('Le tableau est :' + tableauProprietaire);
    </script>
    
    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/GestBiens'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

        console.log("Redirection "+redirect);
    </script>
