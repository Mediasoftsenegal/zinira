<?php require '../pages/header.php'; ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panier</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gestionnaire de panier</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsible">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <button class="bg-gradient-success text-gray-100" style="float: right;" onclick="rtn()">Poursuivre les achats ></button>
                            <thead>
                                <th>Désignation</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Prix Total</th>
                            </thead>
                            <tfoot>
                                <th>Désignation</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Prix Total</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function rtn() {
   window.history.back();
}
</script>
<?php require '../pages/footer.php'; ?>