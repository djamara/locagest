
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
                        <h1 class="page-header text-overflow">Gestion des Propriétaires</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="<?php echo site_url(); ?>/AccueilAdmin/GestProprietaire">Dépenses</a></li>
                        <li class="active">Ecriture d'une dépense</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                    <div class="row">

                        <?php //var_dump($depense) ?>
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

                                        <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/insertDepenses" id="form-depense" method="post" enctype="multipart/form-data">

                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="panel" id="panel-form">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title text-main text-bold">INFORMATIONS SUR LE BIEN</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <!--
                                                            PERSONNE PHYSIQUE
                                                        -->
                                                        <div class="panel-body" id="form-physique">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Libellé du bien</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control selectpicker" data-width="100%" name="nombien" id="idbien" onchange="setAdresse($('#idbien option:selected').attr('id'))" >
                                                                        <?php foreach ($listeBiens as $key): ?>
                                                                            <option value="<?php echo $key['idbien'] ?>" id="<?php echo $key['idbien'] ?>" <?php if($key['idbien']== $depense->idBien) echo "selected=''"?>>
                                                                                <?php echo $key['bienLibelle'] ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Adresse géographique <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Nom de famille" readonly="" id="adressebien" class="form-control" value="Abidjan cote d'ivoire" name="adressebien" required>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <!--
                                                            PERSONNE MORALE
                                                        -->


                                                        <!--===================================================-->
                                                        <!--End Horizontal Form-->

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title text-main text-bold">INFORMATIONS SUR LA DEPENSE</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">

                                                            <?php //var_dump($travaux)?>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Type de réparation <span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="typereparation">
                                                                        <?php foreach ($travaux as $key): ?>
                                                                            <option value="<?php echo $key['idTypeTravaux'] ?>" <?php if($key['idTypeTravaux']== $depense->idTypeTravaux) echo "selected=''"?> >
                                                                                <?php echo $key['LibelleTravaux'] ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Noms de l'intervenant<span class="text-danger">*</span> </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="Nom de l'intervenant" id="adresse1" class="form-control" name="nomTechnicien" value="<?php echo $depense->Nom_Intervenant?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Contact<span class="text-danger">*</span> </label>
                                                                <div class="col-sm-3">
                                                                    <input type="text" placeholder="telephone" id="adresse1" class="form-control" name="contactTech" value="<?php echo $depense->Contact_Intervenant?>" required>
                                                                </div>
                                                                <label class="col-sm-1 control-label" for="demo-hor-inputpass">Adresse<span class="text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" placeholder="ville, commune, quartier, rue" id="adresse1" class="form-control" name="adresseTech" value="<?php echo $depense->Adresse_Intervenant?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Date de réalisation<span class="text-danger">*</span> </label>
                                                                <div class="col-sm-3">
                                                                    <input type="date" class="form-control" name="dateRealisation" value="<?php echo $depense->Date_Travaux ?>">
                                                                </div>
                                                                <label class="col-sm-1 control-label" for="demo-hor-inputemail">Montant<span class="text-danger">*</span> </label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control money" placeholder="montant" name="montantrealisation" value="<?php echo $depense->Montant_Travaux ?>">
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

                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->


                                                        <div class="panel-footer text-right">
                                                            <button class="btn btn-default" type="reset">Annuler</button>
                                                            <button class="btn btn-success" type="submit">Modifier</button>
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
                                                                        var redirect = "<?php echo site_url() . '/AccueilAdmin/listDepenses'; ?>";
                                                                        var urlAdresse = "<?php echo site_url() . '/AccueilAdmin/getBienByID'; ?>";
                                                                        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

                                                                        //console.log("Redirection "+redirect);
    </script>