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
                        <h1 class="page-header text-overflow">Gestion des groupements de bien</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="<?php echo site_url() . "/AccueilAdmin/GestBiens"; ?>">Biens</a></li>
                        <li class="active">Création d'un groupement de bien</li>
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
                    <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/creerGroupeBien" id="form-groupe-bien" method="post" enctype="multipart/form-data">
                        <!--Default Tabs (Left Aligned)-->
                        <!--===================================================-->
                        <div class="tab-base">

                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#tabInfoGene">INFORMATIONS GENERALES </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tabBienAssocie">BIENS ASSOCIÉS </a>
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
                                                <?php
                                                //var_dump($bien[2]);
                                                //$proprietaire = $bien[2]['proprietaire'];
                                                //echo json_encode($proprietaire)
                                                ?>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="groupePropriettaireNom">NOM ET PRÉNOMS <span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" id="groupePropriettaireNom" name="groupePropriettaireNom" required>
                                                                <option value="0">Sélectionner le propriétaire</option>
                                                                <?php
                                                                //var_dump($bien);
                                                                for ($i = 0; $i < sizeof($proprietaire); $i++) {
                                                                    echo '<option value="' . $proprietaire[$i]['idPersonne'] . '"' . ($groupeBien['idPersonne'] == $proprietaire[$i]['idPersonne'] ? 'selected' : '') . '>' . $proprietaire[$i]['Nom_PersPhys'] . " " . $proprietaire[$i]['Prenom_PersPhys'] ." ".$proprietaire[$i]["DenomPers_Morale"]. '</option>';
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE NAISSANCE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="jj/mm/aaaa" id="groupeDateNaissProprio" class="form-control" name="groupeDateNaissProprio" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LIEU DE NAISSANCE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="groupeLieuNaisProprio" class="form-control" name="groupeLieuNaisProprio" disabled>
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
                                                    <h3 class="panel-title text-main text-bold">INFORMATIONS GÉNÉRALES</h3>
                                                </div>
                                                <hr>
                                                <!--Horizontal Form-->
                                                <!--===================================================-->

                                                <div class="panel-body">

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="libelle">LIBELLE <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="libelle" class="form-control" value="<?php //echo $nom                                           ?>" name="libelle" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="localisation">LOCALISATION <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisation" class="form-control" value="<?php //echo $nom                                           ?>" name="localisation" required>
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
                                                            <input type="text" placeholder="Superficie en mètre carré" id="superficie" class="form-control" name="superficie" value="<?php //echo $situationGeo                                           ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE CONSTRUCTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dateCreation">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DESCRIPTION </label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="description" rows="10" cols="10"></textarea>
                                                        </div>
                                                    </div>



                                                </div>

                                                <!--===================================================-->
                                                <!--End Horizontal Form-->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="tabBienAssocie" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title text-main text-bold">BIENS ASSOCIÉS</h3>
                                                    
                                                </div>
                                                <hr>

                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        
                                                        <select class="form-control dual_select" name="biensAssocie[]" multiple>
                                                            <?php
                                                            foreach ($biens as $row) {
                                                                ?>
                                                                <option value="<?php echo $row['idbien'] ?>"><?php echo $row['bienLibelle'] ?></option>
                                                                <?php
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
                        <!--===================================================-->
                        <!--End Default Tabs (Left Aligned)-->
                        <div class="row">
                            <div class="text-center">
                                <button class="btn btn-default">Annuler</button>
                                <button class="btn btn-success" type="submit" name="enregistrerGroupeBien">Enregistrer les modification</button>

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
        var groupeTableauProprietaire = <?php echo json_encode($proprietaire) ?>;
        console.log('Le tableau est :' + groupeTableauProprietaire);
    </script>
    
    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/GestGroupeBiens'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

        console.log("Redirection "+redirect);
    </script>
