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
                    <form action="fonction.php" method="POST">
                        <legend>Information de la facture</legend>
                        <div class="row">
                            <?php 
                            $id_facture = $_GET['mo']; 
                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                            $reponse = $bdd->query("SELECT * FROM zen_factures INNER JOIN zen_client ON zen_factures.id_client = zen_client.id_client WHERE zen_factures.id_facture = ".$id_facture);
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
                                    <input type="text" class="form-control" name="telephone" value="<?php echo $donnees['telephone']?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Montant Facture</label>
                                    <input type="number" name="montant_facture" class="form-control" value="<?php echo $donnees['montant_facture']?>" readonly id="montfac">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Montant Payée</label>
                                    <input type="number" name="montpaye" class="form-control" value="<?php echo $donnees['montpaye']?>" id="montpaye">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Restant</label>
                                    <input type="number" name="reste" class="form-control" value="<?php echo $donnees['montant_facture'] - $donnees['montpaye']?>" readonly id="reste">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_facture" value="<?= $id_facture ?>">
                        <input type="hidden" name="etat" value="<?= $donnees['etat_facture'] ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
                        <button class="btn btn-danger"><a href="etat.php" style="color: white;">Annuler</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var montant = document.getElementById("montfac");
    var paye = document.getElementById("montpaye");
    var reste = document.getElementById("reste");

    paye.addEventListener("change", evt=>{
        reste.value = montant.value - paye.value;
    })
    
</script>

<?php require '../pages/footer.php' ?>