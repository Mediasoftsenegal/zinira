<?php 
    if(isset($_POST['valider'])){
        $id_facture = $_POST['id_facture'];
        $etat_facture = $_POST['etat'];
        $montpaye = $_POST['montpaye'];
        $reste = $_POST['reste'];

        if($reste == 0){
            $etat_facture = 1;
        }else{
            $etat_facture = 0;
        }

        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->prepare("UPDATE zen_factures SET montpaye=:montpaye, etat_facture=:etat_facture WHERE zen_factures.id_facture = ".$id_facture);
        $exe = $reponse->execute(array(":montpaye"=>$montpaye, ":etat_facture"=>$etat_facture));

        if($exe){
            header('location: etat.php');
        }else{
            echo "Echec opération de modification";
        }
    }
?>