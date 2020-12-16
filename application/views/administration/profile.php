<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Gérer votre profile</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="<?php echo site_url() ?>/AccueilAdmin/accueil">Accueil</a></li>
            <li class="active">Profile</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="fixed-fluid">
                    <div class="fixed-md-200 pull-sm-left fixed-right-border">

                        <!-- Simple profile -->
                        <div class="text-center">
                            <div class="pad-ver">
                                <?php
                                $lienIcone = base_url() . "/assets/Admin/img/profile-photos/1.png";

                                if (!empty($iconeuser)) {
                                    $lienIcone = base_url() . "/assets/user-image/" . $iconeuser;
                                }
                                ?>
                                <img src="<?php echo $lienIcone ?>" class="img-lg img-circle" alt="Profile Picture">
                            </div>
                            <h4 class="text-lg text-overflow mar-no">
                                <?php
                                echo $nomuser;
                                ?>
                            </h4>
                            <p class="text-sm text-muted">Agent immobilier</p>

                            <!--<div class="pad-ver btn-groups">
                                <a href="#" class="btn btn-icon demo-pli-facebook icon-lg add-tooltip" data-original-title="Facebook" data-container="body"></a>
                                <a href="#" class="btn btn-icon demo-pli-twitter icon-lg add-tooltip" data-original-title="Twitter" data-container="body"></a>
                                <a href="#" class="btn btn-icon demo-pli-google-plus icon-lg add-tooltip" data-original-title="Google+" data-container="body"></a>
                                <a href="#" class="btn btn-icon demo-pli-instagram icon-lg add-tooltip" data-original-title="Instagram" data-container="body"></a>
                            </div>-->
                            <!--<button class="btn btn-block btn-success btn-lg">Follow</button>-->
                        </div>
                        <hr>

                        <!-- Profile Details -->
                        <p class="pad-ver text-main text-sm text-uppercase text-bold">A propos de moi</p>
                        <p><i class="demo-pli-map-marker-2 icon-lg icon-fw"></i> 
                            <?php
                            if (!empty($situationGeo) && !empty($ville)) {
                                echo $situationGeo . ' (' . $ville . ')';
                            } else {
                                echo 'Non défini';
                            }
                            ?>
                        </p>
                        <p><a href="#" class="btn-link"><i class="demo-pli-internet icon-lg icon-fw"></i> 
                                <?php
                                if (!empty($pays)) {
                                    echo $pays;
                                } else {
                                    echo 'Non défini';
                                }
                                ?>
                            </a>
                        </p>
                        <p><i class="demo-pli-old-telephone icon-lg icon-fw"></i>
                            <?php
                            if (!empty($cel)) {
                                echo $cel;
                            } else {
                                echo 'Non défini';
                            }
                            ?>
                        </p>
                        <!--<p class="text-sm text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>-->


                        <hr>
                        <!--<p class="pad-ver text-main text-sm text-uppercase text-bold">Skills</p>
                        <ul class="list-inline">
                            <li class="tag tag-sm">PHP Programming</li>
                            <li class="tag tag-sm">Marketing</li>
                            <li class="tag tag-sm">Graphic Design</li>
                            <li class="tag tag-sm">Sketch</li>
                            <li class="tag tag-sm">Photography</li>
                        </ul>

                        <hr>
                        <p class="pad-ver text-main text-sm text-uppercase text-bold">Gallery</p>
                        <div class="row img-gallery">
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-3.jpg" alt="thumbs">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-6.jpg" alt="thumbs">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-4.jpg" alt="thumbs">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-2.jpg" alt="thumbs">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-5.jpg" alt="thumbs">
                            </div>
                            <div class="col-xs-6">
                                <img class="img-responsive" src="img/thumbs/img-1.jpg" alt="thumbs">
                            </div>
                        </div>-->
                    </div>
                    <div class="fluid">
                        <form class="form-horizontal" action="<?php echo site_url() ?>/AccueilAdmin/modifierProfile" id="form-agent" method="post" enctype="multipart/form-data">
                            <!--<div class="row">
                                <div class="col-sm-10">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">INFOS DE CONNEXION</h3>
                                        </div>
                                        <hr>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->

                                        <!--<div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Nom d'utilisateur <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Nom d'utilisateur" id="username" class="form-control" value="<?php echo $nom ?>" name="nom" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Mot de passe <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Mot de passe" id="password" class="form-control" value="<?php echo $prenom ?>" name="prenom" required>
                                                </div>
                                            </div>

                                        </div>

                                        <!--===================================================-->
                                        <!--End Horizontal Form-->

                                    <!--</div>
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">INFORMATIONS PERSONNELLES</h3>
                                        </div>
                                        <hr>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->

                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Civilité</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control selectpicker" data-width="100%" name="sexe">
                                                        <option value="Hommme" <?php if ($sexe == "Hommme") echo 'selected="true"' ?>>M.</option>
                                                        <option value="Femme" <?php if ($sexe == "Femme") echo 'selected="true"' ?>>Mme</option>
                                                        <option value="Femme" <?php if ($sexe == "Femme") echo 'selected="true"' ?>>Mlle</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Nom <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Nom de famille" id="nom" class="form-control" value="<?php echo $nom ?>" name="nom" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Prénoms <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Prénoms" id="prenom" class="form-control" value="<?php echo $prenom ?>" name="prenom" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Pièce <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <select class="form-control selectpicker" data-width="100%" name="type_piece" required>

                                                                <option value="1" <?php
                                                                if ($idtypePiece == 1) {
                                                                    echo 'selected="true"';
                                                                }
                                                                ?>>CNI</option>
                                                                <option value="2" <?php
                                                                if ($idtypePiece == 2) {
                                                                    echo 'selected="true"';
                                                                }
                                                                ?>>ATTESTATION D'IDENTITE</option>
                                                                <option value="3" <?php
                                                                        if ($idtypePiece == 3) {
                                                                            echo 'selected="true"';
                                                                        }
                                                                ?>>PASSEPORT</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="numpiece" placeholder="Numéro de la pièce" value="<?php echo $numpiece; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Date de naissance </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" placeholder="jj/mm/aaaa" name="dateNais" value="<?php echo $dateNais ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Lieu de naissance </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="" name="lieuNais" value="<?php echo $lieuNais ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Photo </label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control btn btn-default" name="photo" id="photoUser">
                                                    <span class="text-semibold">Formats acceptés: GIF, JPG, PNG. Taille maximale: 15 Mo</span>
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
                                            <h3 class="panel-title">ADRESSES</h3>
                                        </div>
                                        <hr>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->

                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Adresse <span class="text-danger">*</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="Commune, quartier, rue" id="nom" class="form-control" name="adresse1" value="<?php echo $situationGeo ?>" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Ville <span class="text-danger">*</span> </label></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="ville">
                                                        <option value="Abidjan" <?php if ($ville == "Abidjan") echo 'selected="true"' ?>>Abidjan</option>
                                                        <option value="Bassam" <?php if ($ville == "Bassam") echo 'selected="true"' ?>>Bassam</option>
                                                        <option value="Bouaké" <?php if ($sexe == "Bouaké") echo 'selected="true"' ?>>Bouaké</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputemail">Pays <span class="text-danger">*</span> </label></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control selectpicker" data-live-search="true" data-width="100%" name="pays">
                                                        <option value="Côte d'ivoire" <?php if ($pays == "Côte d'ivoire") echo 'selected="true"' ?>>Côte d'ivoire</option>
                                                        <option value="Togo" <?php if ($pays == "Togo") echo 'selected="true"' ?>>Togo</option>
                                                        <option value="Mali" <?php if ($pays == "Mali") echo 'selected="true"' ?>>Mali</option>
                                                    </select>
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
                                            <h3 class="panel-title">INFORMATIONS DE CONTACT</h3>
                                        </div>
                                        <hr>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->

                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" placeholder="" id="email" class="form-control" name="email" value="<?php echo $email ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Téléphone</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" placeholder="Ex: 00225 08 52 41 52" id="nom" class="form-control" name="tel" value="<?php echo $tel ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" for="demo-hor-inputpass">Mobile <span class="text-danger">*</span> </label></label>
                                                <div class="col-sm-9">
                                                    <input type="tel" placeholder="Ex: 00225 08 52 41 52" id="nom" class="form-control" name="cel" value="<?php echo $cel ?>">
                                                </div>
                                            </div>


                                        </div>
                                        <div class="panel-footer text-right">
                                            <button class="btn btn-default">Annuler</button>
                                            <button class="btn btn-success" type="submit" name="enregistrer">Enregistrer les modification</button>
                                        </div>

                                        <!--===================================================-->
                                        <!--End Horizontal Form-->

                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="<?php echo base_url(); ?>/assets/Admin/js/jquery.min.js"></script>
<script type="text/javascript">
    var redirect = "<?php echo site_url() . '/AccueilAdmin/profile'; ?>";
    var redirectLogin = "<?php echo site_url() . '/login/login'; ?>";
    

    //console.log("Redirection "+redirect);
</script>