<?php require '../pages/header.php' ?>
<?php
    
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;&nbsp;Modification Facture</h1>
</div>
<div class="row">
		
	<div class="container-fluid">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                        <legend>Information de la facture</legend>
                        <div class="row">
                            <?php 
                            $id_facture = $_GET['det']; 
                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                            $reponse = $bdd->query("SELECT * FROM zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client WHERE zen_detail_facture.id_client = ".$id_facture);
                            $donnees = $reponse->fetch()
                            ?>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Client</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['prenom_nom']?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Téléphone</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['telephone']?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php $des = explode(',',$donnees['article']); ?>
                        <?php $pu = explode(',',$donnees['prix_unitaire']); ?>
                        <?php $qty = explode(',',$donnees['nombre']); ?>
                        <?php $is = count($pu)?>
                        <div class="row">
                            <div class="col-12">
                                <label>Commande</label>
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Désignation</th>
                                        <th>Prix Unitaire</th>
                                        <th>Quantité</th>
                                        <th>Prix Total</th>
                                    </thead>
                                    <tbody>
                                    <?php for($i=0; $i<$is; $i++): ?>
                                        <tr>
                                            <td><?= $des[$i] ?></td>
                                            <td><?= $pu[$i] ?></td>
                                            <td><?= $qty[$i] ?></td>
                                            <td><?= $pu[$i] * $qty[$i] ?></td>
                                        </tr>
                                    <?php endfor;?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="3">Total</th>
                                        <th><?= $donnees['montant'] ?></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary"><a href="facturation.php" style="color: white;">Retour</a></button>
                </div>
            </div>
            <div class="card-footer">
                <?php $de = explode("->",$des[0]);
                echo $de[0];echo $de[1];echo $de[2]; ?>
            </div>
        </div>
    </div>
</div>

<?php require '../pages/footer.php' ?>