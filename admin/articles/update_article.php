<?php
// UPDATE mesures
	if(isset($_POST['bt_update_mesure'])){
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
		
		$sql = "UPDATE `zen_mesure` SET `genre`=?,`telephone`=?, `longueur`=?, `longueurgrandboubou`=?, `epaule`=?,cou `=?,`manche `=?,
        `taille `=?,`taillemanche `=?,`poignet `=?,`longueurpantalon `=?,`taillecou `=?,`tourfess `=?,`cuisse `=?,`bas `=?,`poitrine `=?,
        `hanche `=?,`pince `=?,`blouse `=?,`longueurjupe `=?,`longueurrobe `=?,`prenom_nom `=? WHERE codep=?";
		$res = $bdd->prepare($sql);
		echo $sql;
		$exec = $res->execute([$genre,$telephone,$longueur,$longueurgrandboubou,$epaule,$cou,$manche,$taille,$taillemanche,$poignet,$longueurpantalon,$taillecou,,$tourfess,$cuisse,$bas,$poitrine,$hanche,$pince,$blouse,$longueurjupe,$longueurrobe,$prenom_nom,$codep]);
		
		if($exec){
            header('location:mesures.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
		
		
	}
?>	