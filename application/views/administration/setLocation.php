/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
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
                    <li><a href="<?php echo site_url() . '/AccueilAdmin/Gestlocations/' ?>">Location</a></li>
                    <li class="active">Creation d'une location</li>
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

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">Informations générales sur la location</a>
                                </li>
                                <!-- <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                                     </li>
                                -->
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>

                                    <form class="form-horizontal" id="form-location" action="" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">INFORMATIONS SUR LE BIEN</h3>
                                                    </div>
                                                    <hr>
                                                    <!--Horizontal Form-->
                                                    <!--===================================================-->

                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Bien <span class="text-danger">*</span> </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="Nom de bien" id="nombien" class="form-control" disabled="" value="<?php echo $bien[0]['bienLibelle'] ?>" name="nom" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Type de bien <span class="text-danger">*</span> </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" placeholder="Nom de typebien" id="nomtypebien" class="form-control" disabled="" 
                                                                       value="<?php echo $bien[0]['TypeBienLibelle'] ?>" name="nom" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Localisation du bien <span class="text-danger">*</span> </label>
                                                            <div class="col-sm-4">
                                                                <input type="text" placeholder="Localisation du bien" id="localisationbien" class="form-control" disabled="" value="<?php echo $bien[0]['bienLocalisation'] ?>" name="nom" required>
                                                            </div>
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Montant du bien <span class="text-danger">*</span> </label>
                                                            <div class="col-sm-2">
                                                                <input type="text" placeholder="montant de bien" id="montantbien" class="form-control money" disabled="" value="<?php echo $bien[0]['loyerHC'] ?>" name="nom" required>
                                                            </div>
                                                        </div>
                                                        <?php //var_dump($locataire); ?>

                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">INFORMATIONS SUR LA LOCATION</h3>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Nom et Prenom du locataire <span class="text-danger">*</span> </label>
                                                            <div class="col-sm-9">
                                                                <select class="form-control selectpicker" data-live-search="true" onchange="searchInfoLocataire()" id="locataireNom" required="">
                                                                    
                                                                    <option value="0"> </option>
                                                                    <?php foreach ($locataire as $key): ?>
                                                                        <option value="<?php echo $key['idPersonne'] ?>">
                                                                            <?php echo $key['Nom_PersPhys'] . ' ' . $key['Prenom_PersPhys'].' '.$key['DenomPers_Morale'] ?>
                                                                        </option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Date de naissance </label>
                                                            <div class="col-sm-9">
                                                                <input type="date" class="form-control" placeholder="jj/mm/aaaa" name="dateNais" id="dateNaiss" readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Lieu de naissance </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" placeholder="lieu de naissance" name="lieuNais" id="LieuNaiss" readonly="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Date de debut location<span class="text-danger">*</span></label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" required="" name="datedebut" id="datedebut">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Date de fin location<span class="text-danger">*</span></label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" required="" name="datefin" id="datefin">
                                                            </div>
                                                        </div>
                                                         <hr>
                                                         <div class="form-group">
                                                            <!--<label class="col-sm-2 control-label">Nombre de mois<span class="text-danger">*</span></label>
                                                            <div class="col-sm-1">
                                                                <input type="text" class="form-control" required="" value="0" name="nbremois" id="nbremois">
                                                            </div> -->
                                                            <label class="col-sm-2 control-label">Montant Avance<span class="text-danger">*</span></label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control money" required="" value="" name="montantavance" id="montantavance" onkeyup="setMontantTotal()">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Montant Caution<span class="text-danger">*</span></label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control money" required="" value="" name="montantcaution" id="montantcaution" onkeyup="setMontantTotal()">
                                                            </div>
                                                            <label class="col-sm-2 control-label">Montant Annexe<span class="text-danger"></span></label>
                                                            <div class="col-sm-2">
                                                                <input type="text" class="form-control money" value="0" name="montantannexe" id="montantannexe" onkeyup="setMontantTotal()">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="col-sm-8 control-label">Total à payer<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control money" value="" name="totalMontant" id="totalMontant" readonly="">
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group">
                                                            <label class="col-sm-3 control-label" for="demo-hor-inputpass">Photo </label>
                                                            <div class="col-sm-9">
                                                                <input type="file" class="form-control btn btn-default" name="photo">
                                                                <span class="text-semibold">Formats acceptés: GIF, JPG, PNG. Taille maximale: 15 Mo</span>
                                                            </div>
                                                        </div>-->

                                                    </div>

                                                    <!--===================================================-->
                                                    <!--End Horizontal Form-->

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <div class="panel">
                                                    <!--                                                        <div class="panel-heading">
                                                                                                                <h3 class="panel-title">INFORMATIONS DE CONTACT</h3>
                                                                                                            </div>
                                                                                                            <hr>-->


                                                    <!--       
                                                                                                            </div>-->
                                                    <div class="panel-footer text-right">
                                                        <button class="btn btn-default" type="reset">Annuler</button>
                                                        <button class="btn btn-success" type="submit" name="enregistrer" id="enregistrer" onclick="/*updateLocation()*/">Sauvegarder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </form>

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

         var url_Ajax = "<?php echo site_url(); ?>/AccueilAdmin/InsererLocation";

         var idBien = <?php echo $bien[0]['idbien'] ?>;
         var idProprioBien = <?php echo $bien[0]['Personne_idPersonne'] ?>;

         var Tableaulocataire = <?php echo json_encode($locataire) ?>;
         console.log('Le tableau est :' + Tableaulocataire);

</script>

<script type="text/javascript">
    var redirect = "<?php echo site_url() . '/AccueilAdmin/Gestlocations'; ?>";
    var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";

    //console.log("Redirection "+redirect);
</script>

<script src='<?php echo base_url() ?>assets/script.js'></script>

