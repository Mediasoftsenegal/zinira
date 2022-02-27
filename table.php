<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-3"> <sup>ZINIRA</sup></div>
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
			<hr class="sidebar-divider">
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
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Liste clients</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouveau Client</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Genre</th>
                                            <th>Téléphone</th>
                                            <th>Adresse</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Genre</th>
                                            <th>Téléphone</th>
                                            <th>Adresse</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $i = 0;
                                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                            $reponse = $bdd->query("SELECT * FROM zen_client");
                                            while($donnees = $reponse->fetch()){
                                        ?>
                                        <tr>
                                            <td><?php echo $donnees['prenom_nom'];?></td>
                                            <td><?php echo $donnees['genre'];?></td>
                                            <td><?php echo $donnees['telephone'];?></td>
                                            <td><?php echo $donnees['adresse'];?></td>
                                        </tr>
                                        <?php
                                            }
                                            $reponse->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <form class="form-horizontal style-form" action="insert.php" method="POST" >
                <!-- Modal -->
                <div class="modal fade" id="Modals" role="dialog">
                    <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Formulaire d'une nouveau client</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Prénom Nom :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="prenom_nom" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Genre :</label>
                                    <div class="col-sm-6">
                                        <p><input type="radio" name="genre" value="Homme"> Homme</p>
                                        <p><input type="radio" name="genre" value="Femme"> Femme</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Téléphone :</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Adresse :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="adresse" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="bt_client" >Enregistrer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>