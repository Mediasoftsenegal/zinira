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
                            $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
                            $donnees = $reponse->fetch()
                            ?>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Client</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['prenom_nom']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Date Commande</label><br>
                                    <input type="date" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['date_facture']?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Téléphone</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['telephone']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Date Livraison</label><br>
                                    <input type="date" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['date_echeance']?>" readonly>
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
                                        <th colspan="2">Total</th>
                                        <th><?php for($a=0; $a<$is; $a++): $s += $qty[$a]; endfor; echo $s; ?></th>
                                        <th><?= $donnees['montant'] ?></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Avance</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['montpaye']?>" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Reste</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['montant'] - $donnees['montpaye']?>" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Soldée le</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnees['date_facture']?>" readonly>
                                </div>
                            </div>
                        </div>
                        <?php $repons = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE zen_mesure.id_client = ".$donnees['id_client']."");
                            $donnee = $repons->fetch() ?>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Hanche</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['hanche']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jupe</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['longueurjupe']?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Longueur</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['longueur']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Cou</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['cou']?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Blouse</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['blouse']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Taille</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['taille']?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Epaule</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['epaule']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pince</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['pince']?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Poitrine</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['poitrine']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pantalon</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['longueurpantalon']?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Manche</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['manche']?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Ceinture</label><br>
                                    <input type="text" class="form-control bg-gradient-secondary text-gray-100" value="<?php echo $donnee['ceinture']?>" readonly>
                                </div>
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