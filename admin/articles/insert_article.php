<?php
//Client
    #Insert
    if(isset($_POST['bt_client'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $prenom_nom = $_POST['prenom_nom'];
        $genre = $_POST['genre'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];

        $sql = "INSERT INTO `zen_client` (`prenom_nom`, `genre`, `telephone`, `adresse`, `id_societe`) VALUES (:prenom_nom, :genre, :telephone, :adresse, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":prenom_nom"=>$prenom_nom, ":genre"=>$genre, ":telephone"=>$telephone, ":adresse"=>$adresse));

        if($exec){
            header('location:ajout_mesure.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }

	
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

		$sql = "UPDATE `zen_produit` SET `des`=?,`pu`=?, `catp`=?, `modele`=?, `genre`=?, `couleur`=? WHERE codep=?";
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
	
	//Mesure
    #Insert
    if(isset($_POST['bt_mesure'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $genre = $_POST['genre'];
        $telephone = $_POST['telephone'];
        $longueur = $_POST['longueur'];
        $longueurgrandboubou = $_POST['longueurgrandboubou'];
        $epaule = $_POST['epaule'];
        $cou = $_POST['cou'];
        $manche = $_POST['manche'];
        $taille = $_POST['taille'];
        $taillemanche = $_POST['taillemanche'];
        $poignet = $_POST['poignet'];
        $longueurpantalon = $_POST['longueurpantalon'];
        $taillecou = $_POST['taillecou'];
        $tourfess = $_POST['tourfess'];
        $cuisse = $_POST['cuisse'];
        $bas = $_POST['bas'];
        $poitrine = $_POST['poitrine'];
        $hanche = $_POST['hanche'];
        $pince = $_POST['pince'];
        $blouse = $_POST['blouse'];
        $longueurjupe = $_POST['longueurjupe'];
        $longueurrobe = $_POST['longueurrobe'];
        $prenom_nom = $_POST['prenom_nom'];

        $sql = "INSERT INTO `zen_mesure` (`genre`, `telephone`, `longueur`, `longueurgrandboubou`, `epaule`, `cou`, `manche`, `taille`, `taillemanche`, `taillecou`, `tourfess`, `cuisse`, `bas`, `poitrine`, `hanche`, `pince`, `blouse`, `longueurjupe`, `longueurrobe`, `id_client`, `id_societe`) VALUES (:genre, :telephone, :longueur, :longueurgrandboubou, :epaule, :cou, :manche, :taille, :taillemanche, :taillecou, :tourfess, :cuisse, :bas, :poitrine, :hanche, :pince, :blouse, :longueurjupe, :longueurrobe, :prenom_nom, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":genre"=>$genre, ":genre"=>$genre, ":telephone"=>$telephone, ":longueur"=>$longueur, ":longueurgrandboubou"=>$longueurgrandboubou, ":epaule"=>$epaule, ":cou"=>$cou, ":manche"=>$manche, ":taille"=>$taille, ":taillemanche"=>$taillemanche, ":taillecou"=>$taillecou, ":tourfess"=>$tourfess, ":cuisse"=>$cuisse, ":bas"=>$bas, ":poitrine"=>$poitrine, ":hanche"=>$hanche, ":pince"=>$pince, ":blouse"=>$blouse, ":longueurjupe"=>$longueurjupe, ":longueurrobe"=>$longueurrobe, ":prenom_nom"=>$prenom_nom));

        if($exec){
            header('location:client.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }
	
?>