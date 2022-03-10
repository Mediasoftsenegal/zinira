<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zinira - GESTION DE COUTURE</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="nav-link" href="client.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Clients</span></a>
            </li>
            <!-- Divider -->
            <li class="nav-item active">
                <a class="nav-link" href="mesures.php">
                    <i class="fas fa-fw fa-pencil-ruler"></i>
                    <span>Mesures</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="articles/article.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Articles</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="articles/modele.php">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Modèles</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="facture.php">
                    <i class="fas fa-fw fa-money-check"></i>
                    <span>Factures</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="etat.php">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>Etat de suivi</span></a>
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
                   <h2>Zinira Couture</h2>

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
                            <a class="nav-link" href="deconnexion.php" role="button"> Déconnexion &nbsp;
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
                        <h1 class="h3 mb-0 text-gray-800">Mesures</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-primary">Critères de recherche &nbsp;&nbsp;&nbsp;
									<!-- Topbar Search -->
									<form
										class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..."
												aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
													<i class="fas fa-search fa-sm"></i>
												</button>
											</div>
										</div>
									</form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Clients</th>
                                                    <th>Téléphone</th>
                                                    <th>Longueur</th>
                                                    <th>Grand-Boubou</th>
                                                    <th>Epaule</th>
                                                    <th>Cou</th>
                                                    <th>Manche</th>
                                                    <th>Taille</th>
                                                    <th>Taille-Manche</th>
                                                    <th>Poignet</th>
                                                    <th>Pantalon</th>
                                                    <th>Taille-Cou</th>
                                                    <th>Tour-Fesse</th>
                                                    <th>Cuisse</th>
                                                    <th>Bas</th>
                                                    <th>Poitrine</th>
                                                    <th>Hanche</th>
                                                    <th>Pince</th>
                                                    <th>Blouse</th>
                                                    <th>Jupe</th>
                                                    <th>Robe</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Clients</th>
                                                    <th>Téléphone</th>
                                                    <th>Longueur</th>
                                                    <th>Grand-Boubou</th>
                                                    <th>Epaule</th>
                                                    <th>Cou</th>
                                                    <th>Manche</th>
                                                    <th>Taille</th>
                                                    <th>Taille-Manche</th>
                                                    <th>Poignet</th>
                                                    <th>Pantalon</th>
                                                    <th>Taille-Cou</th>
                                                    <th>Tour-Fesse</th>
                                                    <th>Cuisse</th>
                                                    <th>Bas</th>
                                                    <th>Poitrine</th>
                                                    <th>Hanche</th>
                                                    <th>Pince</th>
                                                    <th>Blouse</th>
                                                    <th>Jupe</th>
                                                    <th>Robe</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    $i = 1;
                                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                                    $resultat = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client");
                                                    while($res = $resultat->fetch()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $i++?></td>
                                                    <td><?php echo $res['prenom_nom']?></td>
                                                    <td><?php echo $res['telephone']?></td>
                                                    <td><?php echo $res['longueur']?></td>
                                                    <td><?php echo $res['longueurgrandboubou']?></td>
                                                    <td><?php echo $res['epaule']?></td>
                                                    <td><?php echo $res['cou']?></td>
                                                    <td><?php echo $res['manche']?></td>
                                                    <td><?php echo $res['taille']?></td>
                                                    <td><?php echo $res['taillemanche']?></td>
                                                    <td><?php echo $res['poignet']?></td>
                                                    <td><?php echo $res['longueurpantalon']?></td>
                                                    <td><?php echo $res['taillecou']?></td>
                                                    <td><?php echo $res['tourfess']?></td>
                                                    <td><?php echo $res['cuisse']?></td>
                                                    <td><?php echo $res['bas']?></td>
                                                    <td><?php echo $res['poitrine']?></td>
                                                    <td><?php echo $res['hanche']?></td>
                                                    <td><?php echo $res['pince']?></td>
                                                    <td><?php echo $res['blouse']?></td>
                                                    <td><?php echo $res['longueurjupe']?></td>
                                                    <td><?php echo $res['longueurrobe']?></td>
                                                    <td align="center">
                                                        <a href="modif_m.php?mo=<?php echo $res['id_mesure'];?>"><i class="fas fa-edit"></i></a>
                                                        <a href="#"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                $reponse->closeCursor();?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
                        <span>Copyright &copy; Your Website 2021</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>