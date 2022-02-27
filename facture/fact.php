<?php require '../panier/header.php' ?>
<?php
    $id_client = $_GET['id_client'];
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $reponse = $bdd->query("SELECT * FROM zen_client WHERE id_client = ".$id_client);
    $donnees = $reponse->fetch();
    $des[] = $_GET['des'];
    $qtys[] = $_GET['qty'];
    $prices[] = $_GET['price'];
    $subtots[] = $_GET['subtot'];
    $totqty = $_GET['totqty'];
    $total = $_GET['total'];
    $reponses = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE zen_mesure.id_client = ".$id_client."");
    $donnee = $reponses->fetch();
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;&nbsp;Information Facture</h1>
</div>
<div class="row">
		
	<div class="container-fluid">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Etape 4</h6>
					<div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="facture.php" method="GET" target="_BLANK">
                        <legend>Infos client</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Prénom Nom</label>
                                    <input type="text" class="form-control" name="prenom_nom" value="<?= $donnees['prenom_nom'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" class="form-control" name="telephone" value="<?= $donnees['telephone'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <legend>Infos commande</legend>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Désignation</th>
                                        <th>Prix Unitaire</th>
                                        <th>Quantité</th>
                                        <th>Prix Total</th>
                                    </thead>
                                    <tbody>
                                        <?php for($i=0; $i<$panier->count(); $i++):?>
                                        <tr>
                                            <td><input type="text" class="form-control" name="des[]" value="<?= $des[0][$i] ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="price[]" value="<?= $prices[0][$i] ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="qty[]" value="<?= $qtys[0][$i] ?>" readonly></td>
                                            <td><input type="text" class="form-control" name="subtot[]" value="<?= $subtots[0][$i] ?>" readonly></td>
                                        </tr>
                                        <?php endfor?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="2">TOTAL</th>
                                        <th><input type="text" class="form-control" name="totqty" value="<?= $totqty ?>" readonly></th>
                                        <th><input type="text" class="form-control" name="total" value="<?= $total ?>" readonly></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <legend>Infos supplémantaires</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Numéro facture</label>
                                    <input type="number" class="form-control" name="numero_facture">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Montant payé</label>
                                    <input type="number" class="form-control" name="montpaye">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Date échéance</label>
                                    <input type="date" class="form-control" name="date_echeance">
                                </div>
                            </div>
                        </div>
                        <legend>Mesures client</legend>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Hanche</label>
                                    <input type="number" class="form-control" name="hanche" value="<?= $donnee['hanche'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Poitrine</label>
                                    <input type="number" class="form-control" name="poitrine" value="<?= $donnee['poitrine'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Taille</label>
                                    <input type="number" class="form-control" name="taille" value="<?= $donnee['taille'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Cuisse</label>
                                    <input type="number" class="form-control" name="cuisse" value="<?= $donnee['cuisse'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Longueur</label>
                                    <input type="number" class="form-control" name="longeur" value="<?= $donnee['longueur'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Manche</label>
                                    <input type="number" class="form-control" name="manche" value="<?= $donnee['manche'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pantalon</label>
                                    <input type="number" class="form-control" name="longueurpantalon" value="<?= $donnee['longueurpantalon'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tour Bras</label>
                                    <input type="number" class="form-control" name="tourbras" value="<?= $donnee['tourbras'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Robe</label>
                                    <input type="number" class="form-control" name="longueurrobe" value="<?= $donnee['longueurrobe'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Poignet</label>
                                    <input type="number" class="form-control" name="poignet" value="<?= $donnee['poignet'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tour Fesse</label>
                                    <input type="number" class="form-control" name="tourfesse" value="<?= $donnee['tourfesse'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Ceinture</label>
                                    <input type="number" class="form-control" name="ceinture" value="<?= $donnee['ceinture'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Blouse</label>
                                    <input type="number" class="form-control" name="blouse" value="<?= $donnee['blouse'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jupe</label>
                                    <input type="number" class="form-control" name="longueurjupe" value="<?= $donnee['longueurjupe'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pince</label>
                                    <input type="number" class="form-control" name="pince" value="<?= $donnee['pince'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Epaule</label>
                                    <input type="number" class="form-control" name="epaule" value="<?= $donnee['epaule'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Cou</label>
                                    <input type="number" class="form-control" name="cou" value="<?= $donnee['cou'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Bas</label>
                                    <input type="number" class="form-control" name="bas" value="<?= $donnee['bas'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Grand Boubou</label>
                                    <input type="number" class="form-control" name="longueurgrandboubou" value="<?= $donnee['longueurgrandboubou'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Taille cou</label>
                                    <input type="number" class="form-control" name="taillecou" value="<?= $donnee['taillecou'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tour Manche</label>
                                    <input type="number" class="form-control" name="tourmanche" value="<?= $donnee['tourmanche'] ?>" readonly>
                                </div>
                            </div>
                        </div> 
                    <input type="hidden" name="id_client" value="<?= $id_client ?>"> 
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Valider</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php require '../panier/footer.php' ?>