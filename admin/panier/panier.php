<?php require 'header.php'; ?>
<?php 
    $id_client = $_GET['pa'];
?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">&nbsp;&nbsp;&nbsp;Panier->Consulter le panier</h1>
    </div>

    <div class="row">
		
	<div class="container-fluid">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Etape 3</h6>
					<div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                    <button class="bg-gradient-success text-gray-100" style="float: right;"><a href="produit.php?po=<?php echo $id_client;?>" style="color: white;">Poursuivre les achats ></a></button>
                </div>
                <div class="card-body">
                    <div class="table-responsible">
                        <form action="../facture/fact.php" method="GET">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Désignation</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                                <th>Actions</th>
                            </thead>
                            <tfoot>
                                <th>Désignation</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                                <th>Actions</th>
                            </tfoot>
                            <tbody>
                                <?php 
                                $ids = array_keys($_SESSION['panier']);
                                if(empty($ids)){
                                    $products = array();
                                }else{
                                    $products = $DB->query('SELECT * FROM zen_produit WHERE codep IN ('.implode(',',$ids).')');
                                }
                                foreach ( $products as $product):?>
                                <tr>
                                    <td style="text-transform: uppercase"><input type="text" class="form-control" name="des[]" value="<?= $product->des.'->'.$product->modele.'->'.$product->catp; ?>" readonly></td>
                                    <td><input type="number" class="form-control price" name="price[]" value="<?= $product->pu;?>" readonly></td>
                                    <td>
                                        <input type="number" name="qty[]" class="form-control qty" value="<?= $_SESSION['panier'][$product->codep]; ?>">
                                    </td>
                                    <td><input type="number" name="subtot[]" class="form-control subtot" value="<?= $product->pu * $_SESSION['panier'][$product->codep];?>" readonly></td>
                                    <td><a href="panier.php?del=<?= $product->codep;?>&pa=<?php echo $id_client;?>"><i class="fas fa-trash"></i></a></td>  
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><input type="number" id="totqty" name="totqty" class="form-control" value="<?= $panier->count(); ?>" readonly></td>
                                    <td><input type="number" id="total" name="total" class="form-control" value="<?= $panier->total(); ?>" readonly></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" name="id_client" value="<?php echo $id_client;?>">
                        <button type="submit" class="btn btn-success" name="bt_facture">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var qtys = document.getElementsByClassName("qty");
    var subtots = document.getElementsByClassName("subtot");
    var prices = document.getElementsByClassName("price");
    var totqty = document.getElementById("totqty");
    var total = document.getElementById("total");
    for(let i = 0; i < qtys.length; i++){
        var qty = qtys[i];
        qty.addEventListener("change", evt=>{
            subtots[i].value = prices[i].value * evt.target.value;
            var tqt = 0;
            var tot = 0;
            for(let j = 0; j < qtys.length; j++){
                var qt = qtys[j];
                tot = parseInt(subtots[j].value) + tot;
                tqt = parseInt(qt.value) + tqt;
            }
            totqty.value = tqt;
            total.value = tot;
        });
    }
</script>
<?php require 'footer.php'; ?>