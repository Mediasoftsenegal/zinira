<?php
//Tailleur
    #Insert
    if(isset($_POST['bt_tailleur'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $prenom_nom = $_POST['prenom_nom'];
        $type_tailleur = $_POST['type_tailleur'];

        $sql = "INSERT INTO `zen_tailleur` (`prenom_nom`, `type_tailleur`, `id_societe`) VALUES (:prenom_nom, :type_tailleur, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":prenom_nom"=>$prenom_nom, ":type_tailleur"=>$type_tailleur));

        if($exec){
            header('location:tailleur.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }
    #Modif
    if(isset($_POST['bt_modif_client'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

      $id_client = $_POST['codep'];

      $sql = "UPDATE `zen_client` SET `prenom_nom`=:prenom_nom, `genre`=:genre, `telephone`=:telephone, `adresse`=:adresse WHERE `zen_client`.`id_client`=:id_client";
	  
      $exec = $bdd->prepare($sql)->execute(array(":prenom_nom"=>$_POST['prenom_nom'], ":genre"=>$_POST['genre'], ":telephone"=>$_POST['telephone'], ":adresse"=>$_POST['adresse'], ":id_client"=>$id_client ));

      if($exec){
        header('location:client.php');
      }else{
        echo "Échec de l'opération de modification";
      }
    }

//User
    #Insert
    if(isset($_POST['bt_tarif'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $type_tailleur = $_POST['type_tailleur'];
        $tarif = $_POST['tarif'];
        $prenom_nom = $_POST['prenom_nom'];

        $sql = "INSERT INTO `zen_user` (`type_tailleur`, `tarif`, `id_tailleur`, `id_societe`) VALUES (:type_tailleur, :tarif, :nom_prenom, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":type_tailleur"=>$type_tailleur, ":tarif"=>$tarif, ":nom_prenom"=>$nom_prenom));

        if($exec){
            header('location:tarif.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }