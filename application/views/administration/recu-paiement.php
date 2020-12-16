<?php

//$fichier= fopen(base_url() . 'assets/Admin/quittanceLoyer/fpdf.php', 'r');
//var_dump($fichier);
require(base_url() . 'assets/Admin/quittanceLoyer/fpdf.php');

class PDF extends FPDF {

    function addQuittance() {
        //Propriétaire Bailleur
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(95, 7, "Bailleur", 1, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(95, 5, utf8_decode("Propriétaire Bailleur :"), 'LR', 1, 'L');
        $this->Cell(95, 5, "Adresse :", 'LR', 1, 'L');
        $this->Cell(95, 5, utf8_decode("N° téléphone :"), 'LRB', 1, 'L');

        $this->ln(1); //Saut de ligne
        $this->Cell(100); // Décalage de 10 cm à droite
        //Locataire
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(90, 7, "Locataire Destinataire", 1, 1, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(100); // Décalage de 10 cm à droite
        $this->Cell(90, 5, "Locataire :", 'LR', 1, 'L');
        $this->Cell(100); // Décalage de 10 cm à droite
        $this->Cell(90, 5, "Adresse :", 'LR', 1, 'L');
        $this->Cell(100); // Décalage de 10 cm à droite
        $this->Cell(90, 5, utf8_decode("N° téléphone :"), 'LRB', 1, 'L');

        $this->ln(5); //Saut de ligne
        //Titres
        $this->SetFont('Arial', 'B', 20);
        $this->SetTextColor(110); //Couleur grise
        $this->Cell(0, 10, "Quittance de Loyer", 0, 1, 'C');

        $this->SetTextColor(0); //Réinitialisation de la couleur du texte

        $this->SetFont('Arial', 'B', 13);
        $this->Cell(0, 10, "Loyer de Janvier 2019", 0, 1, 'C');
        $this->SetFont('Arial', 'BI', 10);
        $this->Cell(0, 6, utf8_decode("Quitttance de loyer N° 254"), 0, 1, 'R');

        //Contenu du reçu
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 8, utf8_decode("Reçu de : Etoumi Bertrand"), 'TLR', 1, 'L');
        $this->Cell(0, 8, utf8_decode("La somme de : " . $_SESSION['montant'] . " Francs CFA"), 'LR', 1, 'L');
        $this->Cell(120, 8, utf8_decode("Payée le : " . $_SESSION['datePaiement']), 'L', 0, 'L');
        $this->Cell(70, 8, utf8_decode("Fait à Abidjan, le " . $_SESSION['datePaiement']), 'R', 1, 'C');
        $this->Cell(120, 8, utf8_decode("Pour loyer et accessoires des locaux sis à :"), 'L', 0, 'L');
        $this->Cell(70, 8, utf8_decode("Propriétaire Bailleur"), 'R', 1, 'C');
        $this->Cell(0, 5, utf8_decode("Gonzagueville Maquis Zouglou"), 'LR', 1, 'L');
        $this->Cell(0, 10, utf8_decode("En paiement du terme du " . $_SESSION['dateDebut'] . " au " . $_SESSION['dateFin']), 'LRB', 1, 'L');
    }

    function addTraitSeparation() {
        $this->ln(8);
        $this->SetTextColor(110); //Couleur grise
        $this->Cell(0, 1, "- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -", 0, 1, 'C');
        $this->SetTextColor(0); //Réinitialisation de la couleur du texte
        $this->ln(8);
    }

}

//Instanciation de la classe dérivée
$pdf = new PDF();

//Ajout de la page pdf
$pdf->AddPage();

//Titre du document
$pdf->SetTitle("Quittance de loyer", true);

//Contenu du reçu
$pdf->addQuittance();
$pdf->addTraitSeparation();
$pdf->addQuittance();

header("Cache-Control: public, must-revalidate");
header("Pragma: hack");

//Génération du document
$pdf->Output('I', 'Quittance de loyer.pdf', true);
?>