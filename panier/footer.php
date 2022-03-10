            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Zinira <?php $an=date('Y'); echo $an;?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

  
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script>
        /*$(document).ready(function(){
            $("qty").on('change', function(){
                var $el = $(this).closest('tr');

                var price = $el.find(".price").val();
                var qty = $el.find(".qty").val();

                location.reload(true);

                $.ajax({
                    url: "panier.class.php",
                    method: "post",
                    cache: false,
                    data: {price:price,qty:qty},
                    success: function (response){
                        console.log(response);
                    }
                });
            });
        });*/
        
        /*var qty = document.getElementById('qty'),
            price = document.getElementById('price'),
            sub_tot = document.getElementById('sub_tot'),
            tot_qty = document.getElementById('tot_qty'),
            total = document.getElementById('total'),
            plus = document.getElementById('plus'),
            moins = document.getElementById('moins');
        var colisage = parseInt(document.getElementById('qty').getAttribute('colisage'));
        var miniCommande = parseInt(document.getElementById('qty').getAttribute('min'));
            

            plus.onclick=function(e){
                e.preventDefault();
                qty.value++;
                sub_tot.value = price.value * qty.value;
                tot_qty.value = qty.value;
                total.value = sub_tot.value;
            }
            moins.onclick=function(e){
                e.preventDefault(); 
                qty.value--;
                sub_tot.value = price.value * qty.value;
                tot_qty.value = qty.value;
                total.value = sub_tot.value;
            }*/
            /*plus.onclick=function(e){
                value = parseInt(qty.value);
                e.preventDefault();
                qty.value = value + colisage;
            }
            moins.onclick=function(e){
                value = parseInt(qty.value);
                e.preventDefault();
                if(qty.value>1) qty.value = value - colisage;
            }*/
    </script>

</body>

</html>