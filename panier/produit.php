<?php require 'header.php';
function modele($id){
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $sql = "SELECT * FROM zen_modele WHERE codemod = ".$id;
    $reponse = $bdd->prepare($sql);
    $reponse->execute();
    $donnees = $reponse->fetch();
    return $donnees['libmod'];
}  ?>
<?php 
    $id_client = $_GET['po'];
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $reponse = $bdd->query("SELECT * FROM zen_client WHERE id_client = ".$id_client);
    while($row = $reponse->fetch()){
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
	
    <div class="d-sm-flex align-items-center justify-content-between mb-8">
	
        <h1 class="h3 mb-0 text-gray-800">Panier->Choisir produit(s)</h1><br><a href="panier.php?pa=<?php echo $id_client;?>"> <i class="fas fa-cart-plus"></i> <h5>Consulter le panier</h5><h6><?= $panier->count(); ?> article(s) ajouté(s)</h6></a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
			
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
			
                <div class="card-header py-3">Etape 2 <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                </div>
                <div class="card-body">
                    <div class="card bg-info text-while shadow">
                    Nom du client : <?php echo $row['prenom_nom']?>
                    &nbsp;&nbsp;&nbsp;Téléphone & Adresse : <div class="text-while-50 small"><?php echo $row['telephone'].'-'.$row['adresse']?>
                    <h3><?php echo "Numéro facture : ".$_SESSION['num_fact']; ?></h3></div>
                    <?php } $reponse->closeCursor() ?></div>
					<div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
									<th>Désignation</th>
                                    <th>Prix unitaire</th>                                               
                                    <th>Ajouter au Panier</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
									<th>Désignation</th>
                                    <th>Prix unitaire</th>
                                    <th>Ajouter au Panier</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $products = $DB->query('SELECT * FROM zen_produit'); ?>
                            <?php foreach ($products as $product): 
                                $libmod = modele($product->id_modele)?>
                                <tr>
                                    <td style="text-transform: uppercase" ><?= $product->des.'->'.$libmod.'->'.$product->catp; ?></td>
                                    <td ><?= number_format($product->pu,0,',',' ');?>F CFA</td>
                                    <td><a class="add" href="addpanier.php?id=<?php echo $product->codep;?>&idc=<?php echo $id_client;?>"><i class="fas fa-shopping-basket"></i></a></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
					</div>	
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
            <form class="form-horizontal style-form" action="insert_article.php" method="POST" >
                <!-- Modal -->
                <div class="modal fade" id="Modals" role="dialog">
                    <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Formulaire d'un nouvel article</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Désignation</label>
                                    <div class="col-sm-6">
                                        <input type="text" style="text-transform: uppercase" name="des" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Prix unitaire :</label>
                                    <div class="col-sm-6">
                                        <input type="number" style="text-transform: uppercase" name="pu" class="form-control">
                                    </div>
                                </div>
                               <div class="form-group">
									<label  class="col-sm-4 control-label">Catégorie:</label>
										<div class="col-sm-6">
										<select name="catp" id="catp" class="form-control"> 
										  <option value="">Choisir une catégorie</option>
										  <option value="PAP">PAP</option>
										  <option value="TISSU">TISSU</option>
										</select>
										 </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Modèle :</label>
                                    <div class="col-sm-6">
                                        <input type="text" style="text-transform: uppercase" name="modele" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
									<label  class="col-sm-4 control-label for="cars">Genre:</label>
										<div class="col-sm-6">
										<select name="genre" id="genre" class="form-control">
										 <option value="">Choisir un genre</option>
										  <option value="volvo">Homme</option>
										  <option value="saab">Femme</option>
										</select>
										</div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Couleur :</label>
                                    <div class="col-sm-6">
                                        <input type="text" style="text-transform: uppercase" name="couleur" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="bt_article" >Enregistrer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
  <?php require 'footer.php'; ?>