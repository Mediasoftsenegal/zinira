<?php
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
    session_start();

    if(isset($_POST['bt_login'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sql = "SELECT COUNT(*) FROM zen_user WHERE login = '$login' AND password = '$password'";
	//	echo $sql;
        $query = $bdd->prepare($sql);
        $query->execute();
        $result = $query->fetch();
	//	echo $result ['0'] ;
        $resultat = $result['0'];
   

        switch($resultat){
            case 1 :
                $res = $bdd->query("SELECT * FROM zen_user WHERE zen_user.login = '$login' AND zen_user.password = '$password'");
                $row = $res->fetch();
                //echo $row['id_profil'];

                switch($row['id_profil']){
                    case 1 :
                        echo "Connexion Réussie....... <br>Bienvenu(e) : '$login'";
                        header('Refresh: 1; URL = admin/client/client.php');
                        break;
                    case 2 :
                        echo "Connexion Réussie....... <br>Bienvenu(e) : '$login'";
                        header('Refresh: 1; URL = client/client.php');
                        break;
                    case 3 :
                        echo "Connexion Réussie....... <br>Bienvenu(e) : '$login'";
                        header('Refresh: 1; URL = caisse/caisse.php');
                        break;
                    case 4 :
                        echo "Connexion Réussie....... <br>Bienvenu(e) : '$login'";
                        header('Refresh: 1; URL = comptable/finance.php');
                        break;
                    case 5 :
                        echo "Connexion Réussie....... <br>Bienvenu(e) : '$login'";
                        header('Refresh: 1; URL = marquage/marquage.php');
                        break;
                }
                break;
            case 0 :
               echo "<h1> Votre login ou mot de passe n'est pas valide !</h1>";
			  //  header('Refresh: 1; URL = client/client.php');
               header ("Refresh: 5;URL=index.php");
                break;
        }
    }
?>
