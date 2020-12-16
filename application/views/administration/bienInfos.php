
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
                        <li class="active">Infos du bien</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                                                    <h3 class="panel-title text-main text-bold">PROPRIÉTAIRE</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">
       
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">NOM ET¨PRÉNOMS <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['proprietaire'] ?>" name="localisationBien" required>
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
                                                                //var_dump($bien['init']);

                                                                for ($i = 0; $i < sizeof($bien['init'][0]['typeBien']); $i++) {
                                                                    echo '<option value="' . $bien['init'][0]['typeBien'][$i] . '"' . ($bien['typeBien'] == $bien['init'][0]['typeBien'][$i] ? 'Selected' : '') . '>' . $bien['init'][0]['typeBien'][$i] . '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LIBELLE <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="libelleBien" class="form-control" value="<?php echo $bien['libelleBien'] ?>" name="libelleBien" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LOCALISATION <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['localisationBien'] ?>" name="localisationBien" required>
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
                                                            <input type="text" placeholder="Superficie en mètre carré" id="superficieBien" class="form-control" name="superficieBien" value="<?php echo $bien['superficiePiece'] ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">NOMBRE DE PIECE<span class="text-danger">*</span> </label></label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="nbPieceBien">
                                                                
                                                                <?php
                                                                for ($i = 0; $i < sizeof($bien['init'][1]['pieceBien']); $i++) {
                                                                    echo '<option value="' . $bien['init'][1]['pieceBien'][$i] . '" ' . (($bien['NombrePiece'] == $bien['init'][1]['pieceBien'][$i]) ? ('Selected') : ('')) . '>' . $bien['init'][1]['pieceBien'][$i] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE CONSTRUCTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dateCreationBien" value="<?php echo $bien['dateCreationBien'] ?>">
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

                                                <!-- Checkboxes -->
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" name="carac1" value="Accès Internet"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Accès Internet")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox">Accès internet</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox" name="carac2" value="Garage"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Garage")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-2">Garage</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox" name="carac3" value="Piscine"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Piscine")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-3">Piscine</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox4" class="magic-checkbox" type="checkbox" name="carac4" value="Espace vert"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Espace vert")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox4">espace vert</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-5" class="magic-checkbox" type="checkbox" name="carac5" value="Club de sport"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Club de sport")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-5">club de sport</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-6" class="magic-checkbox" type="checkbox" name="carac6" value="Cave"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Cave")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-6">Cave</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox7" class="magic-checkbox" type="checkbox" name="carac7" value="Terrasse"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Terrasse")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox7">Terrasse</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-8" class="magic-checkbox" type="checkbox" name="carac8" value="Gardien"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Gardien")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-8">Gardien</label>
                                                    </div>

                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-9" class="magic-checkbox" type="checkbox" name="carac9" value="Jardin"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Jardin")
                                                                echo 'checked';
                                                        }
                                                        ?>>
                                                        <label for="demo-form-checkbox-9">Jardin</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="checkbox col-md-3">
                                                        <input id="demo-form-checkbox-10" class="magic-checkbox" type="checkbox" name="carac10" value="Aire de jeux"
                                                        <?php
                                                        for ($i = 0; $i < sizeof($bien['caracteristques']); $i++) {
                                                            if ($bien['caracteristques'][$i] == "Aire de jeux")
                                                                echo 'checked';
                                                        }
                                                        ?>>
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
                                                            <input type="text" placeholder="" name="feuilleCadastrale" id="libelleBien" class="form-control" value="<?php echo $bien['feuilleCadastrale'] ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PARCELLE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="parcelleCadastrale"  id="localisationBien" class="form-control" value="<?php echo $bien['parcelleCadastrale'] ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CATÉGORIE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="categorieCadastrale" id="localisationBien" class="form-control" value="<?php echo $bien['categorieCadastrale'] ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">VALEUR LOCATIVE CADASTRALE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="valeurLocaCadastrale" id="localisationBien" class="form-control" value="<?php echo $bien['valeurLocataiveCadastrale'] ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LOT </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" name="lot" id="localisationBien" class="form-control" value="<?php echo $bien['lot'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">MILLIEME </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['millieme'] ?>" name="millieme">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PARKING </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['parking'] ?>" name="parking" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">AUTRES DEPENDANCES </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['autresDependance'] ?>" name="autreDependance">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CAVE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['cave'] ?>" name="cave">
                                                        </div>
                                                    </div>



                                                    <!--<div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Lieu de naissance </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" placeholder="" name="lieuNais" value="<?php //echo $lieuNais                                   ?>">
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
                                                                <option value="Meublée" <?php if($bien['typeLocation']=="Meublée") echo 'selected="true"'; ?>>Meublée</option>
                                                                <option value="Vide" <?php if($bien['typeLocation']=="Vide") echo 'selected="true"'; ?>>Vide</option>
                                                                <option value="Saisonnière" <?php if($bien['typeLocation']=="Saisonnière") echo 'selected="true"'; ?>>Saisonnière</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">LOYER HC</label>
                                                        <div class="col-sm-4">

                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['loyerHC'] ?>" name="loyerHC">

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CHARGES </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['charges'] ?>" name="charge">
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
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['taxeHabitation'] ?>" name="taxeHabitation">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">TAXE FONCIERE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['taxeFonciere'] ?>"  name="taxeFonciere">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="dd/mm/yyyy" id="localisationBien" class="form-control" value="<?php echo $bien['dateAcquisition'] ?>" name="dateAcquisition">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">PRIX D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['prixAcquisition'] ?>" name="prixAcquisition">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">FRAIS D'ACQUISITION </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['fraisAcquisition'] ?>" name="fraisAcquisition">
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
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['nomCentreiImpot'] ?>" name="nomCentre">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">ADRESSE 1 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['adresse1CentreImpot'] ?>" name="adresse1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">ADRESSE 2 </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="adresse" id="localisationBien" class="form-control" value="<?php echo $bien['adresse2CentreImpot'] ?>" name="adresse2">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">CODE POSTAL </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['codePostale'] ?>" name="codePostal" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">VILLE </label>
                                                        <div class="col-sm-4">
                                                            <input type="text" placeholder="" id="localisationBien" class="form-control" value="<?php echo $bien['ville'] ?>" name="ville">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DESCRIPTION </label>
                                                        <div class="col-sm-9">

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Ex: Studio meublé tout confort" name="descriptionBien"><?php echo $bien['description'] ?></textarea>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">NOTES </label>
                                                        <div class="col-sm-9">

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Autres informations." name="notes" ><?php echo $bien['notes'] ?></textarea>

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

                                                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Your content here.." name="assurance" ><?php echo $bien['libAssurance'] ?></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE SOUSCRIPTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="jj/mm/aaaa" id="libelleBien" class="form-control" value="<?php echo $bien['dateSouscriptionAssurance'] ?>" name="dateSouscripAssurance">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE D'ECHEANCE  </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" placeholder="jj/mm/aaaa" id="localisationBien" class="form-control" value="<?php echo $bien['dateEcheanceAssurance'] ?>" name="dateEcheanceAssurance">
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
                                                            <input type="text" placeholder="" class="form-control" value="<?php echo $bien['groupement'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabPhoto" class="tab-pane fade">
                                    <h3>Importez les photos pour ce bien</h3>
                                    <hr>


                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">

                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">

                                                    <!--Dropzonejs using Bootstrap theme-->
                                                    <!--===================================================-->
                                                    <p>Taille maximale d'importation: 50Méga.</p>

                                                    <div class="bord-top pad-ver dropzone">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn btn-success fileinput-button dz-clickable">
                                                            <i class="fa fa-plus"></i>
                                                            <span>Ajouter fichiers...</span>
                                                        </span>

                                                        <div class="btn-group pull-right">
                                                            <button id="dz-upload-btn" class="btn btn-primary" type="submit" disabled>
                                                                <i class="fa fa-upload-cloud"></i> Télécharger
                                                            </button>
                                                            <button id="dz-remove-btn" class="btn btn-danger cancel" type="reset" disabled>
                                                                <i class="demo-psi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <div id="dz-previews">
                                                        <div id="dz-template" class="pad-top bord-top">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <!--This is used as the file preview template-->
                                                                    <div class="media-block">
                                                                        <div class="media-left">
                                                                            <img class="dz-img" data-dz-thumbnail>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <p class="text-main text-bold mar-no text-overflow" data-dz-name></p>
                                                                            <span class="dz-error text-danger text-sm" data-dz-errormessage></span>
                                                                            <p class="text-sm" data-dz-size></p>
                                                                            <div id="dz-total-progress" style="opacity:0">
                                                                                <div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="media-right">
                                                                    <button data-dz-remove class="btn btn-xs btn-danger dz-cancel"><i class="demo-psi-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!--End Dropzonejs using Bootstrap theme-->

                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--===================================================-->
                        <!--End Default Tabs (Left Aligned)-->

                        <!--<div class="row">
                            <div class="text-center">
                                <button class="btn btn-default">Annuler</button>
                                <button class="btn btn-success" type="submit" name="enregistrerBien">Enregistrer les modification</button>
                            </div>
                        </div>-->
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


