<?php require '../pages/header.php' ?>
<?php
    
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;&nbsp;Ajout Acompte</h1>
</div>
<div class="row">
		
	<div class="container-fluid">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <form action="fonction.php" method="POST">
                        <legend>Information de la facture</legend>
                        <div class="row">
                            <?php 
                            $num_fact = $_GET['ac']; 
                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                            //Cumul encaissement
                            $req = $bdd->query("SELECT SUM(zen_factures.montpaye) AS total FROM zen_factures WHERE zen_factures.numero_facture = ".$num_fact);
                            $don = $req->fetch();
                            $reponse = $bdd->query("SELECT * FROM zen_factures INNER JOIN zen_client ON zen_factures.id_client = zen_client.id_client WHERE zen_factures.numero_facture = ".$num_fact);
                            $donnees = $reponse->fetch()
                            ?>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <input type="text" class="form-control" name="prenom_nom" value="<?php echo $donnees['prenom_nom']?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" name="telephone" value="<?php echo $donnees['telephone']?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Montant Facture</label>
                                    <input type="text" name="montant_facture" class="form-control" value="<?php echo number_format($donnees['montant_facture'],0,'',' ')?>" readonly id="montfac">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Encaissements</label>
                                    <input type="text" class="form-control" value="<?php echo number_format($don['total'],0,'',' ')?>" readonly id="montfac">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Restant</label>
                                    <input type="text" name="reste" class="form-control" value="<?php echo number_format($donnees['montant_facture'] - $donnees['montpaye'],0,'',' ')?>" readonly id="reste">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Date Acompte</label>
                                    <input type="date" name="date_facture" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Montant à Payer</label>
                                    <input type="number" name="montpaye" class="form-control"  id="montpaye">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_client" value="<?= $donnees['id_client'] ?>">
                        <input type="hidden" name="numero_facture" value="<?= $num_fact ?>">
                        <input type="hidden" name="date_echeance" value="<?= $donnees['date_echeance'] ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                        <button class="btn btn-danger"><a href="acompte.php" style="color: white;">Annuler</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../pages/footer.php' ?>