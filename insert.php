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
        $taillemanche = $_POST['taillemanche'];
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
        $prenom_nom = $_POST['prenom_nom'];

        $sql = "INSERT INTO `zen_mesure` (`genre`, `telephone`, `longueur`, `longueurgrandboubou`, `epaule`, `cou`, `manche`, `taille`, `taillemanche`, `taillecou`, `tourfess`, `cuisse`, `bas`, `poitrine`, `hanche`, `pince`, `blouse`, `longueurjupe`, `longueurrobe`, `id_client`, `id_societe`) VALUES (:genre, :telephone, :longueur, :longueurgrandboubou, :epaule, :cou, :manche, :taille, :taillemanche, :taillecou, :tourfess, :cuisse, :bas, :poitrine, :hanche, :pince, :blouse, :longueurjupe, :longueurrobe, :prenom_nom, 1)";
        $res = $bdd->prepare($sql);
        $exec = $res->execute(array(":genre"=>$genre, ":genre"=>$genre, ":telephone"=>$telephone, ":longueur"=>$longueur, ":longueurgrandboubou"=>$longueurgrandboubou, ":epaule"=>$epaule, ":cou"=>$cou, ":manche"=>$manche, ":taille"=>$taille, ":taillemanche"=>$taillemanche, ":taillecou"=>$taillecou, ":tourfess"=>$tourfess, ":cuisse"=>$cuisse, ":bas"=>$bas, ":poitrine"=>$poitrine, ":hanche"=>$hanche, ":pince"=>$pince, ":blouse"=>$blouse, ":longueurjupe"=>$longueurjupe, ":longueurrobe"=>$longueurrobe, ":prenom_nom"=>$prenom_nom));

        if($exec){
            header('location:client.php');
          }else{
            echo "Échec de l'opération d'insertion";
          }
    }

?>