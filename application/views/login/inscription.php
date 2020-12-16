<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fily Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/template/images/favicon.png" />
</head>

<body class="sidebar-fixed">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="<?php echo base_url()?>/assets/template/images/logo-black.svg" alt="logo">
                        </div>
                        <h4>Vous êtes nouveau?</h4>
                        <h6 class="font-weight-light">Rejoignez nous! Ceci ne prend que quelques minutes.</h6>
                        <form class="pt-3" method="post" action="">
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="text" id="nom" name="nom" class="form-control form-control-lg border-left-0" placeholder="Entrez votre nom" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Prénoms</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="text" id="prenom" name="prenom" class="form-control form-control-lg border-left-0" placeholder="Entrez vos prénoms" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="email" id="email" name="email" class="form-control form-control-lg border-left-0" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="text" id="login" name="login" class="form-control form-control-lg border-left-0" placeholder="Nom d'utilisateur" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                                    </div>
                                    <input type="password" id="motdepasse" name="motdepasse" class="form-control form-control-lg border-left-0" id="motdepasse" placeholder="Mot de passe" required>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="inscription" name="inscription">S'inscrire</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Vous avez déjà un compte? <a href="<?php echo site_url() ?>/login/login" class="text-primary">Connectez-vous</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 register-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
                </div>
            </div>
        </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url()?>/assets/template/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url()?>/assets/template/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>/assets/template/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>/assets/template/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url()?>/assets/template/js/template.js"></script>
  <script src="<?php echo base_url()?>/assets/template/js/settings.js"></script>
  <script src="<?php echo base_url()?>/assets/template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
