<?php
    $id_facture = $_GET['mo'];
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $res = $bdd->prepare("DELETE FROM zen_factures WHERE id_facture = :id_facture");
    $exe = $res->execute(array(":id_facture"=>$id_facture));
    if($exe){
        header('location:facturation.php');
    }else{
        echo "Echec de l'opération";
    }
?>