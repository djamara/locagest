<!--CONTENT CONTAINER-->
<!--===================================================-->
<body id="accueiPage">
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div class="pad-all text-center">
                    <h3>ACCUEIL</h3>
                    <p>Un système de gestion intuitif qui vous permettra d'assurer la gestion de vos immbiliers en toutes simplicités</p>
                </div>
            </div>


            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <div class="row">
                    <div class="eq-height">
                        <div class="col-sm-3 eq-box-sm">
                            <div class="panel">
                                
                                <div class="panel-body demo-nifty-btn">

                                    <!--Block Level buttons-->
                                    <!--===================================================-->
                                    <a class="btn btn-block btn-dark btn-labeled btn-rounded btn-lg" href="<?php echo site_url() ?>/AccueilAdmin/addBiens"><span class="btn-label fa fa-plus"></span>Nouveau bien</a>
                                    <!--===================================================-->

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 eq-box-sm">
                            <div class="panel">
                                
                                <div class="panel-body demo-nifty-btn">

                                    <!--Block Level buttons-->
                                    <!--===================================================-->
                                    <a class="btn btn-block btn-dark btn-labeled btn-rounded btn-lg" href="<?php echo site_url() ?>/AccueilAdmin/AddProprietaire"><span class="btn-label fa fa-plus"></span>Nouveau propriétaire</a>
                                    <!--===================================================-->

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 eq-box-sm">
                            <div class="panel">
                                
                                <div class="panel-body demo-nifty-btn">

                                    <!--Block Level buttons-->
                                    <!--===================================================-->
                                    <a class="btn btn-block btn-dark btn-labeled btn-rounded btn-lg " href="<?php echo site_url() ?>/AccueilAdmin/AddLocataire"><span class="btn-label fa fa-plus"></span>Nouveau locataire</a>
                                    <!--===================================================-->

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 eq-box-sm">
                            <div class="panel">
                                
                                <div class="panel-body demo-nifty-btn">

                                    <!--Block Level buttons-->
                                    <!--===================================================-->
                                    <a class="btn btn-block btn-dark btn-labeled btn-rounded btn-lg" href="<?php echo site_url() ?>/AccueilAdmin/AddLocation"><span class="btn-label fa fa-plus"></span>Nouvelle location</a>
                                    <!--===================================================-->

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-warning panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="demo-pli-home icon-3x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $nbBien; ?></p>
                                        <p class="mar-no">BIENS</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-info panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="demo-pli-add-user icon-3x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $nbProprietaire; ?></p>
                                        <p class="mar-no">PROPRIETAIRES</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-mint panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="demo-pli-photos icon-3x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $nbLocataire; ?></p>
                                        <p class="mar-no">LOCATAIRES</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-danger panel-colorful media middle pad-all">
                                    <div class="media-left">
                                        <div class="pad-hor">
                                            <i class="demo-pli-video icon-3x"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $nbLocation; ?></p>
                                        <p class="mar-no">LOCATIONS</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===================================================-->
        <!--End page content-->
    </div>


