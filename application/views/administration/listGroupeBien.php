
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
                        <li><a href="#">Groupement de bien</a></li>
                        <li class="active">Liste des groupements de bien</li>
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


                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                        <a class="btn btn-primary" href="<?php echo site_url() ?>/AccueilAdmin/AddGroupeBiens"><i class="demo-pli-plus"></i>Ajouter un groupement de bien</a>
                                        <!--<button id="btn-choix-proprietaire" class="btn btn-primary"><i class="demo-pli-plus"></i>Ajouter biens</button>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table-liste-groupe-bien" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>LIBELLE</th>
                                                <th>LOCALISATION</th>

                                                <th>PROPRIÉTAIRE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($immeuble) && isset($proprietaire)) {
                                                for ($i = 0; $i < sizeof($immeuble); $i++) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $immeuble[$i]['nom'] ?></td>
                                                        <td><?php echo $immeuble[$i]['localisation'] ?></td>
                                                        <td><?php echo $proprietaire[$i] ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url() . "/AccueilAdmin/groupeBienInfo/" . $immeuble[$i]['idImmeuble']; ?>" class="btn btn-success add-tooltip" data-original-title="Voir les détails du groupement" data-toggle="tooltip"><span class="fa fa-eye"></span></a>
                                                            <a href="<?php echo site_url() . "/AccueilAdmin/modifierGroupeBiens/" . $immeuble[$i]['idImmeuble']; ?>" class="btn btn-warning add-tooltip" data-original-title="Modifier le groupement" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                                                           
                                                            <a href="#" class="btn btn-danger add-tooltip" data-original-title="Supprimer le groupementt" data-toggle="tooltip"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
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
    <script src="<?php echo base_url(); ?>/assets/Admin/js/jquery.min.js"></script>
    <script type="text/javascript">
        var redirect = "<?php echo site_url() . '/AccueilAdmin/GestGroupeBiens'; ?>";
        var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

        console.log("Redirection "+redirect);
    </script>


