<?php
//Profil
    #Insert
    if(isset($_POST['bt_profil'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $nomprofil = $_POST['nomprofil'];

        $sql = "INSERT INTO `zen_profil` (`nomprofil`, `etat`, `id_societe`) VALUES (:nomprofil, 1, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":nomprofil"=>$nomprofil));

        if($exec){
            header('location:profil.php');
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
    if(isset($_POST['bt_user'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $login = $_POST['login'];
        $password = $_POST['password'];
        $nomprofil = $_POST['nomprofil'];

        $sql = "INSERT INTO `zen_user` (`login`, `password`, `id_societe`, `id_profil`, `etat`) VALUES (:login, :password, 1, :nomprofil, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":login"=>$login, ":password"=>$password, ":nomprofil"=>$nomprofil));

        if($exec){
            header('location:user.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }