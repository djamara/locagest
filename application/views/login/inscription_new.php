<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from www.themeon.net/nifty/v2.9/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 12:39:09 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Register page | Nifty - Admin Template</title>


        <!--STYLESHEET-->
        <!--=================================================-->

        <!--Open Sans Font [ OPTIONAL ]-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url() ?>/assets/Admin/css/bootstrap.min.css" rel="stylesheet">


        <!--Nifty Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url() ?>/assets/Admin/css/nifty.min.css" rel="stylesheet">


        <!--Nifty Premium Icon [ DEMONSTRATION ]-->
        <link href="<?php echo base_url() ?>/assets/Admin/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


        <!--=================================================-->



        <!--Pace - Page Load Progress Par [OPTIONAL]-->
        <link href="<?php echo base_url() ?>/assets/Admin/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>/assets/Admin/plugins/pace/pace.min.js"></script>



        <!--Demo [ DEMONSTRATION ]-->
        <link href="<?php echo base_url() ?>/assets/Admin/css/demo/nifty-demo.min.css" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="<?php echo base_url() ?>/assets/Admin/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>/assets/Admin/css/mon-style.css" rel="stylesheet">


        <!--=================================================
    
        REQUIRED
        You must include this in your project.
    
    
        RECOMMENDED
        This category must be included but you may modify which plugins or components which should be included in your project.
    
    
        OPTIONAL
        Optional plugins. You may choose whether to include it in your project or not.
    
    
        DEMONSTRATION
        This is to be removed, used for demonstration purposes only. This category must not be included in your project.
    
    
        SAMPLE
        Some script samples which explain how to initialize plugins or components. This category should not be included in your project.
    
    
        Detailed information and more samples can be found in the document.
    
        =================================================-->

    </head>

    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

    <body>
        <div id="container" class="cls-container">


            <!-- BACKGROUND IMAGE -->
            <!--===================================================-->
            <div id="bg-overlay" class="bg-img bg-inscription"></div>


            <!-- REGISTRATION FORM -->
            <!--===================================================-->
            <div class="cls-content">
                <div class="cls-content-lg panel">
                    <div class="panel-body">
                        <div class="mar-ver pad-btm">
                            <h1 class="h3">Création de compte</h1>
                            <p>Rejoignez-nous, ça prend seulement quelques minutes</p>
                        </div>
                        <form action="<?php echo site_url() ?>/login/creerProfile" method="post" class="form-horizontal" id="form-inscription">
                            <div class="row">
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="nom" name="nom" id="nom" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Prénoms" name="prenom" id="prenom" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" id="login" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-horizontal">
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" placeholder="Mot de passe" name="motdepasse" id="motdepasse" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control" placeholder="Confirmer le mot de passe" name="motdepasse_confirm" id="motdepasse_confirm" required>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="checkbox pad-btm text-left">
                                <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                                <label for="demo-form-checkbox">J'accepte les <a href="#" class="btn-link text-bold">Termes et conditions</a></label>
                            </div>-->
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="inscription" id="valider">Creer mon compte</button>
                            
                        </form>
                    </div>
                    <div class="pad-all">
                        Vous avez déjà un compte ? <a href="<?php echo site_url() ?>/login/login" class="btn-link mar-rgt text-bold">Connectez-vous</a>

                        <div class="media pad-top bord-top">
                            <div class="pull-right">
                                <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                                <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                                <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                            </div>
                            <div class="media-body text-left text-main text-bold">
                                Se connecter avec
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->



        <!--JAVASCRIPT-->
        <!--=================================================-->

        <!--jQuery [ REQUIRED ]-->
        <script src="<?php echo base_url() ?>/assets/Admin/js/jquery.min.js"></script>


        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url() ?>/assets/Admin/js/bootstrap.min.js"></script>


        <!--NiftyJS [ RECOMMENDED ]-->
        <script src="<?php echo base_url() ?>/assets/Admin/js/nifty.min.js"></script>

        <script src="<?php echo base_url() ?>/assets/Admin/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

        <script src="<?php echo base_url() ?>/assets/Admin/js/inscription.js"></script>
        
        <script type="text/javascript">
            var redirect="<?php echo site_url().'/login/login'; ?>";
            
            //console.log("Redirection "+redirect);
        </script>
        
    </body>

    <!-- Mirrored from www.themeon.net/nifty/v2.9/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 12:39:09 GMT -->
</html>
