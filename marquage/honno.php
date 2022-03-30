<?php require 'header.php';?>
<?php require 'config.php';?>
<?php $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');?>
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Honoraire</h1>
    </div>

    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Honoraire Tailleur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Honoraire Périodique</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <h3>Honoraire Tailleur</h3>
                            <form action="honno.php" method="POST">
                                <div class="row">
                                    <div class="col-4">
                                        <label>Nom Tailleur</label>
                                        <select name="prenom_nom" class="form-control">
                                            <option></option>
                                            <?php $a = $bdd->query("SELECT * FROM zen_tailleur");
                                            while($row = $a->fetch()){ ?>
                                            <option value="<?= $row['id_tailleur'] ?>"><?= $row['prenom_nom'].'->'.$row['type_tailleur'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label>Date début</label>
                                        <input type="date" name="dated" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <label>Date fin</label>
                                        <input type="date" name="datef" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" name="search" class="btn btn-primary">Rechercher</button>
                                    </div>
                                </div>
                            </form>
                            <?php if(isset($_POST['search'])){
                                $prenom_nom = $_POST['prenom_nom'];
                                $dd = $_POST['dated'];
                                $df = $_POST['datef'];
                                $sql = "SELECT * FROM zen_tailleur WHERE id_tailleur = '$prenom_nom'";
                                $reponse = $bdd->query($sql);
                                $donnees = $reponse->fetch(); ?><br><hr><br>
                                <h3>Tarif marquage <?= $donnees['prenom_nom'] ?></h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <th>Date Marquage</th>
                                            <th>Tarif</th>
                                        </thead>
                                        <tbody>
                                <?php
                                switch ($donnees['type_tailleur']) {
                                    case 'Tailleur simple':
                                        $id = 'id_couture';
                                        $date = 'date_couture';
                                        $tarif = 'tarif_simple';
                                        break;

                                    case 'Brodeur':
                                        $id = 'id_brodeur';
                                        $date = 'date_broderie';
                                        $tarif = 'tarif_brodeur';
                                        break;
                                    
                                    case 'Boutonnier':
                                        $id = 'id_bouton';
                                        $date = 'date_bouton';
                                        $tarif = 'tarif_bouton';
                                        break;
                                }
                                    $sq = "SELECT zen_marquage.".$date.", zen_modele.libmod, zen_tarification.".$tarif.", zen_tailleur.prenom_nom, zen_tailleur.type_tailleur \n"
                                    . "FROM zen_marquage, zen_produit, zen_modele, zen_tarification, zen_tailleur\n"
                                    . "WHERE zen_marquage.id_article = zen_produit.codep \n"
                                    . "AND zen_produit.id_modele = zen_modele.codemod\n"
                                    . "AND zen_modele.codemod = zen_tarification.id_modele\n"
                                    . "AND zen_marquage.".$id." = zen_tailleur.id_tailleur\n"
                                    . "AND zen_tailleur.id_tailleur = \"$prenom_nom\"\n"
                                    . "AND zen_marquage.".$date." BETWEEN \"$dd\" AND \"$df\"\n"
                                    . "AND zen_marquage.".$date." IS NOT NULL";
                                    $r = $bdd->query($sq);
                                    while ($d = $r->fetch()) : 
                                    switch ($d['type_tailleur']) {
                                        case 'Tailleur simple':
                                            $total += $d['tarif_simple'];
                                            $date = explode('-',$d['date_couture']);
                                            $tarifs = $d['tarif_simple'];
                                            break;

                                        case 'Brodeur':
                                            $total += $d['tarif_brodeur'];
                                            $date = explode('-',$d['date_broderie']);
                                            $tarifs = $d['tarif_brodeur'];
                                            break;
                                        
                                        case 'Boutonnier':
                                            $total += $d['tarif_bouton'];
                                            $date = explode('-',$d['date_bouton']);
                                            $tarifs = $d['tarif_bouton'];
                                            break;
                                    }  
                             ?>
                                        <tr>
                                            <td><?= $date[2].'/'.$date[1].'/'.$date[0] ?></td>
                                            <td><?= $tarifs ?></td>
                                        </tr>
                                        <?php endwhile ?>
                                        <tr><td colspan="2"></td></tr>
                                    </tbody>
                                    <tfoot>
                                        <th>Total</th>
                                        <th><?= $total ?></th>
                                    </tfoot>
                                </table>
                            </div>
                            <?php } ?>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <h3>Honoraire Périodique</h3>
                            <form action="honno.php" method="POST">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Date début</label>
                                        <input type="date" name="datedeb" class="form-control">
                                    </div>
                                    <div class="col-5">
                                        <label>Date fin</label>
                                        <input type="date" name="datefin" class="form-control">
                                    </div>
                                    <div class="col-2">
                                        <br>
                                        <button type="submit" name="searchs" class="btn btn-primary">Rechercher</button>
                                    </div>
                                </div>
                            </form><br><hr><br>
                            <?php if(isset($_POST['searchs'])){
                                $dde = $_POST['datedeb'];
                                $dfi = $_POST['datefin'];
                                $ddebut = explode('-',$dde);
                                $dfin = explode('-',$dfi); ?>
                                <h5><strong>Marquage dans la période du <?= $ddebut[2]."/".$ddebut[1]."/".$ddebut[0] ?> au <?= $dfin[2]."/".$dfin[1]."/".$dfin[0] ?></strong></h5>
                            <?php }
                            $sql = "SELECT * FROM zen_tailleur ORDER BY type_tailleur DESC";
                            $repons = $bdd->query($sql); ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>ID</th>
                                        <th>Tailleur</th>
                                        <th>Type</th>
                                        <th>Montant</th>
                                    </thead>
                                    <tbody>
                                    <?php while($donnee = $repons->fetch()){ 
                                        switch ($donnee['type_tailleur']) {
                                            case 'Tailleur simple':
                                                $id = 'id_couture';
                                                $date = 'date_couture';
                                                $tarif = 'tarif_simple';
                                                break;
        
                                            case 'Brodeur':
                                                $id = 'id_brodeur';
                                                $date = 'date_broderie';
                                                $tarif = 'tarif_brodeur';
                                                break;
                                            
                                            case 'Boutonnier':
                                                $id = 'id_bouton';
                                                $date = 'date_bouton';
                                                $tarif = 'tarif_bouton';
                                                break;
                                        }
                                        if(isset($_POST['searchs'])){
                                            $datedeb = $_POST['datedeb'];
                                            $datefin = $_POST['datefin'];
                                        }
                                        $tarif_total = sumt($donnee['id_tailleur'],$datedeb,$datefin,$id,$date,$tarif);?>
                                        <tr>
                                            <td><?= $donnee['id_tailleur'] ?></td>
                                            <td><?= $donnee['prenom_nom'] ?></td>
                                            <td><?= $donnee['type_tailleur'] ?></td>
                                            <td><?= $tarif_total ?></td>
                                        </tr>
                                    <?php } ?>
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
</div>
<?php require 'footer.php';?>