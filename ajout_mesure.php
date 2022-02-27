<?php require '../pages/header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    //$reponse = $bdd->query("SELECT * FROM zen_client ORDER BY id_client DESC LIMIT 1");
    if(isset($_GET['me'])){
        //var_dump($_GET);
        $id_client = $_GET['me'];
        //echo $id_client;
        $reponse = $bdd->query("SELECT * FROM zen_client WHERE id_client = ".$id_client);
		while($row = $reponse->fetch()){ 
    ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajout Mesures</h1>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
    </div>
	<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Infos personnels du client</h6>
        </div>
        <div class="card-body">
			<div class="row">
                <div class="col-3">
                    <div class="form-group">
						<input type="hidden" class="form-control" name="id_client" value="<?php echo $row['id_client']?>">
                        <label class="control-label">Prénom et nom </label>
						<div>
							<p class="text-gray-100 p-3 bg-dark m-0"><?php echo $row['prenom_nom']?></p>
						</div>
					</div>
                </div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label">Genre </label>
						<div>
							<p class="text-gray-100 p-3 bg-dark m-0"><?php echo $row['genre']?></p>
						</div>
					</div>	
                </div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label">Tel. </label>
						<div>
							<p class="text-gray-100 p-3 bg-dark m-0"><?php echo $row['telephone']?></p>
						</div>
					</div>	
                </div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label">Adresse </label>
						<div>
							<p class="text-gray-100 p-3 bg-dark m-0"><?php echo $row['adresse']?></p>
						</div>
					</div>	
                </div> 
			</div> 
		</div> 
	</div> 
	<div class="card shadow mb-4">
		<div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Saisir les mesures</h6>
		</div>
        <div class="card-body">									
		    <form action="insert_client.php" method="post" class="form-horizontal style-form">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Client</label>
                            <input disabled type="text" class="form-control" name="id_client" value="<?php echo $row['id_client']?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Genre</label>
                            <input disabled type="text" class="form-control" name="genre" value="<?php echo $row['genre']?>">
                    </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input disabled type="text" class="form-control" name="telephone" value="<?php echo $row['telephone']?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                                <div class="form-group">
                                    <label>longueur</label>
                                    <input type="text" class="form-control" name="longueur">
                                </div>
                                <div class="form-group">
                                    <label>Tour de bras</label>
                                    <input type="text" class="form-control" name="tourbas">
                                </div>
                                <div class="form-froup">
                                    <label>Bas</label>
                                    <input type="text" class="form-control" name="bas">
                                </div>
                                <div class="form-froup">
                                    <label>Robe</label>
                                    <input type="text" class="form-control" name="longueurrobe">
                                </div>
                    </div>	
                    <div class="col-2">
                            <div class="form-group">
                                <label>Grand-Boubou</label>
                                <input type="text" class="form-control" name="longueurgrandboubou">
                            </div>
                            <div class="form-froup">
                                <label>Poignet</label>
                                <input type="text" class="form-control" name="poignet">
                            </div>
                            <div class="form-froup">
                                <label>Poitrine</label>
                                <input type="text" class="form-control" name="poitrine">
                            </div>
                            <div class="form-froup">
                                <label>Tour-Manche</label>
                                <input type="text" class="form-control" name="tourmanche">
                            </div>
                    </div>
                    <div class="col-2">
                            <div class="form-froup">
                                <label>Epaule</label>
                                <input type="text" class="form-control" name="epaule">
                            </div>
                            <div class="form-froup">
                                <label>Pantalon</label>
                                <input type="text" class="form-control" name="longueurpantalon">
                            </div>
                            <div class="form-froup">
                                <label>Hanche</label>
                                <input type="text" class="form-control" name="hanche">
                            </div>
                            <div class="form-froup">
                                <label>Ceinture</label>
                                <input type="text" class="form-control" name="ceinture">
                            </div>
                    </div>	
                    <div class="col-2">
                            <div class="form-froup">
                                <label>Cou</label>
                                <input type="text" class="form-control" name="cou">
                            </div>
                            <div class="form-froup">
                                <label>Taille-Cou</label>
                                <input type="text" class="form-control" name="taillecou">
                            </div>
                            <div class="form-froup">
                                <label>Pince</label>
                                <input type="text" class="form-control" name="pince">
                            </div>
                    </div>		
                    <div class="col-2">
                            <div class="form-froup">
                                <label>Manche</label>
                                <input type="text" class="form-control" name="manche">
                            </div>
                            <div class="form-froup">
                                <label>Tour-Fesse</label>
                                <input type="text" class="form-control" name="tourfess">
                            </div>
                            <div class="form-froup">
                                <label>Blouse</label>
                                <input type="text" class="form-control" name="blouse">
                            </div>
                    </div>	
                    <div class="col-2">
                            <div class="form-froup">
                                <label>Taille</label>
                                <input type="text" class="form-control" name="taille">
                            </div>
                            <div class="form-froup">
                                <label>Cuisse</label>
                                <input type="text" class="form-control" name="cuisse">
                            </div>
                            <div class="form-froup">
                                <label>Jupe</label>
                                <input type="text" class="form-control" name="longueurjupe">
                            </div>
                    </div>
                </div>
            </form>
        </div>
		<div class="card-footer">
            <button class="btn btn-primary" type="submit" name="bt_mesure">Valider</button>
        </div>
	</div>	
</div> 
<?php } $reponse->closeCursor()?>
<?php } ?>
<?php require '../pages/footer.php'; ?> 