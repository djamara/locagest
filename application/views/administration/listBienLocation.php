
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
                        <h1 class="page-header text-overflow">Gestion des locations</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">Locations</a></li>
                        <li class="active">Liste des locations</li>
                        <li class="active">Ajouter des locations</li>
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
                            <h3 class="panel-title">Listes des bien disponible à louer</h3>
                        </div>

                        <!--<div id="demo-custom-toolbar2" class="table-toolbar-left">
                            <a id="" class="btn btn-primary" href="<?php //echo site_url() ?>/AccueilAdmin/addBiens"><i class="demo-pli-plus"></i>Ajouter biens</a>
                        </div> -->

                        <div class="panel-body">
                            <table id="table-liste-bien" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>LIBELLE</th>
                                        <th>LOCALISATION</th>
                                        <th class="min-tablet">TYPE DE BIEN</th>
                                        <th class="">ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($bien)){
                                        for ($i = 0; $i < sizeof($bien); $i++) {


                                            echo "<tr>";
                                            echo "<td>" . $bien[$i]['bienLibelle'] . "</td>";
                                            echo "<td>" . $bien[$i]['bienLocalisation'] . "</td>";
                                            echo "<td>" . $bien[$i]['TypeBienLibelle'] . "</td>";

                                            echo '<td>'
                                            . '<a href="' . site_url() . '/AccueilAdmin/setLocation/' . $bien[$i]['idbien'] . '" class="btn btn-success" title="Mettre ce bien en location"><span class="fa fa-cart-arrow-down"></span></a>'
                                            
                                            . '</td>';
                                            echo "</tr>";
                                        }
                                    
                                    }
                                    ?>
                                    

                                </tbody>
                            </table>
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


