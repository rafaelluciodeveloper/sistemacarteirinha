
<?php

require_once('conexao.php');

include('../lib/phpqrcode/qrlib.php');

$codigo = $_GET['codigo'];

$resultado = mysqli_query($conexao, "SELECT * FROM alunos where codigo=$codigo");

$aluno = mysqli_fetch_assoc($resultado);


require('../lib/fpdf/fpdf.php');


$pdf = new FPDF('L', 'cm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 13);


$pdf->Image('../img/modelo_carteirinha.jpg', null, null, 10, 6);
$pdf->setY(11);
$pdf->setX(-23);

$pdf->setY(-19.1);
$pdf->setX(1.6);
$pdf->Image('../img/foto.jpg', null, null, 2.7, 3.4);

$pdf->setY(10);
$pdf->setX(4.7);
$pdf->Cell(16, -15, $aluno['nome']);

$pdf->setY(8.5);
$pdf->setX(4.7);
$pdf->SetFont('Courier', 'B', 9);
$pdf->Cell(16, -10, 'Universidade Exorcismo Vaticano ');


$pdf->setY(5);
$pdf->setX(-25);
$pdf->SetFont('Courier', 'B', 18);
$pdf->Cell(null,null,$aluno['matricula'] );

QRcode::png($aluno['matricula'], "../img/QR_code.png");

$pdf->setY(-16.5);
$pdf->setX(8);
$pdf->Image('../img/QR_code.png');



$pdf->Output();
?>