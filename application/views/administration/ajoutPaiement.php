
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
                        <h1 class="page-header text-overflow">Enregistrer un paiement</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="<?php echo site_url(); ?>/AccueilAdmin/listeLocation">Finances</a></li>
                        <li class="active">Enregistrer un paiement</li>
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

                                        <form class="form-horizontal" action="<?php echo base_url() ?>index.php/AccueilAdmin/PayerMensualite"  id="form-paiement" method="post">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title text-main text-bold">RAPPEL SUR LE BIEN</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">
                                                            <div class="form-group">

                                                                <div class="col-md-9"><input hidden="" value="<?php echo $locationInfo[0]['idlocation'] ?>" name="idLocation"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">BIEN</label>
                                                                <div class="col-md-9"><p class="form-control-static text-main text-main"><?php echo $locationInfo[0]['bienLibelle'] ?></p></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">LOCATAIRE</label>
                                                                <div class="col-md-9"><p class="form-control-static text-main text-main">
                                                                        <?php echo $locationInfo[0]['Nom_PersPhys'] . ' ' . $locationInfo[0]['Prenom_PersPhys'] ?>
                                                                    </p></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">MONTANT MENSUEL DU TERME</label>
                                                                <div class="col-md-9">
                                                                    <p class="form-control-static text-main text-main">
                                                                        <span class="money" id="montantLoyer"><?php echo $locationInfo[0]['loyerHC'] ?></span>
                                                                    </p>
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
                                                            <h3 class="panel-title text-main text-bold">PAIEMENT</h3>
                                                        </div>
                                                        <hr>
                                                        <!--Horizontal Form-->
                                                        <!--===================================================-->

                                                        <div class="panel-body">

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="demo-hor-inputpass">PAIEMENT EFFECTUÉ <span class="text-danger"></span> </label>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 form-vertical">


                                                                            <div class="form-group col-md-2">
                                                                                <input type="text" class="form-control" placeholder="mois" value="" name="Nbreecheance" id="nbreMois" onblur="calculMontant()" required>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <input type="text" class="form-control money" placeholder="montant à payer" name="montant" id="montant">
                                                                            </div>
                                                                            <div class="form-group col-md-4">

                                                                                <select class="form-control" name="typepaiement" id="typepaiement" onchange="typePaiement()" >

                                                                                    <?php foreach ($TypePaiement as $key): ?>
                                                                                        <option value="<?php echo $key['idTypePaiement'] ?>">
                                                                                            <?php echo $key['LibelleTypePaiement'] ?>
                                                                                        </option>
                                                                                    <?php endforeach ?>
                                                                                </select>

                                                                            </div>

                                                                            <div class="form-group col-md-4">
                                                                                <input type="text" class="form-control" name="numcheque" placeholder="N° chèque" id="NumCheque">
                                                                            </div>
                                                                            <div class="form-group col-md-4">
                                                                                <label>Debut periode</label>
                                                                                <input type="date" class="form-control" placeholder="Date" name="dateDebut" id="datePaiement" required>
                                                                            </div>

                                                                            <div class="form-group col-md-4">
                                                                                <label>Fin periode</label>
                                                                                <input type="date" class="form-control" placeholder="Date" name="dateFin" id="datePaiement" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p>Veuillez saisir le montant du règlement,
                                                                            le moyen de paiement (chèque, virement, CB...) et la date du paiement.</p>                                                               
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="panel-footer text-right">
                                                            <button class="btn btn-default">Annuler</button>
                                                            <button class="btn btn-success" type="submit" >Sauvegarder</button>
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

    <script>
        var nbreMois = <?php echo $locationInfo[0]['idlocation'] ?>;
        var montantduTerme = <?php echo $locationInfo[0]['loyerHC'] ?>;
    </script>

    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/DetailLocation'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";
        var urlQuittance = "<?php echo base_url() . 'quittanceLoyer'; ?>";

        //var urlQuittance = "<?php //echo site_url() . '/AccueilAdmin/getRecuPaiement';  ?>"

        //console.log("Redirection "+redirect);
    </script>
    <!--<script src='<?php //echo base_url()  ?>assets/paiement.js'></script> -->
