
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
                        <h1 class="page-header text-overflow">Gestion des Locations</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">LOcations</a></li>
                        <li class="active">Liste des locations</li>
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
                            <h3 class="panel-title">Listes des locations éffectives</h3>
                        </div>

                        <div id="demo-custom-toolbar2" class="table-toolbar-left">
                            <a id="" class="btn btn-primary" href="<?php echo site_url() ?>/AccueilAdmin/AddLocation"><i class="demo-pli-plus"></i>Ajouter locations</a>
                        </div>

                        <div class="panel-body">
                            <div class="col-sm-12">
                                <table id="table-liste-bien" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nom Locataire</th>
                                            <th >Bien loué</th>
                                            <th class="min-tablet">Date location</th>
                                            <th class="min-desktop">Numéro mobile</th>
                                            <th class="min-desktop">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($locations as $key): ?>
                                            <tr>
                                                <td><?php echo $key['nom'] ?></td>
                                                <td><?php echo $key['bienLibelle'].' siuté à '.$key['bienLocalisation'] ?></td>
                                                <td><?php echo $key['dateDebutlocation'] ?></td>
                                                <td><?php echo $key['PersonneCel'] . ' / ' . $key['PersonneTel'] ?></td>
                                                <td>
                                                    <!--<a href="<?php //echo site_url().'/AccueilAdmin/ModifierLocation/'.$key['idlocation']   ?>" class= " btn btn-success btn-warning add-tooltip" data-original-title="Voir les détails de la location" data-toggle="tooltip"><span class="fa fa-eye"></span></a> -->
                                                    <a href='<?php echo site_url() . "/AccueilAdmin/ModifierLocation/" . $key['idlocation'] ?>' class= " btn btn-success add-tooltip " data-original-title="Modifier la location" data-toggle="tooltip"><span class="fa fa-edit"></span></a>
                                                    <a href="#" class="btn btn-info add-tooltip" name="<?php echo $key['idlocation'] ?>" onclick="SupprimerLocation($(this).attr('name'))" data-original-title="Supprimer la location" data-toggle="tooltip" ><span class="fa fa-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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
    <script>
        var url_delete = "<?php echo site_url(); ?>/AccueilAdmin/supprimerLocation";
    </script>
    <script src='<?php echo base_url() ?>assets/script.js'></script>


