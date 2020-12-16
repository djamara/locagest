<!DOCTYPE html>
<html lang="en">


    <!-- Mirrored from www.themeon.net/nifty/v2.9/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 12:38:01 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Login page | Nifty - Admin Template</title>


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

    <body id="connexion-page">
        <div id="container" class="cls-container">

            <!-- BACKGROUND IMAGE -->
            <!--===================================================-->
            <div id="bg-overlay" class="bg-img bg-inscription"></div>


            <!-- LOGIN FORM -->
            <!--===================================================-->
            <div class="cls-content">
                <div class="cls-content-sm panel">
                    <div class="panel-body">
                        <div class="mar-ver pad-btm">
                            <h1 class="h3">Connexion au compte</h1>
                            <p>Connectez-vous à votre compte</p>
                        </div>
                        <form action="<?php echo site_url() ?>/login/connecterUser" method="post" id="form-connexion">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" id="login" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="motdepasse" id="motdepasse" required>
                            </div>
                            <div class="checkbox pad-btm text-left">
                                <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                                <label for="demo-form-checkbox">Se souvenir de moi</label>
                            </div>
                            <button class="btn btn-primary btn-lg btn-block" id="btn-connexion" type="submit" name="connexion">Se connecter</button>
                        </form>
                    </div>

                    <div class="pad-all">
                        <a href="#" class="btn-link mar-rgt">Mot de passe oublié ?</a>
                        <a href="<?php echo site_url() ?>/login/inscription" class="btn-link mar-lft">Créer un compte</a>

                        <div class="media pad-top bord-top">
                            <div class="pull-right">
                                <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                                <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                                <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                            </div>
                            <div class="media-body text-left text-bold text-main">
                                Se connecter avec
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->

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
        <!--=================================================-->
        <script src="<?php echo base_url() ?>/assets/Admin/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        
        <script src="<?php echo base_url() ?>/assets/Admin/js/connexion.js"></script>
        
        <script type="text/javascript">
            var redirect="<?php echo site_url().'/AccueilAdmin/accueil'; ?>";
            
            //console.log("Redirection "+redirect);
        </script>
    </body>

    <!-- Mirrored from www.themeon.net/nifty/v2.9/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 12:38:01 GMT -->
</html>
