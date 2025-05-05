<?php
require('../fpdf/fpdf.php');
session_start();
include '../db_conn.php';

if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['id'];
$quiz_result_id = $_GET['id']; // ID hasil quiz

// Ambil detail hasil quiz
$query = "
    SELECT 
        users.name AS user_name, 
        quizzes.quiz_name, 
        quiz_results.score 
    FROM 
        quiz_results
    JOIN 
        users ON quiz_results.user_id = users.id
    JOIN 
        quizzes ON quiz_results.quiz_id = quizzes.id
    WHERE 
        quiz_results.id = $quiz_result_id 
        AND quiz_results.user_id = $user_id 
        AND quiz_results.score >= 70
";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Sertifikat tidak tersedia untuk quiz ini.");
}

// Generate PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'SERTIFIKAT KELULUSAN',0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'Nama: ' . $data['user_name'],0,1,'C');
$pdf->Cell(0,10,'Quiz: ' . $data['quiz_name'],0,1,'C');
$pdf->Cell(0,10,'Skor: ' . $data['score'],0,1,'C');
$pdf->Ln(20);
$pdf->SetFont('Arial','I',12);
$pdf->Cell(0,10,'Neuronworks Learning Platform',0,1,'C');

$pdf->Output('I', 'Sertifikat_' . $data['quiz_name'] . '.pdf');
?>
