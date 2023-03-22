

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin WebSTEP</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin STEP</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index1.php">
                        <!-- Logo icon --><b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" width="35" height="35"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <img src="../assets/images/logo-txt.png" alt="homepage" class="dark-logo" width="75" height="35"/>
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <?php if(!empty($user)): ?>
                                <a href="#"></a> <?= $user['email'] ?>
                                <button class="btn btn-danger" value="Cerrar Sesion" onclick="location.href='cerrarsesion.php'"> Cerrar Sesion <a style="color: white;"><i class="bi bi-box-arrow-in-left"></i></a></button>
                                <!--<a class="nav-link waves-effect waves-dark" href="#"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>-->                        
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index1.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Admin</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="pages-profile.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Profile</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="table-basic.php" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu"></span>Responsible</a></li>
                        <li> <a class="waves-effect waves-dark" href="map-google.php" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Location</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <iframe width="100%" frameborder="0" src="https://stem.ubidots.com/app/dashboards/public/widget/NDhEtGRHkinYwJb-cOaoGwgMWzaIrzKuU3MuSQmipsY?embed=true"></iframe>
                                <br><br><br><br><br><iframe width="100%" frameborder="0" src="https://stem.ubidots.com/app/dashboards/public/widget/t5yw6hl8aPOTyItb2d5YK42u2UIhVa8Pr4XI14HQJxE?embed=true"></iframe>

                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- visit charts-->
                    <!-- ============================================================== -->
                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <h3 style="color: red;">Notification of panic</h3>
                            <iframe width="100%" frameborder="0" src="https://stem.ubidots.com/app/dashboards/public/widget/TScUreef6voWuwV8lNk8vRfjZM_anW4sWxMFoxvU2oc?embed=true"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2022 Admin STEP Smart Stick </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard.js"></script>
</body>

</html>


