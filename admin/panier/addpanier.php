<?php 
    require '_header.php';
    $id_client = $_GET['idc'];

    if(isset($_GET['id'])){
        $product = $DB->query('SELECT codep FROM zen_produit WHERE codep=:codep', array('codep' => $_GET['id']));
        $panier->add($product[0]->codep);
        header('location: produit.php?po='.$id_client);
    }
    
?>