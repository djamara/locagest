<!--CONTENT CONTAINER-->
<!--===================================================-->
<body>
    <div id="content-container">
        <div id="page-head">

            <!--Page Title-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div id="page-title">
                <h1 class="page-header text-overflow">Accueil</h1>
            </div>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End page title-->


            <!--Breadcrumb-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <ol class="breadcrumb">
                <li><a href="#"><i class="demo-pli-home"></i></a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Bien</a></li>
                <li class="active">Ajout d'images</li>
            </ol>
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <!--End breadcrumb-->

        </div>


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>IMAGES POUR LE BIEN [ <?php echo $libelleBien ?> ]</strong></h3>
                </div>
                <div class="panel-body">
                    

                    <hr>

                    <!--Dropzonejs-->
                    <!--===================================================-->
                    <form id="my-dropzone" action="#" class="dropzone">
                        <div class="dz-default dz-message">
                            <div class="dz-icon">
                                <i class="demo-pli-upload-to-cloud icon-5x"></i>
                            </div>
                            <div>
                                <span class="dz-text">Faites un glisser-déposer des fichiers à impoter</span>
                                <p class="text-sm text-muted">ou cliquez pour sélectionner manuellement les fichier</p>
                            </div>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple>
                        </div>
                    </form>
                    <!--===================================================-->
                    <!-- End Dropzonejs -->

                </div>
                <div class="panel-footer">
                    <a class="btn btn-mint" href="<?php echo site_url("AccueilAdmin/modifierBiens/").$idBien; ?>"><span class="fa fa-backward"> Retour vers le bien</span></a>
                    <a class="btn btn-mint" href="<?php echo site_url("AccueilAdmin/GestBiens/"); ?>"><span class="fa fa-list"> Liste des biens</span></a>
                </div>
            </div>
        </div>
        <!--===================================================-->
        <!--End page content-->

    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->



