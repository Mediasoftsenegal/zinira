<?php require 'header.php'; ?>
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tailleurs</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouveau Tailleur</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Prénom Nom</th>
                                    <th>Type Tailleur</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Prénom Nom</th>
                                    <th>Type Tailleur</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_tailleur");
                                    while($donnees = $reponse->fetch()){?>
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo $donnees['prenom_nom'];?></td>
                                        <td><?php echo $donnees['type_tailleur'];?></td>
                                        <!--td align="center">
                                            <a href="modifu.php?mo=<?php //echo $donnees['id_user'];?>"><i class="fas fa-edit"></i></a>
                                        </td-->
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
                    <h5 class="modal-title">Formulaire d'une nouveau tailleur</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Prénom Nom :</label>
                        <div class="col-sm-6">
                            <input type="text" name="prenom_nom" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Type tailleur :</label>
                        <div class="col-sm-6">
                            <select name="type_tailleur" class="form-control">
                                <option>Choisir Profil</option>
                                <option value="Tailleur simple">Tailleur simple</option>
                                <option value="Brodeur">Brodeur</option>
                                <option value="Boutonnier">Boutonnier</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_tailleur" >Enregistrer</button>
            </div>
                
            </div>
        </div>
                        
    </div>
</form>
<?php require 'footer.php'; ?>