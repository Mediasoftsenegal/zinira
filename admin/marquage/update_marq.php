<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
if(isset($_POST['bt_ts'])){
    $prenom_nom = $_POST['prenom_nom'];
    $date = $_POST['date_couture'];
    $sql = "UPDATE zen_marquage SET date_couture = :date_couture, id_couture = :prenom_nom WHERE id_marquage = ".$_POST['id_marquage'];
    $res = $bdd->prepare($sql);
    $exe = $res->execute(array(":date_couture"=>$date, ":prenom_nom"=>$prenom_nom));
    if($exe){
        header('location: marquage.php');
    }else{
        echo "Echec de l'opération";
    }
} 
if(isset($_POST['bt_br'])){
    $prenom_nom = $_POST['prenom_nom'];
    $date = $_POST['date_broderie'];
    $sql = "UPDATE zen_marquage SET date_broderie = :date_broderie, id_brodeur = :prenom_nom WHERE id_marquage = ".$_POST['id_marquage'];
    $res = $bdd->prepare($sql);
    $exe = $res->execute(array(":date_broderie"=>$date, ":prenom_nom"=>$prenom_nom));
    echo $prenom_nom;
    if($exe){
        header('location: marquage.php');
    }else{
        echo "Echec de l'opération";
    }
}
    if(isset($_POST['bt_bo'])){
    $prenom_nom = $_POST['prenom_nom'];
    $date = $_POST['date_bouton'];
    $sql = "UPDATE zen_marquage SET date_bouton = :date_bouton, id_bouton = :prenom_nom WHERE id_marquage = ".$_POST['id_marquage'];
    $res = $bdd->prepare($sql);
    $exe = $res->execute(array(":date_bouton"=>$date, ":prenom_nom"=>$prenom_nom));
    if($exe){
        header('location: marquage.php');
    }else{
        echo "Echec de l'opération";
    }
} ?>