<?php
//Article
    #Insert
    if(isset($_POST['bt_article'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $des = $_POST['des'];
        $pu = $_POST['pu'];
        $catp = $_POST['catp'];
		$catp = $_POST['modele'];
		$catp = $_POST['genre'];
		$catp = $_POST['couleur'];

        $sql = "INSERT INTO `zen_produit` (`des`, `pu`, `catp`, `modele`, `genre`, `couleur`) VALUES (:des, :pu, :catp, :modele, :genre, :couleur)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":des"=>$des, ":pu"=>$pu, ":catp"=>$catp, ":modele"=>$modele, ":genre"=>$genre,":couleur"=>$couleur));

        if($exec){
            header('location:article.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }
	// Update Article
	 if(isset($_POST['bt_update_article'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
		
		$codep =$_POST['codep'];
		$des = $_POST['des'];
        $pu = $_POST['pu'];
        $catp = $_POST['catp'];
		$modele = $_POST['modele'];
		$genre = $_POST['genre'];
		$couleur = $_POST['couleur'];

		$sql = "UPDATE `zen_produit` SET `des`=?,`pu`=?, `catp`=?, `id_modele`=?, `genre`=?, `couleur`=? WHERE codep=?";
		$res = $bdd->prepare($sql);
		$exec = $res->execute([$des,$pu,$catp,$modele,$genre,$couleur,$codep]);
		
		if($exec){
            header('location:article.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }

    if(isset($_POST['bt_update_articles'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
  
  $codep =$_POST['codep'];
  $des = $_POST['des'];
      $pu = $_POST['pu'];
      $catp = $_POST['catp'];
  $modele = $_POST['modele'];
  $genre = $_POST['genre'];
  $couleur = $_POST['couleur'];

  $sql = "UPDATE `zen_produit` SET `des`=?,`pu`=?, `catp`=?, `id_modele`=?, `genre`=?, `couleur`=? WHERE codep=?";
  $res = $bdd->prepare($sql);
  $exec = $res->execute([$des,$pu,$catp,$modele,$genre,$couleur,$codep]);
  
  if($exec){
          header('location:article.php');
        }else{
          echo "Échec de l'opération d'insertion";
        }
  }
	//Modele
    #Insert
    if(isset($_POST['bt_modele'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $libmod = $_POST['libmod'];
      
        $sql = "INSERT INTO `zen_modele` (`libmod`) VALUES (:libmod)";
		
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":libmod"=>$libmod));

        if($exec){
            header('location:modele.php');
          }else{
            echo "<h1>Échec de l'opération d'insertion de modele</h1>";
			header('location:modele.php');
          }         
    }
	
?>