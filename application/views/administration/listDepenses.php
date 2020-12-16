
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
                        <li><a href="#">Biens</a></li>
                        <li class="active">Liste des biens</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                    <!-- Add Row -->
                    <!--===================================================-->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Listes des biens</h3>
                        </div>
                        <?php //var_dump($depenses) ?>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                        <a class="btn btn-primary" href="<?php echo site_url() ?>/AccueilAdmin/addDepenses"><i class="demo-pli-plus"></i>Ajouter depenses</a>
                                        <!--<button id="btn-choix-proprietaire" class="btn btn-primary"><i class="demo-pli-plus"></i>Ajouter biens</button>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-liste-bien" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>DATE DES TRAVAUX</th>
                                                <th class="min-tablet">LIBELLE DU BIEN</th>
                                                <th>TYPE DE TRAVAUX</th>
                                                <th>LOCATAIRE</th>
                                                <th>MONTANT TRAVAUX</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($depenses as $key): ?>

                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $key->dateTrav ?></td>
                                                    <td><?php echo $key->bienLibelle ?></td>
                                                    <td><?php echo $key->LibelleTravaux ?></td>
                                                    <td></td>
                                                    <td><?php echo $key->Montant_Travaux ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url()?>/AccueilAdmin/modifierDepenses/<?php echo $key->idDepenses ?>" class="btn btn-warning add-tooltip" data-original-title="Modifier la depenses" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                                                        <a href="#" class="btn btn-danger add-tooltip" data-original-title="Supprimer la depense" data-toggle="tooltip" ><span class="fa fa-trash"></span></a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Add Row -->



                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->


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


