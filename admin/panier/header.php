<?php 
    require '_header.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zinira - GESTION DE COUTURE</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../../img/logo1.png">


    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="client.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <sup>Menu général </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../client/client.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Clients</span></a>
            </li>
            <!-- Divider -->
          
            <li class="nav-item active">
                <a class="nav-link" href="../client/mesures.php">
                    <i class="fas fa-fw fa-pencil-ruler"></i>
                    <span>Mesures</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="../articles/article.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Articles</span></a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="../articles/modele.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Modèles</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Facturation</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Facturation</h6>
                        <a class="collapse-item" href="../facture/facturation.php">Factures</a>
                        <a class="collapse-item" href="../facture/acompte.php">Acompte</a>
                        <a class="collapse-item" href="../facture/etat.php">Etat de suivi</a>
                        <a class="collapse-item" href="../facture/indicateur.php">Indicateur</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Marquage</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Marquage</h6>
                        <a class="collapse-item" href="../marquage/tailleur.php">Tailleur</a>
                        <a class="collapse-item" href="../marquage/tarif.php">Tarif</a>
                        <a class="collapse-item" href="../marquage/marquage.php">Marquage</a>
                        <a class="collapse-item" href="../marquage/honno.php">Honoraire</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Paramètres</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Paramètres</h6>
                        <a class="collapse-item" href="../param/profil.php">Profil</a>
                        <a class="collapse-item" href="../param/user.php">Utilisateur</a>
                    </div>
                </div>
            </li>
           
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   <img src="../../img/logo2.png" alt="ZiniraCouture" height="67" width="145.5">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                           <a class="nav-link" href="../../deconnexion.php" role="button"> Déconnexion &nbsp;  
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->