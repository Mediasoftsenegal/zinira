<?php
//Client
    #Insert
    if(isset($_POST['bt_client'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $prenom_nom = $_POST['prenom_nom'];
        $genre = $_POST['genre'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];

        $sql = "INSERT INTO `zen_client` (`prenom_nom`, `genre`, `telephone`, `adresse`, `id_societe`) VALUES (:prenom_nom, :genre, :telephone, :adresse, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":prenom_nom"=>$prenom_nom, ":genre"=>$genre, ":telephone"=>$telephone, ":adresse"=>$adresse));

        if($exec){
            header('location:ajout_mesure.php');
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

    #Supprim
    if(isset($_POST['bt_supp_client'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

      $id_client = $_POST['id_client'];

      $sql = "UPDATE `zen_client` SET `etat` = 0 WHERE `zen_client`.`id_client`=:id_client";

      $exec = $bdd->prepare($sql)->execute(array(":id_client"=>$id_client));

      if($exec){
        header('location:client.php');
      }else{
        echo "Échec de l'opération de suppression";
      }
    }

//Article
    #Insert
    if(isset($_POST['bt_article'])){
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

        $type_article = $_POST['type_article'];
        $longueur = $_POST['longueur'];
        $couleur = $_POST['couleur'];

        $sql = "INSERT INTO `zen_client` (`type_article`, `longueur`, `couleur`, `id_societe`) VALUES (:type_article, :longueur, :couleur, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":type_article"=>$type_article, ":longueur"=>$longueur, ":couleur"=>$couleur, ":adresse"=>$adresse));

        if($exec){
            header('location:article.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }

//Mesure
    #Insert
    if(isset($_POST['bt_mesure'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

      $genre = $_POST['genre'];
      $telephone = $_POST['telephone'];
      $longueur = $_POST['longueur'];
      $longueurgrandboubou = $_POST['longueurgrandboubou'];
      $epaule = $_POST['epaule'];
      $cou = $_POST['cou'];
      $manche = $_POST['manche'];
      $taille = $_POST['taille'];
      $tourbras = $_POST['tourbras'];
      $poignet = $_POST['poignet'];
      $longueurpantalon = $_POST['longueurpantalon'];
      $taillecou = $_POST['taillecou'];
      $tourfess = $_POST['tourfess'];
      $cuisse = $_POST['cuisse'];
      $bas = $_POST['bas'];
      $poitrine = $_POST['poitrine'];
      $hanche = $_POST['hanche'];
      $pince = $_POST['pince'];
      $blouse = $_POST['blouse'];
      $longueurjupe = $_POST['longueurjupe'];
      $longueurrobe = $_POST['longueurrobe'];
      $tourmanche = $_POST['tourmanche'];
      $ceinture = $_POST['ceinture'];
      $id_client = $_POST['id_client'];
      $l = 20;

      //echo $id_client, $genre, $telephone, $l;

      $sql = "INSERT INTO `zen_mesure`(`genre`, `telephone`, `longueur`, `longueurgrandboubou`, `epaule`, `cou`, `manche`, `taille`, `tourbras`, `poignet`, `longueurpantalon`, `taillecou`, `tourfess`, `cuisse`, `bas`, `poitrine`, `hanche`, `pince`, `blouse`, `longueurjupe`, `longueurrobe`, `tourmanche`, `ceinture`, `id_societe`, `id_client`) VALUES (:genre, :telephone, :longueur, :longueurgrandboubou, :epaule, :cou, :manche, :taille, :tourbras, :poignet, :longueurpantalon, :taillecou, :tourfess, :cuisse, :bas, :poitrine, :hanche, :pince, :blouse, :longueurjupe, :longueurrobe, :tourmanche, :ceinture, 1, :id_client)";

      $res = $bdd->prepare($sql);
      $exec = $res->execute(array(":genre"=>$genre, ":telephone"=>$telephone, ":longueur"=>$longueur,":longueurgrandboubou"=>$longueurgrandboubou, ":epaule"=>$epaule,":cou"=>$cou,":manche"=>$manche,":taille"=>$taille,":tourbras"=>$tourbras,":poignet"=>$poignet,":longueurpantalon"=>$longueurpantalon,":taillecou"=>$taillecou,":tourfess"=>$tourfess,":cuisse"=>$cuisse,":bas"=>$bas,":poitrine"=>$poitrine,":hanche"=>$hanche,":pince"=>$pince,":blouse"=>$blouse,":longueurjupe"=>$longueurjupe,":longueurrobe"=>$longueurrobe,":tourmanche"=>$tourmanche,":ceinture"=>$ceinture,":id_client"=>$id_client));

      if($exec){
        header('location:client.php');
      }else{
        echo "Echec de l'opération d'insertion";
      }
    }
    #Inserr_1
    if(isset($_POST['bt_mesure_1'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

      $genre = $_POST['genre'];
      $telephone = $_POST['telephone'];
      $longueur = $_POST['longueur'];
      $longueurgrandboubou = $_POST['longueurgrandboubou'];
      $epaule = $_POST['epaule'];
      $cou = $_POST['cou'];
      $manche = $_POST['manche'];
      $taille = $_POST['taille'];
      $tourbras = $_POST['tourbras'];
      $poignet = $_POST['poignet'];
      $longueurpantalon = $_POST['longueurpantalon'];
      $taillecou = $_POST['taillecou'];
      $tourfess = $_POST['tourfess'];
      $cuisse = $_POST['cuisse'];
      $bas = $_POST['bas'];
      $poitrine = $_POST['poitrine'];
      $hanche = $_POST['hanche'];
      $pince = $_POST['pince'];
      $blouse = $_POST['blouse'];
      $longueurjupe = $_POST['longueurjupe'];
      $longueurrobe = $_POST['longueurrobe'];
      $tourmanche = $_POST['tourmanche'];
      $ceinture = $_POST['ceinture'];
      $id_client = $_POST['id_client'];
      $l = 20;

      //echo $id_client, $genre, $telephone, $l;

      $sql = "INSERT INTO `zen_mesure`(`genre`, `telephone`, `longueur`, `longueurgrandboubou`, `epaule`, `cou`, `manche`, `taille`, `tourbras`, `poignet`, `longueurpantalon`, `taillecou`, `tourfess`, `cuisse`, `bas`, `poitrine`, `hanche`, `pince`, `blouse`, `longueurjupe`, `longueurrobe`, `tourmanche`, `ceinture`, `id_societe`, `id_client`) VALUES (:genre, :telephone, :longueur, :longueurgrandboubou, :epaule, :cou, :manche, :taille, :tourbras, :poignet, :longueurpantalon, :taillecou, :tourfess, :cuisse, :bas, :poitrine, :hanche, :pince, :blouse, :longueurjupe, :longueurrobe, :tourmanche, :ceinture, 1, :id_client)";

      $res = $bdd->prepare($sql);
      $exec = $res->execute(array(":genre"=>$genre, ":telephone"=>$telephone, ":longueur"=>$longueur,":longueurgrandboubou"=>$longueurgrandboubou, ":epaule"=>$epaule,":cou"=>$cou,":manche"=>$manche,":taille"=>$taille,":tourbras"=>$tourbras,":poignet"=>$poignet,":longueurpantalon"=>$longueurpantalon,":taillecou"=>$taillecou,":tourfess"=>$tourfess,":cuisse"=>$cuisse,":bas"=>$bas,":poitrine"=>$poitrine,":hanche"=>$hanche,":pince"=>$pince,":blouse"=>$blouse,":longueurjupe"=>$longueurjupe,":longueurrobe"=>$longueurrobe,":tourmanche"=>$tourmanche,":ceinture"=>$ceinture,":id_client"=>$id_client));

      if($exec){
        header('location:client.php');
      }else{
        echo "Echec de l'opération d'insertion";
      }
    }
    #Modif
    if(isset($_POST['bt_modif_mesure'])){
      $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

      $id_mesure = $_POST['id_mesure'];

      $sql = "UPDATE `zen_mesure` SET `longueur`=:longueur, `longueurgrandboubou`=:longueurgrandboubou, `epaule`=:epaule, `cou`=:cou, `manche`=:manche, `taille`=:taille, `tourbras`=:tourbras, `poignet`=:poignet, `longueurpantalon`=:longueurpantalon, `taillecou`=:taillecou, `tourfess`=:tourfess, `cuisse`=:cuisse, `bas`=:bas, `poitrine`=:poitrine, `hanche`=:hanche, `pince`=:pince, `blouse`=:blouse, `longueurjupe`=:longueurjupe, `longueurrobe`=:longueurrobe, `tourmanche`=:tourmanche, `ceinture`=:ceinture WHERE `zen_mesure`.`id_mesure`=:id_mesure";
	  
      $res = $bdd->prepare($sql);
      $exec = $res->execute(array(":longueur"=>$_POST['longueur'], ":longueurgrandboubou"=>$_POST['longueurgrandboubou'], ":epaule"=>$_POST['epaule'], ":cou"=>$_POST['cou'], ":manche"=>$_POST['manche'], ":taille"=>$_POST['taille'], ":tourbras"=>$_POST['tourbras'], ":poignet"=>$_POST['poignet'], ":longueurpantalon"=>$_POST['longueurpantalon'], ":taillecou"=>$_POST['taillecou'], ":tourfess"=>$_POST['tourfess'], ":cuisse"=>$_POST['cuisse'], ":bas"=>$_POST['bas'], ":poitrine"=>$_POST['poitrine'], ":hanche"=>$_POST['hanche'], ":pince"=>$_POST['pince'], ":blouse"=>$_POST['blouse'], ":longueurjupe"=>$_POST['longueurjupe'], ":longueurrobe"=>$_POST['longueurrobe'], ":tourmanche"=>$_POST['tourmanche'], ":ceinture"=>$_POST['ceinture'], ":id_mesure"=>$_POST['id_mesure']));

      if($exec){
       header('location:mesures.php');
      }else{
        echo "Échec de l'opération de modification";
      }
    }

?>