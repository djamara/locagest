<!--CONTENT CONTAINER-->
<!--===================================================-->
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
                        <h1 class="page-header text-overflow">BILAN SUR LES BIENS</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li class="active"><a href="#">Bilan</a></li>

                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/resultatBilan" id="form-bilan" method="post">

                        <div class="row">
                            <div class="eq-height">
                                <div class="col-sm-4 eq-box-sm">
                                    <!--Panel with Header-->
                                    <!--===================================================-->
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">BILAN</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-sm-3">
                                                <select class="form-control selectpicker col-sm-6" data-live-search="true" data-width="100%" id="anneeTrie" name="anneeTrie" required>

                                                    <?php
                                                    $annee = date('Y'); //Date actuelle
                                                    $mois = date('n'); //Mois sans les zéros initiaux
                                                    echo '<option value="' . $annee . '">Année ' . $annee . '</option>';
                                                    for ($i = 1; $i < 5; $i++) {
                                                        echo '<option value="' . ($annee - $i) . '">Année ' . ($annee - $i) . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="form-control selectpicker col-sm-6" data-live-search="true" data-width="100%" id="bienTrie" name="bienTrie" required>
                                                    <option value="0">Tous les biens</option>
                                                    <?php
                                                    for ($i = 0; $i < sizeof($bien); $i++) {
                                                        echo '<option value="' . $bien[$i]['idBien'] . '">' . $bien[$i]['libelleBien'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">  
                                                <button id="btnTrieBien" type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Trier</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--===================================================-->
                                    <!--End Panel with Header-->

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="eq-height">
                                <div class="col-sm-4 eq-box-sm">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="panel-group accordion" id="accordion">
                                                        <!--Default Accordion-->
                                                        <!--===================================================-->
                                                        <?php
                                                        //var_dump($bien);
                                                        if (isset($bien)) {
                                                            for ($i = 0; $i < sizeof($bien); $i++) {
                                                                ?>


                                                                <div class="panel panel-bordered panel-info">

                                                                    <!--Accordion title-->
<!--                                                                    <div class="panel-heading">
                                                                        <h4 class="panel-title">
                                                                            <a data-parent="#accordion" data-toggle="collapse" href="<?php echo "#collapse" . $i ?>"><?php echo $bien[$i]['libelleBien']; ?></a>
                                                                        </h4>
                                                                    </div>-->

                                                                    <!--Accordion content-->
                                                                    
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Janvier</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 1) {
                                                                                                                echo $loyer[$j]['montant'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 1) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 1) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Février</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 2) {
                                                                                                                echo $loyer[$j]['montant'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 2) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 2) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Mars</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 3) {
                                                                                                                echo $loyer[$j]['montant'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 3) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 3) {
                    echo $loyer[$j]['datePaiment'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Avril</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 4) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 4) {
                    echo '<span class="badge badge-success">Soldé</span></td>';
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 4) {
                    echo $loyer[$j]['datePaiment'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top: 30px"></div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Mai</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 5) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 5) {
                    echo '<span class="badge badge-success">Soldé</span></td>';
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 5) {
                    echo $loyer[$j]['datePaiment'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Juin</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 6) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 6) {
                    echo '<span class="badge badge-success">Soldé</span></td>';
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 6) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Juillet</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold"><?php
                                                                                            for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                    if ($loyer[$j]['mois'] == 7) {
                                                                                                        echo $loyer[$j]['montant'];
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                                    ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 7) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 7) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Août</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 8) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 8) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 8) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="margin-top: 30px"></div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Septembre</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 9) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 9) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 9) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Octobre</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 10) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 10) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 10) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Novembre</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold">
        <?php
        for ($j = 0; $j < sizeof($loyer); $j++) {
            if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                if ($loyer[$j]['mois'] == 11) {
                    echo $loyer[$j]['montant'];
                }
            }
        }
        ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 11) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 11) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-sm-12 col-md-3 text-xs-center">
                                                                                    <table>
                                                                                        <thead>
                                                                                        <h2 class="label label-purple">Décembre</h2>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Montant</td>
                                                                                                <td class="text-right text-info text-bold"><?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 12) {
                                                                                                                echo $loyer[$j]['montant'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Statut</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 12) {
                                                                                                                echo '<span class="badge badge-success">Soldé</span></td>';
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="text-main text-bold">Date</td>
                                                                                                <td class="text-right">
                                                                                                    <?php
                                                                                                    for ($j = 0; $j < sizeof($loyer); $j++) {
                                                                                                        if ($loyer[$j]['idBien'] == $bien[$i]['idBien']) {
                                                                                                            if ($loyer[$j]['mois'] == 12) {
                                                                                                                echo $loyer[$j]['datePaiment'];
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <?php //var_dump($bien[$i]["idBien"])?>
                                                                            <br>
                                                                            <div> <a class="btn btn-success" href="<?php echo base_url()."index.php/AccueilAdmin/ajouterPaiement/".intval($bien[$i]["idLocation"])?>">Ajouter un paiement</a> </div>
                                                                        </div>
                                                                        
                                                                    
                                                                </div>
                                                        
                                                        

                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                        
                                                        <!--===================================================-->
                                                        <!--End Default Accordion-->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                    </form>
                    
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

