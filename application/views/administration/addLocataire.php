
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
                        <h1 class="page-header text-overflow">Gestion des locataires</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">Locataires</a></li>
                        <li class="active">Création d'un locataire</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                    <div class="row">


                        <div class="col col-center col-sm-12">


                            <div class="panel">

                                <!--<ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home">Informations générales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                                    </li>
                                </ul>-->
                                <div class="tab-content">
                                    <div id="home" class="container tab-pane active"><br>

                                        <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/creerLocataire" id="form-locataire" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title text-main text-bold">TYPE</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Type de locataire</label>
                                                                <div class="col-sm-3">
                                                                    <select class="form-control selectpicker" data-width="100%" name="type-personne" id="type-personne">
                                                                        <option value="0">Particulier</option>
                                                                        <option value="1">Société/Entreprise</option>
                                                                    </select>
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
                                                    <div class="panel" id="panel-form">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title text-main text-bold">INFORMATIONS PERSONNELLES</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <!--
                                                            PERSONNE PHYSIQUE
                                                        -->
                                                        <div class="panel-body" id="form-physique">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Civilité</label>
                                                                <div class="col-sm-3">
                                                                    <select class="form-control selectpicker" data-width="100%" name="sexe">
                                                                        <option value="Hommme" <?php //if($sexe=="Hommme") echo 'selected="true"'       ?>>M.</option>
                                                                        <option value="Femme" <?php //if($sexe=="Femme") echo 'selected="true"'      ?>>Mme</option>
                                                                        <option value="Femme" <?php //if($sexe=="Femme") echo 'selected="true"'      ?>>Mlle</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Nom <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Nom de famille" id="nom" class="form-control" value="<?php //echo $nom      ?>" name="nom" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Prénoms <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Prénoms" id="prenom" class="form-control" value="<?php //echo $prenom      ?>" name="prenom" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Date de naissance </label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="dateNais">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Lieu de naissance </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" placeholder="" name="lieuNais" value="<?php //echo $lieuNais      ?>">
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!--
                                                            PERSONNE MORALE
                                                        -->
                                                        <div class="panel-body" id="form-morale">

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Dénomination <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Dénomination de l'entreprise" id="denomination" class="form-control" value="<?php //echo $nom      ?>" name="denomination" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Numéro RCCM <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" id="numRc" class="form-control" value="<?php //echo $prenom      ?>" name="numRc" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Forme juridique </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="ex: Société anonyme, SARL, SCS..." id="formeJurid" class="form-control" value="<?php //echo $prenom      ?>" name="formeJurid">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Compte contribuable </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" id="contrib" class="form-control" value="<?php //echo $prenom      ?>" name="contrib">
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
                                                            <h3 class="panel-title text-main text-bold">ADRESSES</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Situation géographique <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="ville, commune, quartier, rue" id="adresse1" class="form-control" name="adresse1" value="<?php //echo $situationGeo      ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Ville <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="ville">
                                                                        <option value="Abidjan">Abidjan</option>
                                                                        <option value="Bassam">Bassam</option>
                                                                        <option value="Bouaké">Bouaké</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Pays <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="pays">
                                                                        <option value="Côte d'ivoire">Côte d'ivoire</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Mali">Mali</option>
                                                                    </select>
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
                                                            <h3 class="panel-title text-main text-bold">INFORMATIONS DE CONTACT</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Email <span class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" placeholder="" id="email" class="form-control" name="email" value="<?php //echo $tel      ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Téléphone</label>
                                                                <div class="col-sm-9">
                                                                    <input type="tel" placeholder="Ex: 00225 08 52 41 52" id="nom" class="form-control" name="tel" value="<?php //echo $tel      ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Mobile <span class="text-danger">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="tel" placeholder="Ex: 00225 08 52 41 52" id="cel" class="form-control" name="cel" value="<?php //echo $cel      ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="panel-footer text-right">
                                                            <button class="btn btn-default">Annuler</button>
                                                            <button class="btn btn-success" type="submit" name="enregistrer">Sauvegarder</button>
                                                        </div>

                                                        <!--===================================================-->
                                                        <!--End Horizontal Form-->

                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div id="menu1" class="container tab-pane fade"><br>
                                        <h3>Menu 1</h3>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div id="menu2" class="container tab-pane fade"><br>
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

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
    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/GestLocataire'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

        console.log("Redirection "+redirect);
    </script>


