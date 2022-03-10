<?php 
//Modif facture
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

//Ajout acompte
    if(isset($_POST['ajouter'])){
        $id_client = $_POST['id_client'];
        $date_facture = $_POST['date_facture'];
        $numero_facture = $_POST['numero_facture'];
        $montpaye = $_POST['montpaye'];
        $time = date('H:i:s',time());
        $date_echeance = $_POST['date_echeance'];
        
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $reponse = $bdd->prepare("INSERT INTO `zen_factures` (`id_client`, `date_facture`, `id_societe`, `numero_facture`, `montant_facture`, `montpaye`, `etat_facture`, `heure_facture`, `date_echeance`) VALUES (:id_client, :date_facture, 1, :numero_facture, 0, :montpaye, 0, :heure_facture, :date_echeance)");

        $exe = $reponse->execute(array(":id_client"=>$id_client, ":date_facture"=>$date_facture, ":numero_facture"=>$numero_facture, ":montpaye"=>$montpaye, ":heure_facture"=>$time, ":date_echeance"=>$date_echeance));

        if($exe){
            $req = $bdd->query("SELECT SUM(zen_factures.montpaye) AS total FROM zen_factures WHERE zen_factures.numero_facture = ".$numero_facture);
            $don = $req->fetch();
            $re = $bdd->query("SELECT SUM(zen_factures.montant_facture) AS total FROM zen_factures WHERE zen_factures.numero_facture = ".$numero_facture);
            $do = $re->fetch();
            $paye = $don['total'];
            $fact = $do['total'];
            $res = $fact - $paye;
            if($res == 0){
                $etat = 1;
            }else{
                $etat = 0;
            }
            $sql = $bdd->prepare("UPDATE zen_factures SET etat_facture = :etat WHERE numero_facture = ".$numero_facture);
            $ex = $sql->execute(array(":etat"=>$etat));
            if($ex){
                header('location: acompte.php');
            }else{
                echo 'Echec';
            }
        }else{
            echo "Echec de l'opération";
        }
    }
?>