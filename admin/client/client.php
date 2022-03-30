<?php require '../pages/header.php'; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Clients</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">
                            <!-- Project Card Example -->
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
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouveau Client</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Prénom & Nom</th>
                                                    <th>Genre</th>
                                                    <th>Téléphone</th>
                                                    <th>Adresse</th>
                                                    <th>Mesures</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Prénom & Nom</th>
                                                    <th>Genre</th>
                                                    <th>Téléphone</th>
                                                    <th>Adresse</th>
                                                    <th>Mesures</th>
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
                                                    <td><?php echo $donnees['adresse'];?></td>
                                                    <td align="center"><a href="mesure.php?me=<?php echo $donnees['id_client'];?>"><i class="fas fa-pencil-ruler"></i></a></td>
                                                    <td align="center">
                                                        <a href="modif.php?mo=<?php echo $donnees['id_client'];?>"><i class="fas fa-edit"></i></a>
                                                        <a href="#"><i class="fas fa-trash" data-toggle="modal" data-target="#Deletes"></i></a>
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
            <form class="form-horizontal style-form" action="insert_client.php" method="POST" >
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-success" name="bt_client" >Enregistrer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

            <form class="form-horizontal style-form" action="insert_client.php" method="POST" >
                <!-- Modal -->
                <div class="modal fade" id="Deletes" role="dialog">
                    <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"></h5>
                            </div>
                            <div class="modal-body">
                                <h4>Voulez-vous supprimer ce client ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger" name="bt_supp_client" >Supprimer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

<?php require '../pages/footer.php'; ?>  