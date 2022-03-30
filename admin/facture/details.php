<?php
    require '../fpdf/fpdf.php';

    class PDF extends FPDF{
    function Header(){
        $id_facture = $_GET['det']; 
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
        $donnees = $reponse->fetch();
        $this->Image('../../img/logo1.png',10,6,50);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(10,50,'COUPE-COUTURE-BRODERIE',0,0);
        $this->Cell(-4,60,'HOMME & FEMME',0,0);
        $this->Cell(-5,70,'Cite Keur Gorgui Dakar',0,0);
        $this->Cell(155,80,'Tel: 77 657 50 99 - 77 144 47 47',0,0);
        $this->Cell(-50,1,'Date : '.$donnees['date_facture'],0,0);
        $this->SetFont('Arial', 'B', 29);
        $this->Cell(-105,30,'FACTURE N:'.$donnees['numero_facture'],0,0);
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(100,100,'Date commande : '.$donnees['date_facture'],0,0);
        /*$bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM zen_client WHERE id_client = ".$_GET['id_client']);
        $donnees = $reponse->fetch();*/
        $this->Cell(-100,100,'Date livraison : '.$donnees['date_echeance'],0,0);
        $this->Cell(0,110,utf8_decode('Prénom et Nom : '.$donnees['prenom_nom']),0,0);
        $this->Cell(-189,110,'',0,0);
        $this->Cell(1,120,'Contact client : '.$donnees['telephone'],0,0);
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
        $id_facture = $_GET['det']; 
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
        $donnees = $reponse->fetch();
        $des = explode(',',$donnees['article']);
        $pu = explode(',',$donnees['prix_unitaire']);
        $qty = explode(',',$donnees['nombre']);
        $is = count($pu);
        $this->SetFont('Arial', '', 9);
        require '../panier/_header.php';
        for($i=0; $i<$is; $i++){
            $this->Cell(90,10,$des[$i],1,0,'C');
            $this->Cell(40,10,number_format($pu[$i]),1,0,'C');
            $this->Cell(20,10,$qty[$i],1,0,'C');
            $this->Cell(40,10,number_format($pu[$i] * $qty[$i]),1,0,'C');
            $this->Ln();
        }
    }

    function footerTable(){
        $id_facture = $_GET['det']; 
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
        $donnees = $reponse->fetch();
        $pu = explode(',',$donnees['prix_unitaire']);
        $qty = explode(',',$donnees['nombre']);
        $is = count($pu);
        $s = 0;
        for($a=0; $a<$is; $a++): $s += $qty[$a]; endfor;
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(130,10,'TOTAL',1,0,'C');
        $this->Cell(20,10,$s,1,0,'C');
        $this->Cell(40,10,number_format($donnees['montant']),1,0,'C');
        $this->Ln();
    }

    function body(){
        $id_facture = $_GET['det']; 
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
        $donnees = $reponse->fetch();
        $this->Cell(130,10,'',0,0,'L');
        $this->Cell(0.1,20,'Avance : '.number_format($donnees['montpaye']),0,0,'L');
        $total = $donnees['montant'];
        $reste = $total - $donnees['montpaye'];
        $this->Cell(-0.1,40,'Reste : '.number_format($reste),0,0,'L');
        $date = $donnees['date_facture'];
        $this->Cell(-130,60,utf8_decode('Soldée le : '.$date),0,0,'L');
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(-0.1,90,utf8_decode('NB: Le delai de livraison est de 3 mois à compter de cette date'),0,0,'L');
        $this->Cell(0.1,100,utf8_decode('Passé ces 3 mois, nous sommes plus responsables des habits qui nous sont confiés'),0,0,'L');
        $this->Cell(-0.1,110,utf8_decode("En cas de perte de reçu, se présenter avec une pièce d'identité portant le même nom que celui inscrit"),0,0,'L');
        $this->Cell(-100,120,"sur la souche - Merci",0,0,'L');
        $this->Ln();
    }

    function Footer(){
        $id_facture = $_GET['det']; 
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM ((zen_detail_facture INNER JOIN zen_client ON zen_detail_facture.id_client = zen_client.id_client) INNER JOIN zen_factures ON zen_detail_facture.id_facture = zen_factures.id_facture) WHERE zen_detail_facture.id_facture = ".$id_facture);
        $donnees = $reponse->fetch();
        $repons = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE zen_mesure.id_client = ".$donnees['id_client']."");
        $donnee = $repons->fetch();
        $this->SetFont('Arial', 'B', 12);
        $this->SetY(220);
        /*$id_client = $_GET['id_client'];
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_zinira;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $reponse = $bdd->query("SELECT * FROM zen_mesure INNER JOIN zen_client ON zen_mesure.id_client = zen_client.id_client WHERE zen_mesure.id_client = ".$id_client."");
        $donnees = $reponse->fetch();*/
        $this->Cell(63,0,'',1,0);
        $this->Cell(63,0,'',1,0);
        $this->Cell(63,0,'',1,0);
        $this->Cell(-189,0,'',0,0);
        $this->Cell(63,10,'Nom : ....................................',0,0);
        $this->Cell(63,10,'Hanche : '.$donnee['hanche'],0,0);
        $this->Cell(-126,10,'L : '.$donnee['longueur'],0,0);
        $this->Cell(63,25,utf8_decode('Prénom : ...............................'),0,0);
        $this->Cell(63,25,'Blouse : '.$donnee['blouse'],0,0);
        $this->Cell(-126,25,'E : '.$donnee['epaule'],0,0);
        $this->Cell(63,40,'Tissu : ..................................',0,0);
        $this->Cell(63,40,'Poitrine : '.$donnee['poitrine'],0,0);
        $this->Cell(-126,40,'M : '.$donnee['manche'],0,0);
        $this->Cell(63,55,utf8_decode('Modèle : ...............................'),0,0);
        $this->Cell(63,55,'Jupe : '.$donnee['longueurjupe'],0,0);
        $this->Cell(-126,55,'C : '.$donnee['cou'],0,0);
        $this->Cell(63,70,'Observation : ........................',0,0);
        $this->Cell(63,70,'Taille : '.$donnee['taille'],0,0);
        $this->Cell(-126,70,'P : '.$donnee['poitrine'],0,0);
        $this->Cell(63,85,'.................................................',0,0);
        $this->Cell(63,85,'Pince : '.$donnee['pince'],0,0);
        $this->Cell(-126,85,'LT : '.$donnee['taille'],0,0);
        $this->Cell(63,100,'Livraison : .............................',0,0);
        $this->Cell(63,100,'CI : ',0,0);
        $this->Cell(-126,100,'LP : '.$donnee['longueurpantalon'],0,0);
        $this->Cell(63,115,'',0,0);
        $this->Cell(63,115,'',0,0);
        $this->Cell(-126,115,'CT : '.$donnee['ceinture'],0,0);
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
    $num = $_GET['numero_facture'];
    $nom = $_GET['prenom_nom'];
    $pdf->Output();
?>