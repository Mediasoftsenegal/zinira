<?php require '../pages/header.php'; ?>
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tarifs</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouveau tarif</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Modèle</th>
                                    <th>Tarif Simple</th>
                                    <th>Tarif Brodeur</th>
                                    <th>Tarif Bouton</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Modèle</th>
                                    <th>Tarif Simple</th>
                                    <th>Tarif Brodeur</th>
                                    <th>Tarif Bouton</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_tarification INNER JOIN zen_modele ON zen_tarification.id_modele = zen_modele.codemod");
                                    while($donnees = $reponse->fetch()){?>
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo $donnees['libmod'];?></td>
                                        <td><?php echo number_format($donnees['tarif_simple'],0,""," ");?></td>
                                        <td><?php echo number_format($donnees['tarif_brodeur'],0,""," ");?></td>
                                        <td><?php echo number_format($donnees['tarif_bouton'],0,""," ");?></td>
                                        <td align="center">
                                            <!--a href="modifu.php?mo=<?php //echo $donnees['id_user'];?>"><i class="fas fa-edit"></i></a-->
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
<!-- End of Main Content -->
<form class="form-horizontal style-form" action="insert.php" method="POST" >
    <!-- Modal -->
    <div class="modal fade" id="Modals" role="dialog">
        <div class="modal-dialog">
                      
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Formulaire d'une nouveau tarif</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Modèle :</label>
                        <div class="col-sm-6">
                            <select name="codemod" class="form-control">
                                <option>Choisir Modèle</option>
                                <?php
                                $reponse = $bdd->query("SELECT * FROM zen_modele");
                                while($donnees = $reponse->fetch()){?>
                                <option value="<?php echo $donnees['codemod']; ?>"><?php echo $donnees['libmod']; ?></option>
                                <?php } $reponse->closeCursor();?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tarif Simple :</label>
                        <div class="col-sm-6">
                            <input type="text" name="tarif_simple" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tarif Bordeur :</label>
                        <div class="col-sm-6">
                            <input type="text" name="tarif_brodeur" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tarif Bouton :</label>
                        <div class="col-sm-6">
                            <input type="text" name="tarif_bouton" class="form-control">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_tarif" >Enregistrer</button>
            </div>
                
            </div>
        </div>
                        
    </div>
</form>
        <?php require '../pages/footer.php'; ?>