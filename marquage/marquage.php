<?php
if(isset($_POST['search'])){
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $numero_facture = $_POST['numero_facture'];
    $reponse = $bdd->query("SELECT * FROM zen_detail_facture INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture WHERE zen_detail_facture.etat = 0 AND zen_factures.numero_facture = '$numero_facture'");
    $donnees = $reponse->fetch();
}
?>
<?php require 'headers.php'; ?>
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Marquage</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form action="marquage.php" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <label>Numero Facture</label>
                                <input type="number" name="numero_facture" class="form-control">
                            </div>
                            <div class="col-4">
                                <br>
                                <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nº Facture</th>
                                    <th>Modèles</th>
                                    <th colspan="2">Tailleur Simple / Date</th>
                                    <th colspan="2">Brodeur / Date</th>
                                    <th colspan="2">Boutonnier / Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nº Facture</th>
                                    <th>Modèles</th>
                                    <th colspan="2">Tailleur Simple / Date</th>
                                    <th colspan="2">Brodeur / Date</th>
                                    <th colspan="2">Boutonnier / Date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    /*$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_detail_facture INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture WHERE zen_detail_facture.etat = 0");
                                    while($donnees = $reponse->fetch()){*/
                                    $article = explode(",",$donnees['article']);
                                    foreach($article as $i =>$key):
                                    $i>0;
                                    $art = explode("->",$article[$i]);
                                    if(!empty($art[1])){?>
                                    <tr>
                                        <td><?= $donnees['numero_facture'];?></td>
                                        <td><?= $article[$i] ?></td>
                                        <td><button class="btn btn-outline-primary btn-icon shadow-sm me-2 my-1" data-toggle="modal" data-target="#ModalSimple" name="Tailleur_simple"><i data-feather="feather"></i></button><?php ?></td>
                                        <td><?php ?></td>
                                        <td><button class="btn btn-outline-danger btn-icon shadow-sm me-2 my-1"  data-toggle="modal" data-target="#ModalBrodeur" name="Brodeur"><i data-feather="feather"></i></button><?php ?></td>
                                        <td><?php ?></td>
                                        <td><button class="btn btn-outline-warning btn-icon shadow-sm me-2 my-1" data-toggle="modal" data-target="#ModalBouton" name="Boutonnier"><i data-feather="feather"></i></button><?php ?></td>
                                        <td><?php ?></td>
                                    </tr>
                                <?php } endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $repons = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Tailleur simple'");
    $repon = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Brodeur'");
    $repo = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Boutonnier'");   
    $date = date('Y-m-d');
 ?>
<form class="form-horizontal style-form" action="marquage.php" method="POST" >
    <!-- Modal -->
    <div class="modal fade" id="ModalSimple" role="dialog">
        <div class="modal-dialog">
                      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Marquage Tailleur Simple</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Prénom Nom :</label>
                        <div class="col-sm-6">
                            <select name="prenom_nom" class="form-control">
                                <option>Choisir Tailleur</option>
                                <?php while($donnee = $repons->fetch()){?>
                                <option value="<?= $donnee['id_tailleur']?>"><?= $donnee['prenom_nom']?></option>
                                <?php } $repons->closeCursor(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="clo-sm-4 control-label">Date Marquage</label>
                        <input type="date" name="date_couture" class="form-control" value="<?= $date ?>">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_ts" >Enregistrer</button>
            </div> 
            </div>
        </div>                
    </div>
</form>
<form class="form-horizontal style-form" action="marquage.php" method="POST" >
    <!-- Modal -->
    <div class="modal fade" id="ModalBrodeur" role="dialog">
        <div class="modal-dialog">
                      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Marquage Tailleur Brodeur</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Prénom Nom :</label>
                        <div class="col-sm-6">
                            <select name="prenom_nom" class="form-control">
                                <option>Choisir Brodeur</option>
                                <?php while($donne = $repon->fetch()){?>
                                <option value="<?= $donne['id_tailleur']?>"><?= $donne['prenom_nom']?></option>
                                <?php } $repons->closeCursor(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="clo-sm-4 control-label">Date Marquage</label>
                        <input type="date" name="date_broderie" class="form-control" value="<?= $date ?>">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_br" >Enregistrer</button>
            </div> 
            </div>
        </div>                
    </div>
</form>
<form class="form-horizontal style-form" action="marquage.php" method="POST" >
    <!-- Modal -->
    <div class="modal fade" id="ModalBouton" role="dialog">
        <div class="modal-dialog">
                      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Marquage Tailleur Boutonnier</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Prénom Nom :</label>
                        <div class="col-sm-6">
                            <select name="prenom_nom" class="form-control">
                                <option>Choisir Boutonnier</option>
                                <?php while($donn = $repo->fetch()){?>
                                <option value="<?= $donn['id_tailleur']?>"><?= $donn['prenom_nom']?></option>
                                <?php } $repons->closeCursor(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="clo-sm-4 control-label">Date Marquage</label>
                        <input type="date" name="date_bouton" class="form-control" value="<?= $date ?>">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_bo" >Enregistrer</button>
            </div> 
            </div>
        </div>                
    </div>
</form>
        <?php require 'footer.php'; ?>