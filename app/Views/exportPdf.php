<?php
require('/opt/lampp/htdocs/MVC_PHP-v2/app/Views/fpdf184/fpdf.php');
session_start();

// Vérification de la session
if (!isset($_SESSION["matricule"])) {
    die("Erreur : aucune session active. Vérifie que les sessions sont bien configurées.");
}



// Fonction pour générer le relevé en PDF
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(190, 10, 'RELEVE DE NOTES CEPE', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$list = get_note($_SESSION["matricule"]);

$pdf->Cell(50, 10, "Matricule : ", 0, 0);
$pdf->Cell(50, 10, $_SESSION["matricule"], 0, 1);
$pdf->Cell(50, 10, "Nom et Prenom(s) : ", 0, 0);
$pdf->Cell(50, 10, $_SESSION["nom"] . " " . $_SESSION["prenom"], 0, 1);
$pdf->Cell(50, 10, "Etablissement : ", 0, 0);
$pdf->Cell(50, 10, $_SESSION["etablissement"], 0, 1);
$pdf->Cell(50, 10, "Annee Scolaire : ", 0, 0);
$pdf->Cell(50, 10, "2022-2023", 0, 1);
$pdf->Ln(10);

// Entête du tableau
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 10, 'Matiere', 1, 0, 'C');
$pdf->Cell(40, 10, 'Coefficient', 1, 0, 'C');
$pdf->Cell(40, 10, 'Note', 1, 0, 'C');
$pdf->Cell(40, 10, 'Note Ponderee', 1, 1, 'C');
$pdf->SetFont('Arial', '', 12);

foreach ($list as $x) {
    $pdf->Cell(60, 10, ($x["designMat"]), 1, 0, 'C');
    $pdf->Cell(40, 10, $x["coef"], 1, 0, 'C');
    $pdf->Cell(40, 10, $x["note"], 1, 0, 'C');
    $pdf->Cell(40, 10, $x["pondere"], 1, 1, 'C');

}
/*$totalPondere = 0;
foreach ($list as $x) {
    $totalPondere += $x["pondere"];
}*/
$totalPondere = 0;
$totalCoef = 0;

foreach ($list as $x) {
    $totalPondere += $x["pondere"];
    $totalCoef += $x["coef"];
}
$moyenne = ($totalCoef > 0) ? round($totalPondere / $totalCoef, 2) : 0;
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(140, 10, '', 'RT', 0, 'C'); // Fusionne 3 colonnes
$pdf->Cell(40, 10, $totalPondere, 1, 1, 'C'); // Affiche le total uniquement dans la dernière colonne
$pdf->Cell(140, 10, 'Moyenne', 1, 0, 'C'); // Même format pour aligner la moyenne
$pdf->Cell(40, 10, $moyenne, 1, 1, 'C'); // Affichage de la moyenne


$pdf->Output("D", "Releve_de_notes.pdf");
exit();
