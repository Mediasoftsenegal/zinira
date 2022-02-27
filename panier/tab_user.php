<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
 

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
     <form class="form-horizontal style-form" action="insert.php" method="GET" >
	 <div class="modal fade" id="Modals" role="dialog">
                    <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Formulaire Nouvel utilisateur</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Login:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="login" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Mot de passe:</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="col-sm-4 control-label">Nom afficher :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nom_afficher" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
								   <label for="inputEmail3" class="col-sm-2 col-form-label">Profil</label>
								   <div class="col-sm-10">
									<select name="profil" class="form-control">
									  <option value="1" >ADMINISTRATEUR</option>
									  <option value="2">DISPATCHEUR</option>
									  <option value="3 SIMPLE" >UTILISATEUR SIMPLE</option>
									</select>
									</div>
								  </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-success" name="btn-user" >Enregistrer</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
	
      </form>
         <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Utilisateurs</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="info-box">
              <div class="info-box-content">
                 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Modals">
                  Nouvel utilisateur
                </button>
              </div>
              <!-- /.info-box-content -->
            </div>
			 
				<br>
                <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Login</th>
                  <th>mot de passe</th>
                  <th>Nom afficher</th>
                  <th>Profil</th>
				  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				  {
					try{
				$pdo = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons','K330D)A.dbn2Rc');
					}
				catch(PDOException $e){
				echo $e->getMessage();
				}
				$verify = $pdo->prepare("SELECT id_user,login,mdp,nom_afficher,sen_profil.Profil FROM sen_user,sen_profil
				Where sen_user.id_profil=sen_profil.id_profil");
				$verify->execute();
				$rows=$verify->fetchAll();
				foreach ($rows as $row){
                 echo '<tr>';
                 echo'<td>'.$row['login'].'</td>';
                 echo'<td>'.$row['mdp'].'</td>';
                 echo'<td>'.$row['nom_afficher'].'</td>';
                 echo'<td>'.$row['Profil'].'</td>';
				 echo'<td><div class="btn-group btn-group-sm">
                   <a href="menu.php?s=form_user&id='.$row['id_user'].'" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Modification"><i class="fas fa-eye"></i></a>
                   <a onclick="return confirm("Voulez-vous réellement supprimer cet utilisateur ?") href="menu.php?s=supp&sxcd='.$row['id_user'].'" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Suppression"><i class="fas fa-trash"></i></a>
                      </div>
				</td>';
				 echo'</tr>';
				  }}?>
                </tbody>
                <tfoot>
                <tr>
                <th>Login</th>
                  <th>mot de passe</th>
                  <th>Nom afficher</th>
                  <th>Profil</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            
          </div>		
          <div class="card">
            
            <!-- /.card-header -->
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
