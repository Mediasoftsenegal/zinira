<?php require '../pages/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Etat de Facturation</h1>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-dark btn-sm" style="float: right;"><a href="../panier/client_panier.php" style="color: white;">+ Nouvelle Facture</a></button>
                </div>
                <div class="card-body">
					<div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Date Facture</th>
                                    <th>N Facture</th>
                                    <th>Montant Facture</th>
                                    <th>Acompte</th>
                                    <th>Reliquat</th>
                                    <th>Date Livraison</th>
									<th>Etat Facture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Client</th>
                                    <th>Date Facture</th>
                                    <th>N Facture</th>
                                    <th>Montant Facture</th>
                                    <th>Acompte</th>
                                    <th>Reliquat</th>
                                    <th>Date Livraison</th>
									<th>Etat Facture</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_factures INNER JOIN zen_client ON zen_factures.id_client = zen_client.id_client ORDER BY zen_factures.date_facture DESC");
                                    while($donnees = $reponse->fetch()){
                                        if($donnees['etat_facture'] == 0){
                                            $etat = "<p class='btn btn-danger'>Non Soldée</p>";
                                        }else{
                                            $etat = "<p class='btn btn-success'>Soldée</p>";
                                        }
                                        $datfact=explode('-',$donnees['date_facture']);
                                        $datlivr=explode('-',$donnees['date_echeance']);?>
                                <tr>
                                    <td><?php echo $donnees['prenom_nom'].'->'.$donnees['telephone']?></td>
                                    <td><?php echo $datfact[2].'/'.$datfact[1].'/'.$datfact[0]?></td>
                                    <td><?php echo $donnees['numero_facture']?></td>
                                    <td><?php echo (number_format($donnees['montant_facture'],0,'',' '));?>F CFA</td>
                                    <td><?php echo (number_format($donnees['montpaye'],0,'',' '));?>F CFA</td>
                                    <td><?php echo (number_format(($donnees['montant_facture']-$donnees['montpaye']),0,'',' '));?>F CFA</td> 
                                    <td><?php echo $datlivr[2].'/'.$datlivr[1].'/'.$datlivr[0]?></td>                                  
                                    <td><?php echo $etat;?></td>
                                    <td align="center">
                                        <a href="details.php?det=<?php echo $donnees['id_facture'];?>"><i class="fas fa-edit"></i></a>
                                        <a href="supp.php?mo=<?php echo $donnees['id_facture'];?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                $reponse->closeCursor();?>
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
  <?php require '../pages/footer.php'; ?>