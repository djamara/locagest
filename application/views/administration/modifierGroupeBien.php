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
                        <li><a href="<?php echo site_url() . "/AccueilAdmin/GestGroupeBiens"; ?>">Groupement</a></li>
                        <li class="active">Modification d'un groupement de bien</li>
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
                    <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/modificationGroupeBien" id="form-modif-groupe-bien" method="post" enctype="multipart/form-data">
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
                                                //var_dump($nom);
                                                ?>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="groupePropriettaireNomModif">NOM ET PRÉNOMS <span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control selectpicker" data-live-search="true" data-width="100%" id="groupePropriettaireNomModif" name="groupePropriettaireNomModif" required>
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
                                                            <input type="text" placeholder="jj/mm/aaaa" id="groupeDateNaisProprioModif" class="form-control" name="groupeDateNaisProprioModif" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">LIEU DE NAISSANCE</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="groupeLieuNaisProprioModif" class="form-control" name="groupeLieuNaisProprioModif" disabled>
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
                                                            <input type="text" placeholder="" id="libelle" class="form-control" value="<?php echo $groupeBien['nom'] ?>" name="libelle" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="localisation">LOCALISATION <span class="text-danger">*</span> </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="" id="localisation" class="form-control" value="<?php echo $groupeBien['adresse'] ?>" name="localisation" required>
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
                                                            <input type="text" placeholder="Superficie en mètre carré" id="superficie" class="form-control" name="superficie" value="<?php echo $groupeBien['superficie'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DATE DE CONSTRUCTION </label>
                                                        <div class="col-sm-4">
                                                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dateCreation" value="<?php echo $groupeBien['dateCreation']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">DESCRIPTION </label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" name="description" rows="10" cols="10"><?php echo $groupeBien['description']; ?></textarea>
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
                                                                <option <?php echo ($row['Immeubles_idImmeubles'] == $groupeBien['id'] ? 'selected' : '') ?> value="<?php echo $row['idbien'] ?>"><?php echo $row['bienLibelle'] ?></option>
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
        var groupeTableauProprietaireModif = <?php echo json_encode($proprietaire) ?>;
        console.log('Le tableau est :' + groupeTableauProprietaireModif);

        for (var i = 0; i < groupeTableauProprietaireModif.length; i++) {

            //console.log(JSON.stringify(tableauProprietaire[i]));

            idProprietaireGroupeModif = $('#groupePropriettaireNomModif option:selected').val();
            console.log(idProprietaireGroupeModif);
            if (idProprietaireGroupeModif == groupeTableauProprietaireModif[i]['idPersonne'] && idProprietaireGroupeModif != 0) {

                var dateNaiss = groupeTableauProprietaireModif[i]['dateNaiss'];
                var LieuNaiss = groupeTableauProprietaireModif[i]['LieuNaiss_PersPhys'];

                //alert('le date de naissance est :'+dateNaiss);


                /*$('#LieuNaiss').prop('disabled',true);
                 $('#dateNaiss').prop('disabled',true);*/

                $('#groupeLieuNaisProprioModif').val(LieuNaiss);
                $('#groupeDateNaisProprioModif').val(dateNaiss);

            }
        }
    </script>
    
    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/GestGroupeBiens'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

        console.log("Redirection "+redirect);
    </script>
