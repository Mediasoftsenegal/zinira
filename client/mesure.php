<?php require '../pages/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!--h1 class="h3 mb-0 text-gray-800">Mesures</h1-->
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div>
                        <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                            if(isset($_GET['me'])){
                                //var_dump($_GET);
                                $id_client = $_GET['me'];
                                $reponse = $bdd->query("SELECT * FROM zen_client  WHERE id_client = ".$id_client."");
                                $row = $reponse->fetch();
                        ?>
					<div class="row">
                        <div class="col-lg-12" >
                            <div class="card shadow mb-4">
									<!-- Modal content-->
									<div class="card-body">
										<div class="card lg-8">
											<div class="card-header">
												<h3>Mesures de <?php echo $row['prenom_nom']?></h3>
											</div>
											<legend>Infos client</legend>
										</div>
										<div class="row">
											<div class="card-body">
											<input type="number" hidden name="codep" value="<?php echo $row['id_mesure']; ?>" class="form-control">
												<fieldset disabled="disabled">
													<div class="form-group">
														<div class="row">
															<div class="col-sm-3">
                                                                <label>Prénom Nom :</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['prenom_nom']?>">
															</div>
                                                            <div class="col-sm-3">
                                                                <label>Genre</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['genre']?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>adresse :</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['adresse']?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Téléphone :</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['telephone']?>">
                                                            </div>
														</div>
													</div>
												</fieldset>
											</div>
										</div>	
									</div>	
							</div>
						</div>
                       
                        <?php $donnees = $bdd->query("SELECT * FROM zen_mesure  WHERE id_client = ".$id_client."");
                        $exe = $donnees->fetch();?>
                        
							<div class="col-lg-12" >
								<div class="card shadow mb-4">
									<div class="card-body">
									    <legend>Mesures</legend>
										<form action="#" method="post">
											<div class="row">
											    <!--input disabled type="text" class="form-control" value="<?php //echo $exe['id_client']?>"-->
												<div class="col-sm-2">
													<div class="px-3 py-5 bg-gradient-success text-white">
                                                        <label>Hanche</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['hanche']?>">
                                                        
                                                        <label>Blouse</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['blouse']?>">
                                                        
                                                        <label>Poitrine</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['poitrine']?>">
                                                        
                                                        <label>Jupe</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['longueurjupe']?>">
                                                        
                                                        <label>Taille</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['taille']?>">
                                                        
                                                        <label>Pince</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['pince']?>">
                                                        
                                                        <label>Cuisse</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['cuisse']?>">
                                                    </div>
												</div>
												<div class="col-sm-2">
													<div class="px-3 py-5 bg-gradient-warning text-white">
                                                        <label>longueur</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['longueur']?>">

                                                        <label>Epaule</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['epaule']?>">
                                                        
                                                        <label>Manche</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['manche']?>">
                                                        
                                                        <label>Cou</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['cou']?>">
                                                        
                                                        <label>Pantalon</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['longueurpantalon']?>">
                                                        
                                                        <label>Bas</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['bas']?>">

                                                        <label>Tour-Bras</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['tourbras']?>">
													</div>
												</div>
												<div class="col-sm-2">
													<div class="px-3 py-5 bg-gradient-info text-white">
                                                        <label>Robe</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['longueurrobe']?>">
                                                        
                                                        <label>Grand-Boubou</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['longueurgrandboubou']?>">

                                                        <label>Poignet</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['poignet']?>">
                                                    
                                                        <label>Taille-Cou</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['taillecou']?>">
                                                        
                                                        <label>Tour-Fesse</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['tourfess']?>">
                                                        
                                                        <label>Tour-Manche</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['tourmanche']?>">
                                                        
                                                        <label>Ceinture</label>
                                                        <input type="text" class="form-control" value="<?php echo $exe['ceinture']?>">
													</div>
												</div>
                                            </div>
												<div class="footer" align="center" style="margin-top: 5px;">
                                                    <A HREF="mesures.php"><button type="button"  class="btn btn-primary" >Fermer</button></A>
                                                    <!--button type="submit" class="btn btn-success" name="bt_mesure" >Enregistrer</button-->
												</div> 
										</form>		
									</div>	
								</div>
								<?php } ?>
							</div>
						
					</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php require '../pages/footer.php'; ?> 