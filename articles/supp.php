<?php
// delete article
$id=$_GET['exdcvfr'];
if(isset($_GET['exdcvfr'])){
	$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
	
	$sql=" DELETE FROM `zen_produit` WHERE `zen_produit`.`codep` = ".$id;
	$res = $bdd->prepare($sql);
	
	$exec = $res->execute(array(":codep"=>$id));

        if($exec){
            header('location:article.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
}