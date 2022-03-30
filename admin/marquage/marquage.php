<?php
session_start();
if(isset($_POST['search'])){
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $numero_facture = $_POST['numero_facture'];
    $reponse = $bdd->query("SELECT numero_facture, zen_produit.des, zen_produit.catp, zen_modele.libmod
    FROM zen_marquage, zen_produit, zen_modele
    WHERE numero_facture = $numero_facture
    AND zen_produit.codep = zen_marquage.id_article
    AND zen_produit.id_modele = zen_modele.codemod");
    $repons = $bdd->query("SELECT id_marquage, id_couture, date_couture, zen_produit.des, zen_produit.catp, zen_modele.libmod
    FROM zen_marquage, zen_produit, zen_modele
    WHERE numero_facture = $numero_facture
    AND zen_produit.codep = zen_marquage.id_article
    AND zen_produit.id_modele = zen_modele.codemod");
    $repon = $bdd->query("SELECT id_marquage, id_brodeur, date_broderie, zen_modele.libmod
    FROM zen_marquage, zen_produit, zen_modele
    WHERE numero_facture = $numero_facture
    AND zen_produit.codep = zen_marquage.id_article
    AND zen_produit.id_modele = zen_modele.codemod");
    $repo = $bdd->query("SELECT id_marquage, id_bouton, date_bouton, zen_modele.libmod
    FROM zen_marquage, zen_produit, zen_modele
    WHERE numero_facture = $numero_facture
    AND zen_produit.codep = zen_marquage.id_article
    AND zen_produit.id_modele = zen_modele.codemod");
}
require 'config.php';
?>
<?php require '../pages/headers.php';
$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc'); ?>
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
                                <select name="numero_facture" class="form-control">
                                    <option></option>
                                    <?php $sql = "SELECT DISTINCT(numero_facture) FROM zen_marquage ORDER BY numero_facture DESC";
                                    $rep = $bdd->query($sql);
                                    while($don = $rep->fetch()){ ?>
                                    <option value="<?= $don['numero_facture'] ?>"><?= $don['numero_facture'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <br>
                                <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form><br>
                    <h4><strong>CLIQUEZ SUR LES BOUTONS EN COULEUR POUR FAIRE LE DISPATCHING</strong></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nº Facture</th>
                                            <th>Modèles</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nº Facture</th>
                                            <th>Modèles</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($donnees = $reponse->fetch()): 
                                            if(!empty($donnees['libmod'])){?>
                                        <tr>
                                            <td><?= $donnees['numero_facture'];?></td>
                                            <td><?= $donnees['des'].'=>'.$donnees['libmod'].'=>'.$donnees['catp'] ?></td>
                                        </tr>
                                        <?php } endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Tailleur Simple / Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Tailleur Simple / Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($donnee = $repons->fetch()): 
                                            $datec = explode('-',$donnee['date_couture']);
                                            if(!empty($donnee['libmod'])){
                                                $nom = fnom($donnee['id_couture'])?>
                                        <tr>
                                            <td><a href="ma.php?simple=<?= $donnee['id_marquage'] ?>"><button class="btn btn-outline-primary btn-icon shadow-sm me-2 my-1"></button></a>&nbsp;&nbsp;<?= $nom ?></td>
                                            <td><?= $datec[2].'/'.$datec[1].'/'.$datec[0] ?></td>
                                        </tr>
                                        <?php } endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Brodeur / Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Brodeur / Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($donne = $repon->fetch()): 
                                            $datebr = explode('-',$donne['date_broderie']);
                                            if(!empty($donne['libmod'])){
                                                $nom = fnom($donne['id_brodeur'])?>
                                        <tr>
                                            <td><a href="ma.php?brodeur=<?= $donne['id_marquage'] ?>"><button class="btn btn-outline-danger btn-icon shadow-sm me-2 my-1"></button></a>&nbsp;&nbsp;<?= $nom ?></td>
                                            <td><?= $datebr[2].'/'.$datebr[1].'/'.$datebr[0] ?></td>
                                        </tr>
                                        <?php } endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Boutonnier / Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2">Boutonnier / Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($donn = $repo->fetch()): 
                                            $datebo = explode('-',$donn['date_bouton']);
                                            if(!empty($donn['libmod'])){
                                                $nom = fnom($donn['id_bouton'])?>
                                        <tr>
                                            <td><a href="ma.php?bouton=<?= $donn['id_marquage'] ?>"><button class="btn btn-outline-warning btn-icon shadow-sm me-2 my-1"></button></a>&nbsp;&nbsp;<?= $nom ?></td>
                                            <td><?= $datebo[2].'/'.$datebo[1].'/'.$datebo[0] ?></td>
                                        </tr>
                                        <?php } endwhile ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>

</div>
<?php require '../pages/footer.php'; ?>