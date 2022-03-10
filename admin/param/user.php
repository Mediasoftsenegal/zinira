<?php require '../pages/header.php'; ?>
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Utilisateurs</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#Modals" style="float: right;">+ Nouvel Utilisateur</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Login</th>
                                    <th>Mot de passe</th>
                                    <th>Profil</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Login</th>
                                    <th>Mot de passe</th>
                                    <th>Profil</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                                    $reponse = $bdd->query("SELECT * FROM zen_user INNER JOIN zen_profil ON zen_user.id_profil = zen_profil.id_profil WHERE zen_user.etat = 1");
                                    while($donnees = $reponse->fetch()){?>
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo $donnees['login'];?></td>
                                        <td><?php echo $donnees['password'];?></td>
                                        <td><?php echo $donnees['nomprofil'];?></td>
                                        <td align="center">
                                            <a href="modifu.php?mo=<?php echo $donnees['id_user'];?>"><i class="fas fa-edit"></i></a>
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
                    <h5 class="modal-title">Formulaire d'une nouvel utilisateur</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Login :</label>
                        <div class="col-sm-6">
                            <input type="text" name="login" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Mot de passe :</label>
                        <div class="col-sm-6">
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Profil :</label>
                        <div class="col-sm-6">
                            <select name="nomprofil" class="form-control">
                                <option>Choisir Profil</option>
                                <?php
                                $reponse = $bdd->query("SELECT * FROM zen_profil WHERE etat = 1");
                                while($donnees = $reponse->fetch()){?>
                                <option value="<?php echo $donnees['id_profil']; ?>"><?php echo $donnees['nomprofil']; ?></option>
                                <?php } $reponse->closeCursor();?>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" name="bt_user" >Enregistrer</button>
            </div>
                
            </div>
        </div>
                        
    </div>
</form>
<?php require '../pages/footer.php'; ?>