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
                  <h4>Formulaire de marquage</h4>
                </div>
                <div class="card-body">
                  <form action="update_marq.php" method="POST">
                    <?php if ($_GET['simple']){
                      $id = $_GET['simple'];
                      $reponse = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Tailleur simple'"); ?>
                    <div class="form-group">
                      <label>Choisir Tailleur</label>
                      <select name="prenom_nom" class="form-control">
                        <option></option>
                        <?php while ($donnees = $reponse->fetch()) : ?>
                        <option value="<?= $donnees['id_tailleur'] ?>"><?= $donnees['prenom_nom'] ?></option>
                        <?php endwhile ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Date Couture</label>
                      <input type="date" name="date_couture" class="form-control">
                      <input type="hidden" name="id_marquage" value="<?= $id ?>">
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success" name="bt_ts">Envoyer</button>
                    </div>
                  </form>
                </div>
                    <?php } elseif ($_GET['brodeur']){
                      $id = $_GET['brodeur'];
                      $reponse = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Brodeur'"); ?>
                      <label>Choisir Tailleur</label>
                      <select name="prenom_nom" class="form-control">
                        <option></option>
                        <?php while ($donnees = $reponse->fetch()) : ?>
                        <option value="<?= $donnees['id_tailleur'] ?>"><?= $donnees['prenom_nom'] ?></option>
                        <?php endwhile ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Date Broderie</label>
                      <input type="date" name="date_broderie" class="form-control">
                      <input type="hidden" name="id_marquage" value="<?= $id ?>">
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success" name="bt_br">Envoyer</button>
                    </div>
                  </form>
                </div>
                    <?php } else {
                      $id = $_GET['bouton'];
                      $reponse = $bdd->query("SELECT * FROM zen_tailleur WHERE type_tailleur = 'Boutonnier'"); ?>
                      <label>Choisir Tailleur</label>
                      <select name="prenom_nom" class="form-control">
                        <option></option>
                        <?php while ($donnees = $reponse->fetch()) : ?>
                        <option value="<?= $donnees['id_tailleur'] ?>"><?= $donnees['prenom_nom'] ?></option>
                        <?php endwhile ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Date Bouton</label>
                      <input type="date" name="date_bouton" class="form-control">
                      <input type="hidden" name="id_marquage" value="<?= $id ?>">
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-success" name="bt_bo">Envoyer</button>
                    </div>
                  </form>
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require '../pages/footer.php'; ?>