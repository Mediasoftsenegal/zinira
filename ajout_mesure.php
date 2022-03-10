<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zinira - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                <div class="sidebar-brand-text mx-3"> <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="client.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Clients</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="mesures.php">
                    <i class="fas fa-fw fa-pencil-ruler"></i>
                    <span>Mesures</span></a>
            </li>
            <hr class="sidebar-divider">
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="facture.php">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Factures</span></a>
            </li>
            <hr class="sidebar-divider">
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="etat.php">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Etat de suivi</span></a>
            </li>
            <hr class="sidebar-divider">
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="article.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Articles</span></a>
            </li>
            <hr class="sidebar-divider">
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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                            <a class="nav-link" href="index.php" role="button">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajout Mesures</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <form action="insert.php" method="post" class="form-horizontal style-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="control-label">Genre :</label>
                                                    <div>
                                                        <p><input type="radio" name="genre" value="Homme"> Homme</p>
                                                        <p><input type="radio" name="genre" value="Femme"> Femme</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="control-label">Téléphone :</label>
                                                    <div>
                                                        <input type="number" name="telephone" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="control-label">Client :</label>
                                                    <div>
                                                        <?php
                                                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                                                $reponse = $bdd->query("SELECT * FROM zen_client ORDER BY id_client DESC LIMIT 1");
                                                        ?>
                                                        <select class="js-example-basic-single form-control" name="prenom_nom">
                                                            <?php while($row = $reponse->fetch()){ ?>
                                                            <option value="<?php echo $row['id_client']?>"><?php echo $row['prenom_nom']?></option>
                                                            <?php } $reponse->closeCursor()?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>longueur</label>
                                        <input type="text" class="form-control" name="longueur">

                                        <label>Tour-Bras</label>
                                        <input type="text" class="form-control" name="tourbras">

                                        <label>Bas</label>
                                        <input type="text" class="form-control" name="bas">

                                        <label>Robe</label>
                                        <input type="text" class="form-control" name="longueurrobe">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Grand-Boubou</label>
                                        <input type="text" class="form-control" name="longueurgrandboubou">

                                        <label>Poignet</label>
                                        <input type="text" class="form-control" name="poignet">

                                        <label>Poitrine</label>
                                        <input type="text" class="form-control" name="poitrine">

                                        <label>Tour-Manche</label>
                                        <input type="text" class="form-control" name="tourmanche">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Epaule</label>
                                        <input type="text" class="form-control" name="epaule">

                                        <label>Pantalon</label>
                                        <input type="text" class="form-control" name="longueurpantalon">

                                        <label>Hanche</label>
                                        <input type="text" class="form-control" name="hanche">

                                        <label>Ceinture</label>
                                        <input type="text" class="form-control" name="ceinture">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Cou</label>
                                        <input type="text" class="form-control" name="cou">

                                        <label>Taille-Cou</label>
                                        <input type="text" class="form-control" name="taillecou">

                                        <label>Pince</label>
                                        <input type="text" class="form-control" name="pince">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Manche</label>
                                        <input type="text" class="form-control" name="manche">

                                        <label>Tour-Fesse</label>
                                        <input type="text" class="form-control" name="tourfess">

                                        <label>Blouse</label>
                                        <input type="text" class="form-control" name="blouse">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Taille</label>
                                        <input type="text" class="form-control" name="taille">

                                        <label>Cuisse</label>
                                        <input type="text" class="form-control" name="cuisse">

                                        <label>Jupe</label>
                                        <input type="text" class="form-control" name="longueurjupe">
                                    </div>
                                </div><br><br>
                                <div>
                                    <button class="btn btn-primary" type="submit" name="bt_mesure">Valider</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zinira <?php $an=date('Y'); echo $an;?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    

</body>

</html>