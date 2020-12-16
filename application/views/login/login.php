<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fily Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url()?>/assets/template/images/favicon.png" />
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="<?php echo base_url()?>/assets/template/images/logo-black.svg" alt="logo">
              </div>
              <h4>BIENVENUE!</h4>
              <h6 class="font-weight-light">Heurux de vous revoir!</h6>
              <form class="pt-3" method="post" action="">
                <div class="form-group">
                  <label for="login">Nom d'utilisateur</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="login" placeholder="Nom d'utilisateur" name="login" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="motdepasse">Mot de passe</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="motdepasse" placeholder="Mot de passe" name="motdepasse" required>
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Se souvenir de moi ?
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Mot de passe oublié ?</a>
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="connexion">Se connecter</button>
                </div>
                <div class="mb-2 d-flex">
                  <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                    <i class="mdi mdi-facebook mr-2"></i>Facebook
                  </button>
                  <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                    <i class="mdi mdi-google mr-2"></i>Google
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Vous n'avez pas de compte? <a href="<?php echo site_url()?>/login/inscription" class="text-primary">Inscrivez-vous</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <script>document.write(new Date().getFullYear());</script>  All rights reserved.</p>
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
