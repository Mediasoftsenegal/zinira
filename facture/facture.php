<?php
    $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');

    $id_client = $_GET['id_client'];
    $date = date('d-m-Y');
    $id_societe = 1;
    $numerofact = $_GET['numero_facture'];
    $total = $_GET['total'];
    $montpaye = $_GET['montpaye'];
    $time = date('H:i', time());
    $date_echeance = $_GET['date_echeance'];

    $sql = "INSERT INTO `zen_factures` (`id_client`, `date_facture`, `id_societe`, `numero_facture`, `montant_facture`, `montpaye`, `heure_facture`, `date_echeance`) VALUES (:id_client, :date_facture, :id_societe, :numero_facture, :montant_facture, :montpaye, :heure_facture, :date_echeance)";
    $res = $bdd->prepare($sql);
    $res->execute(array(":id_client"=>$id_client, ":date_facture"=>$date, ":id_societe"=>$id_societe, ":numero_facture"=>$numerofact, ":montant_facture"=>$total, ":montpaye"=>$montpaye, ":heure_facture"=>$time, ":date_echeance"=>$date_echeance));
?>
<?php //var_dump($_GET) ?>
<?php
    require '../fpdf/fpdf.php';

    class PDF extends FPDF{
    function Header(){
        $this->Image('../img/logo1.png',10,6,50);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(10,50,'COUPE-COUTURE-BRODERIE',0,0);
        $this->Cell(-4,60,'HOMME & FEMME',0,0);
        $this->Cell(-5,70,'Cite Keur Gorgui Dakar',0,0);
        $this->Cell(155,80,'Tel: 77 657 50 99 - 77 144 47 47',0,0);
        $date = date('d-m-Y');
        $this->Cell(-50,1,'Date : '.$date,0,0);
        $this->SetFont('Arial', 'B', 29);
        $this->Cell(-105,30,'FACTURE N:'.$_GET['numero_facture'],0,0);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(100,100,'Date commande : '.$date,0,0);
        /*$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM zen_client WHERE id_client = ".$_GET['id_client']);
        $donnees = $reponse->fetch();*/
        $this->Cell(-100,100,'Date livraison : '.$_GET['date_echeance'],0,0);
        $this->Cell(0,110,'Prenom et Nom : '.$_GET['prenom_nom'],0,0);
        $this->Cell(-189,110,'',0,0);
        $this->Cell(1,120,'Contact client : '.$_GET['telephone'],0,0);
    }

    function headerTable(){
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(80);
        $this->Cell(90,10,'DESIGNATION',1,0,'C');
        $this->Cell(40,10,'P. UNITAIRE',1,0,'C');
        $this->Cell(20,10,'QUANTITE',1,0,'C');
        $this->Cell(40,10,'PRIX TOTAL',1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Arial', '', 9);
        $des[] = $_GET['des'];
        $qtys[] = $_GET['qty'];
        $prices[] = $_GET['price'];
        $subtots[] = $_GET['subtot'];
        require '../panier/_header.php';
        for($i=0; $i<$panier->count(); $i++){
            $this->Cell(90,10,$des[0][$i],1,0,'C');
            $this->Cell(40,10,$prices[0][$i],1,0,'C');
            $this->Cell(20,10,$qtys[0][$i],1,0,'C');
            $this->Cell(40,10,$subtots[0][$i],1,0,'C');
            $this->Ln();
        }
    }

    function footerTable(){
        $this->SetFont('Arial', 'B', 9);
        $totqty = $_GET['totqty'];
        $total = $_GET['total'];
        $this->Cell(130,10,'TOTAL',1,0,'C');
        $this->Cell(20,10,$totqty,1,0,'C');
        $this->Cell(40,10,$total,1,0,'C');
        $this->Ln();
    }

    function body(){
        $this->Cell(130,10,'',0,0,'L');
        $this->Cell(0.1,20,'Avance : '.$_GET['montpaye'],0,0,'L');
        $total = $_GET['total'];
        $reste = $total - $_GET['montpaye'];
        $this->Cell(-0.1,40,'Reste : '.$reste,0,0,'L');
        $date = date('d-m-Y');
        $this->Cell(-130,60,'Soldee le : '.$date,0,0,'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(-0.1,90,'NB: Le delai de livraison est de 3 mois a compter de cette date',0,0,'L');
        $this->Cell(0.1,100,'Passe ces 3 mois, nous sommes plus responsables des habits qui nous sont confies',0,0,'L');
        $this->Cell(-0.1,110,"En cas de perte de recu, se presenter avec une piece d'identite portant le meme nom que celui inscrit",0,0,'L');
        $this->Cell(-100,120,"sur la souche - Merci",0,0,'L');
        $this->Ln();
    }

    function Footer(){
        $this->SetFont('Arial', 'B', 12);
        $this->SetY(230);
        /*$id_client = $_GET['id_client'];
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE zen_mesure.id_client = ".$id_client."");
        $donnees = $reponse->fetch();*/
        $this->Cell(63,0,'',1,0);
        $this->Cell(63,0,'',1,0);
        $this->Cell(63,0,'',1,0);
        $this->Cell(-189,0,'',0,0);
        $this->Cell(63,10,'Hanche : '.$_GET['hanche'],0,0);
        $this->Cell(63,10,'Longueur : '.$_GET['longueur'],0,0);
        $this->Cell(-126,10,'Robe : '.$_GET['longueurrobe'],0,0);
        $this->Cell(63,25,'Blouse : '.$_GET['blouse'],0,0);
        $this->Cell(63,25,'Epaule : '.$_GET['epaule'],0,0);
        $this->Cell(-126,25,'Grand-Boubou : '.$_GET['longueurgrandboubou'],0,0);
        $this->Cell(63,40,'Poitrine : '.$_GET['poitrine'],0,0);
        $this->Cell(63,40,'Manche : '.$_GET['manche'],0,0);
        $this->Cell(-126,40,'Poignet : '.$_GET['poignet'],0,0);
        $this->Cell(63,55,'Jupe : '.$_GET['longueurjupe'],0,0);
        $this->Cell(63,55,'Cou : '.$_GET['cou'],0,0);
        $this->Cell(-126,55,'Taille-Cou : '.$_GET['taillecou'],0,0);
        $this->Cell(63,70,'Taille : '.$_GET['taille'],0,0);
        $this->Cell(63,70,'Pantalon : '.$_GET['longueurpantalon'],0,0);
        $this->Cell(-126,70,'Tour-Fesse : '.$_GET['tourfesse'],0,0);
        $this->Cell(63,85,'Pince : '.$_GET['pince'],0,0);
        $this->Cell(63,85,'Bas : '.$_GET['bas'],0,0);
        $this->Cell(-126,85,'Tour-Manche : '.$_GET['tourmanche'],0,0);
        $this->Cell(63,100,'Cuisse : '.$_GET['cuisse'],0,0);
        $this->Cell(63,100,'Tour-Bras : '.$_GET['tourbras'],0,0);
        $this->Cell(-126,100,'Ceinture : '.$_GET['ceinture'],0,0);
        $this->Ln();
    }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //$pdf->Header();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->footerTable();
    $pdf->body();
    $pdf->Output();
?>