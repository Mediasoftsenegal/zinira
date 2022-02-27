<?php require '../pages/header.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!--h1 class="h3 mb-0 text-gray-800">Mesures</h1-->
                        <!--a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
                    </div>

                    <!-- Content Row -->
                    <div>
                        <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
                            if(isset($_GET['mo'])){
                                //var_dump($_GET);
                                $id_mesure = $_GET['mo'];
                                $reponse = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE id_mesure = ".$id_mesure."");
                                $exe = $reponse->fetch();
                        ?>
                        
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <h3>Modification mesures de <?php echo $exe['prenom_nom']?></h3>
                            </div>
                        <fieldset>
                            <form action="insert_client.php" method="POST">
                                <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-sm-2">
                                        <label>longueur</label>
                                        <input type="number" name="longueur" class="form-control" value="<?php echo $exe['longueur']?>">

                                        <label>Tour-Bras</label>
                                        <input type="number" name="taillemanche" class="form-control" value="<?php echo $exe['tourbras']?>">

                                        <label>Bas</label>
                                        <input type="number" name="bas" class="form-control" value="<?php echo $exe['bas']?>">

                                        <label>Robe</label>
                                        <input type="number" name="longueurrobe" class="form-control" value="<?php echo $exe['longueurrobe']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Grand-Boubou</label>
                                        <input type="number" name="longueurgrandboubou" class="form-control" value="<?php echo $exe['longueurgrandboubou']?>">

                                        <label>Poignet</label>
                                        <input type="number" name="poignet" class="form-control" value="<?php echo $exe['poignet']?>">

                                        <label>Poitrine</label>
                                        <input type="number" name="poitrine" class="form-control" value="<?php echo $exe['poitrine']?>">

                                        <label>Tour-Manche</label>
                                        <input type="number" name="tourmanche" class="form-control" value="<?php echo $exe['tourmanche']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Epaule</label>
                                        <input type="number" name="epaule" class="form-control" value="<?php echo $exe['epaule']?>">

                                        <label>Pantalon</label>
                                        <input type="number" name="longueurpantalon" class="form-control" value="<?php echo $exe['longueurpantalon']?>">

                                        <label>Hanche</label>
                                        <input type="number" name="hanche" class="form-control" value="<?php echo $exe['hanche']?>">

                                        <label>Ceinture</label>
                                        <input type="number" name="ceinture" class="form-control" value="<?php echo $exe['ceinture']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Cou</label>
                                        <input type="number" name="cou" class="form-control" value="<?php echo $exe['cou']?>">

                                        <label>Taille-Cou</label>
                                        <input type="number" name="taillecou" class="form-control" value="<?php echo $exe['taillecou']?>">

                                        <label>Pince</label>
                                        <input type="number" name="pince" class="form-control" value="<?php echo $exe['pince']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Manche</label>
                                        <input type="number" name="manche" class="form-control" value="<?php echo $exe['manche']?>">

                                        <label>Tour-Fesse</label>
                                        <input type="number" name="tourfess" class="form-control" value="<?php echo $exe['tourfess']?>">

                                        <label>Blouse</label>
                                        <input type="number" name="blouse" class="form-control" value="<?php echo $exe['blouse']?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Taille</label>
                                        <input type="number" name="taille" class="form-control" value="<?php echo $exe['taille']?>">

                                        <label>Cuisse</label>
                                        <input type="number" name="cuisse" class="form-control" value="<?php echo $exe['cuisse']?>">

                                        <label>Jupe</label>
                                        <input type="number" name="longueurjupe" class="form-control" value="<?php echo $exe['longueurjupe']?>">
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <footer class="card-footer">
                                <input name="id_mesure" type="hidden" value="<?php echo $exe['id_mesure']; ?>">
                                <button class="btn btn-success" name="bt_modif_mesure" type="submit">Valider</button>
                                <button class="btn btn-danger" type="reset"><a href="mesures.php" style="color: white;">Annuler</a></button>
                                </footer>
                            </form>
                        </fieldset>
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php require '../pages/footer.php'; ?> 