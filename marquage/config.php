<?php
function fnom($id){
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $sql = "SELECT * FROM zen_tailleur WHERE id_tailleur = ".$id;
    $reponse = $bdd->prepare($sql);
    $reponse->execute();
    $donnees = $reponse->fetch();
    return $donnees['prenom_nom'];
}
function sumt($id,$d1,$d2,$idt,$dt,$ta){
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    $sql = "SELECT SUM(zen_tarification.$ta) AS tarif FROM (((zen_marquage
    INNER JOIN zen_produit ON zen_marquage.id_article = zen_produit.codep)
    INNER JOIN zen_modele ON zen_produit.id_modele = zen_modele.codemod)
    INNER JOIN zen_tarification ON zen_modele.codemod = zen_tarification.id_modele)
    WHERE $idt = $id
    AND zen_marquage.$dt BETWEEN '$d1' AND '$d2'";
    $reponse = $bdd->prepare($sql);
    $reponse->execute();
    $donnees = $reponse->fetch();
    return $donnees['tarif'];
}