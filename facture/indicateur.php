<?php require '../pages/header.php'; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Indicateur</h1>
        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
					<div class="table-responsive">
                        <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N<sup>o</sup> Facture</th>
                                    <th>Date Livraison</th>
									<th>Nombre de jour(s) restant(s)</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N<sup>o</sup> Facture</th>
                                    <th>Date Livraison</th>
									<th>Nombre de jour(s) restant(s)</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_factures INNER JOIN zen_client ON zen_factures.id_client = zen_client.id_client WHERE etat_facture = 0 ORDER BY id_facture DESC");
                                    while($donnees = $reponse->fetch()){
                                        $date1 = new DateTime(date('Y-m-d'));
                                        $date2 = new DateTime($donnees['date_echeance']);
                                        $intvl = $date1->diff($date2);
                                        if($intvl->days > 10){
                                            $jauge = "success";
                                        }elseif($intvl->days > 5 and $intvl->days < 10){
                                            $jauge = "warning";
                                        }else{
                                            $jauge = "danger";
                                        }
                                        $datfact=explode('-',$donnees['date_facture']);
                                        $datlivr=explode('-',$donnees['date_echeance']);
                                        $p = round(($intvl->days/15)*100);?>
                                <tr>
                                    <td><?php echo $donnees['numero_facture']?></td>
                                    <td><?php echo $datlivr[2].'/'.$datlivr[1].'/'.$datlivr[0]?></td>                                 
                                    <td><h4 class="small font-weight-bold"><?= $intvl->days." jour(s)" ?><span class="float-right"><?= $p ?>%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-<?= $jauge ?>" role="progressbar" style="width: <?= $p ?>%"
                                            aria-valuenow="<?= $intvl->days?>" aria-valuemin="0" aria-valuemax="15"></div>
                                    </div>
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