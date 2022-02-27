<?php

$id_client=$_GET['mo'];
$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

	$reponse = $bdd->query('SELECT * FROM `zen_client` WHERE id_client='.$id_client);
	$donnees = $reponse->fetch();
	
	$prenom_nom = $donnees['prenom_nom'];
    $genre = $donnees['genre'];
    $telephone = $donnees['telephone'];
	$adresse = $donnees['adresse'];

?>
<?php require '../pages/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Client</h1>
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>
   <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12" >
                            <div class="card shadow mb-4">
                                <form class="form-horizontal style-form" action="insert_client.php" method="POST" >
									
									<!-- Modal content-->
								<div class="card-body">
									<div class="card lg-8">
										<div class="card-header">
											<h3> Modification d'un client</h3>
										</div>
										<div class="row">
										<div class="col-lg-1" ></div><div class="col-lg-10" >
										<div class="card-body">
										<input type="number" hidden name="codep" value="<?php echo $id_client; ?>" class="form-control">
												<div class="form-group">
													<label class="col-sm-4 control-label">Prénom & Nom</label>
													<div class="col-sm-6">
														<input type="text" style="text-transform: uppercase" name="prenom_nom"  value="<?php echo $prenom_nom; ?>" class="form-control">
													</div>
												</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Genre :</label>
												<div class="col-sm-6">
													<input type="text"  name="genre" value="<?php echo $genre; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label  class="col-sm-4 control-label">Téléphone:</label>
												<div class="col-sm-2">
													<input type="text" style="text-transform: uppercase" name="telephone"  value="<?php echo $telephone; ?>" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Adresse :</label>
												<div class="col-sm-6">
													<input type="text" style="text-transform: uppercase" name="adresse"  value="<?php echo $adresse; ?>" class="form-control">
												</div>
											</div>
											
											
										
											<div class="footer">
												<A HREF="client.php"><button type="button"  class="btn btn-primary" >Fermer</button></A>
												<button type="submit" class="btn btn-success" name="bt_modif_client" >Enregistrer</button>
											</div> 
											</div>
										</div><div class="col-lg-1" ></div>	
									</div>   
								</div> 
							</form>
                            <?php require '../pages/footer.php'; ?>