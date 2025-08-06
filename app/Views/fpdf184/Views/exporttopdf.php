<?php
session_start();
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Relevé de Notes CEPE', 1, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);

 /*// Vérifier si les variables de session existent
if(isset($_SESSION["matricule"], $_SESSION["nom"], $_SESSION["prenom"], $_SESSION["etablissement"])) {
    $pdf->Cell(0, 10, "Matricule: " . $_SESSION["matricule"], 0, 1);
    $pdf->Cell(0, 10, "Nom et Prénom(s): " . $_SESSION["nom"] . " " . $_SESSION["prenom"], 0, 1);
    $pdf->Cell(0, 10, "Établissement: " . $_SESSION["etablissement"], 0, 1);
    $pdf->Cell(0, 10, "Année Scolaire: 2022-2023", 0, 1);
} else {
    $pdf->Cell(0, 10, "Aucune donnée disponible.", 0, 1);
}*/

$pdf->Output('I', 'releve_notes.pdf'); // Afficher le PDF dans le navigateur
exit;
?>
