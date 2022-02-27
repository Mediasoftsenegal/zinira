<?php require 'header.php'; ?>
<?php 
    
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles</h1><br><a href="panier.php"><i class="fas fa-cart-plus"></i><sup><?= $panier->count(); ?></sup></a>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
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
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouvel Article</button>
                </div>
                <div class="card-body">
					<div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
									<th>Désignation</th>
                                    <th>Prix unitaire</th>                                               
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
									<th>Désignation</th>
                                    <th>Prix unitaire</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $products = $DB->query('SELECT * FROM zen_produit'); ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product->des; ?></td>
                                    <td><?= number_format($product->pu,0,',',' ');?>F CFA</td>
                                    <td><a class="add" href="addpanier.php?id=<?php echo $product->codep;?>"><i class="fas fa-shopping-basket"></i></a></td>
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