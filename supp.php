<?php
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    if(isset($_GET['sup'])){
        $id_client = $_GET['sup'];
        $reponse = $bdd->query("DELETE * FROM zen_client  WHERE id_client = ".$id_client."");
        echo '<h1>Suppression Effectuée !</h1>';
        header('location: client.php');
    }
?>