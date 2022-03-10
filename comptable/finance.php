<?php 
    if(isset($_POST['search'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $dated = $_POST['date_debut'];
        $datef = $_POST['date_fin'];
        $reponse = $bdd->query("SELECT * FROM zen_factures WHERE date_facture BETWEEN '$dated' AND '$datef'");
        $repons = $bdd->query("SELECT SUM(montant_facture) AS facture FROM zen_factures WHERE date_facture BETWEEN '$dated' AND '$datef'");
        $donnee = $repons->fetch();
        $repon = $bdd->query("SELECT SUM(montpaye) AS enc FROM zen_factures WHERE date_facture BETWEEN '$dated' AND '$datef'");
        $donne = $repon->fetch();
    }
?>
<?php require 'header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Suivi Financier</h1>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form action="finance.php" method="POST">
                        <div class="row">
                            <div class="col-4">
                                <label>Date Début</label>
                                <input type="date" name="date_debut" class="form-control">
                            </div>
                            <div class="col-4">
                                <label>Date Fin</label>
                                <input type="date" name="date_fin" class="form-control">
                            </div>
                            <div class="col-4">
                                <br>
                                <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <th>Numéro Facture</th>
                                    <th>Montant Facture</th>
                                    <th>Encaissement</th>
                                    <th>Reliquat</th>
                                </thead>
                                <tfoot>
                                    <th>Total</th>
                                    <th><?= number_format($donnee['facture'],0,'',' ') ?> F CFA</th>
                                    <th><?= number_format($donne['enc'],0,'',' ') ?> F CFA</th>
                                    <th><?= number_format($donnee['facture'] - $donne['enc'],0,'',' ') ?> F CFA</th>
                                </tfoot>
                                <tbody>
                                    <?php 
                                        while($donnees = $reponse->fetch()){ ?>
                                    <tr>
                                        <td><?= $donnees['numero_facture']?></td>
                                        <td><?= number_format($donnees['montant_facture'],0,'',' ')?> F CFA</td>
                                        <td><?= number_format($donnees['montpaye'],0,'',' ')?> F CFA</td>
                                        <td><?= number_format($donnees['montant_facture'] - $donnees['montpaye'],0,'',' ')?> F CFA</td>
                                    </tr>
                                    <?php } $reponse->closeCursor(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<?php require 'footer.php'; ?>