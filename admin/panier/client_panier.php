<?php require 'header.php'; ?>
<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $zen = $pdo->query("SELECT * FROM zen_factures ORDER BY numero_facture DESC LIMIT 1");
    $annul = $zen->fetch();
    $numfact = $annul['numero_facture'] + 1;
    $_SESSION['num_fact'] = $numfact;
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panier->Choisir le client</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">Etape 1
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h3><?php echo "Numéro facture : ".$_SESSION['num_fact']; ?></h3>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Prénom & Nom</th>
                                                    <th>Genre</th>
                                                    <th>Téléphone</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Prénom & Nom</th>
                                                    <th>Genre</th>
                                                    <th>Téléphone</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                                $reponse = $bdd->query("SELECT * FROM zen_client WHERE etat = 1");
                                                while($donnees = $reponse->fetch()){?>
                                                <tr>
                                                    <td><?php echo ++$i;?></td>
                                                    <td><?php echo $donnees['prenom_nom'].'=>'.$donnees['telephone'];?></td>
                                                    <td><?php echo $donnees['genre'];?></td>
                                                    <td><?php echo $donnees['telephone'];?></td>
                                                    <td align="center">
                                                        <a href="produit.php?po=<?php echo $donnees['id_client'];?>"><i class="fas fa-shopping-cart"></i></a>
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

<?php require 'footer.php'; ?>  