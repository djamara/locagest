<!DOCTYPE html>
<html lang="en">



<!-- Mirrored from www.themeon.net/nifty/v2.9/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 Jan 2018 12:38:55 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>LOCAGEST | Gestion Immobilière</title>
    <link rel="icon" href="<?php echo base_url()?>/assets/images/assurance.png">

    <!--STYLESHEET-->
    <!--=================================================-->
    <!--JS CONFIRM -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url()?>/assets/Admin/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?php echo base_url()?>/assets/Admin/css/nifty.min.css" rel="stylesheet">
    
    <script src="<?php echo base_url()?>/assets/Admin/plugins/font-awesome/css/font-awesome.min.css"></script>


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?php echo base_url()?>/assets/Admin/css/demo/nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo base_url()?>/assets/Admin/plugins/pace/pace.min.js"></script>

    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css" rel="stylesheet">


    <!--Chosen [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/chosen/chosen.min.css" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">

    <!--Dropzone [ OPTIONAL ]-->
    <link href="<?php echo base_url()?>/assets/Admin/plugins/dropzone/dropzone.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo base_url();?>assets/Admin/css/demo/nifty-demo.min.css" rel="stylesheet">


        
    <!--DataTables [ OPTIONAL ]-->
    <link href="<?php echo base_url();?>assets/Admin/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/Admin/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url();?>assets/Admin/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
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
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="<?php echo site_url()?>/AccueilAdmin/accueil" class="navbar-brand">
                    <img src="<?php echo base_url()?>/assets/images/assurance.png" alt="Locagest" class="brand-icon">
                    <div class="brand-title">
                        <span class="brand-text">LOCAGEST</span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content">
                <ul class="nav navbar-top-links">

                    <!--Navigation toogle button-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="tgl-menu-btn">
                        <a class="mainnav-toggle" href="#">
                            <i class="demo-pli-list-view"></i>
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Navigation toogle button-->



                    <!--Search-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li>
                        <div class="custom-search-form">
                            <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                                <i class="demo-pli-magnifi-glass"></i>
                            </label>
                            <form>
                                <div class="search-container collapse" id="nav-searchbox">
                                    <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                                </div>
                            </form>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End Search-->

                </ul>
                <ul class="nav navbar-top-links">


                    <!--Mega dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="mega-dropdown">
                        <a href="#" class="mega-dropdown-toggle">
                            <i class="demo-pli-layout-grid"></i>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>
                                        <li style="<?php if(isset($_SESSION['idAgence'])) echo 'display:block'; else echo 'display:none'; ?>"><a href="<?php echo site_url()?>/AccueilAdmin/profile">Profile</a></li>
                                        <li><a href="#">Search Result</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Sreen Lock</a></li>
                                        <li><a href="#">Maintenance</a></li>
                                        <li><a href="#">Invoice</a></li>
                                        <li><a href="#" class="disabled">Disabled</a></li>                                        </ul>

                                </div>
                                <div class="col-sm-4 col-md-3">

                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>
                                        <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
                                        <li><a href="#">Read Message</a></li>
                                        <li><a href="#">Compose</a></li>
                                        <li><a href="#">Template</a></li>
                                    </ul>
                                    <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>
                                    <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <!--Mega menu list-->
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <span class="badge badge-success pull-right">90%</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-main mar-no">Data Backup</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-support icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-main mar-no">Support</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-computer-secure icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-main mar-no">Security</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="media mar-btm">
                                                <div class="media-left">
                                                    <i class="demo-pli-map-2 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-semibold text-main mar-no">Location</p>
                                                    <small class="text-muted">This is the item description</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p class="dropdown-header"><i class="demo-pli-file-jpg icon-lg icon-fw"></i> Gallery</p>
                                    <div class="row img-gallery">
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-1.jpg" alt="thumbs">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-3.jpg" alt="thumbs">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-2.jpg" alt="thumbs">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-4.jpg" alt="thumbs">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-6.jpg" alt="thumbs">
                                        </div>
                                        <div class="col-xs-4">
                                            <img class="img-responsive" src="<?php echo base_url()?>/assets/Admin/img/thumbs/img-5.jpg" alt="thumbs">
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-block btn-primary">Browse Gallery</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End mega dropdown-->



                    <!--Notification dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="demo-pli-bell"></i>
                            <span class="badge badge-header badge-danger"></span>
                        </a>


                        <!--Notification dropdown menu-->
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="nano scrollable">
                                <div class="nano-content">
                                    <ul class="head-list">
                                        <li>
                                            <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">
                                                <div class="media-left">
                                                    <i class="demo-pli-data-settings icon-2x text-main"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-nowrap text-main text-semibold">HDD is full</p>
                                                    <div class="progress progress-sm mar-no">
                                                        <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                                            <span class="sr-only">95% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-file-edit icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                                                    <small>Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <span class="label label-info pull-right">New</span>
                                                <div class="media-left">
                                                    <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                    <small>Last Update 8 hours ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-add-user-star icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                    <small>4 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url()?>/assets/Admin/img/profile-photos/9.png">
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                    <small>30 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url()?>/assets/Admin/img/profile-photos/3.png">
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                    <small>40 minutes ago</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--Dropdown footer-->
                            <div class="pad-all bord-top">
                                <a href="#" class="btn-link text-main box-block">
                                    <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                </a>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End notifications dropdown-->



                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--You can also display a user name in the navbar.-->
                            <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        </a>


                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                            <ul class="head-list">
                                <li style="<?php if(isset($_SESSION['idAgence'])) echo 'display:block'; else echo 'display:none'; ?>">
                                    <a href="<?php echo site_url()?>/AccueilAdmin/profile"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                </li>
                                <li>
                                    <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() ?>/Login/deconnecterUser"><i class="demo-pli-unlock icon-lg icon-fw"></i> Déconnexion</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End user dropdown-->

                    <li>
                        <a href="#" class="aside-toggle">
                            <i class="demo-pli-dot-vertical"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
    <!--===================================================-->
    <!--END NAVBAR-->
    <div class="boxed">
