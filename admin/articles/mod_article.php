<?php

$id_article=$_GET['p'];
$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

	$reponse = $bdd->query('SELECT * FROM `zen_produit` WHERE codep='.$id_article);
	$donnees = $reponse->fetch();
	
	$des = $donnees['des'];
    $pu = $donnees['pu'];
    $catp = $donnees['catp'];
	$id_modele = $donnees['id_modele'];
	$genre = $donnees['genre'];
	$couleur = $donnees['couleur'];
?>
<?php require '../pages/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Article</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>
   <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12" >
                            <div class="card shadow mb-4">
                                <form class="form-horizontal style-form" action="insert_article.php" method="POST" >
									
									<!-- Modal content-->
								<div class="card-body">
									<div class="card lg-8">
										<div class="card-header">
											<h3> Modification d'un article</h3>
										</div>
										<div class="row">
										<div class="col-lg-1" ></div><div class="col-lg-10" >
										<div class="card-body">
										<input type="number" hidden name="codep" value="<?php echo $id_article; ?>" class="form-control">
												<div class="form-group">
													<label class="col-sm-4 control-label">Désignation</label>
													<div class="col-sm-6">
														<input type="text" style="text-transform: uppercase" name="des"  value="<?php echo $des; ?>" class="form-control">
													</div>
												</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Prix unitaire :</label>
												<div class="col-sm-6">
													<input type="number"  name="pu" value="<?php echo $pu; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label  class="col-sm-4 control-label">Choisir une catégorie:</label>
												<div class="col-sm-2">
													<select name="catp" id="catp" value="<?php echo $catp; ?>" class="form-control" > 
													  <option value="<?php echo $catp; ?>"><?php echo $catp; ?></option>
													  <option value="PAP">PAP</option>
													  <option value="TISSU">TISSU</option>
													</select>
												</div>
											</div>
											<div class="form-group">
                                                <?php $req = $bdd->query('SELECT * FROM `zen_modele`');
	                                                ?>
												<label class="col-sm-4 control-label">Modèle :</label>
												<div class="col-sm-6">
                                                    <select name="modele" id="modele" value="<?php echo $id_modele; ?>" class="form-control" > 
													    <option value="<?php echo $id_modele; ?>"><?php echo $id_modele; ?></option-->
                                                        <?php while($don = $req->fetch()){?>
                                                        <option value="<?= $don['codemod']?>"><?= $don['libmod']?></option>
                                                        <?php } $req->closeCursor();?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label  class="col-sm-4 control-label for="cars">Choisir un genre:</label>
													<div class="col-sm-2">
													<select name="genre" id="genre" value="<?php echo $genre; ?>" class="form-control">
													   <option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
													  <option value="Homme">Homme</option>
													  <option value="Femme">Femme</option>
													</select>
													</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Couleur :</label>
												<div class="col-sm-6">
													<input type="text" style="text-transform: uppercase" name="couleur" value="<?php echo $couleur; ?> "class="form-control">
												</div>
											</div>
										
											<div class="footer">
												<A HREF="article.php"><button type="button"  class="btn btn-primary" >Fermer</button></A>
												<button type="submit" class="btn btn-success" name="bt_update_articles" >Enregistrer</button>
											</div> 
											</div>
										</div><div class="col-lg-1" ></div>	
									</div>   
								</div> 
							</form>
                            <?php require '../pages/footer.php'; ?>