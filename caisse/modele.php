<?php require '../pages/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modèles</h1>
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
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouveau modèle</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
													<th>Numéro modèle</th>
													<th>Libelle modèle</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
													<th>Numéro modèle</th>
													<th>Libelle modèle</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                $i = 0;
                                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                                $reponse = $bdd->query("SELECT * FROM zen_modele");
                                                while($donnees = $reponse->fetch()){?>
                                                <tr>
                                                    <td style="text-transform: uppercase"><?php echo $donnees['codemod']?></td>
                                                    <td style="text-transform: uppercase" ><?php echo $donnees['libmod'];?></td>
                                                    <td align="center">
                                                        <a href="modif_modele.php?mo=<?php echo $donnees['codemod'];?>"><i class="fas fa-edit"></i></a>
                                                        <a href="annul_modele.php?sup=<?php echo $donnees['codemod'];?>"><i class="fas fa-trash"></i></a>
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
            <form class="form-horizontal style-form" action="insert_article.php" method="POST" >
                <!-- Modal -->
                <div class="modal fade" id="Modals" role="dialog">
                    <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Formulaire d'un nouveau modèle</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Libellé modèle</label>
                                    <div class="col-sm-6">
                                        <input type="text" style="text-transform: uppercase" name="libmod" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="bt_modele" >Enregistrer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

            <?php require '../pages/footer.php'; ?>