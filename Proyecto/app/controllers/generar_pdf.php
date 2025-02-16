
<?php

// Activar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir FPDF
require '../../libs/fpdf.php';
if(isset($_GET['id']) && isset($_GET['first_name']) && isset($_GET['last_name']) 
    && isset($_GET['email']) && isset($_GET['gender']) 
    && isset($_GET['ip_address']) && isset($_GET['telefono'])) {

    // Obtener los datos
    $id = htmlspecialchars($_GET['id']);
    $first_name = htmlspecialchars($_GET['first_name']);
    $last_name = htmlspecialchars($_GET['last_name']);
    $email = htmlspecialchars($_GET['email']);
    $gender = htmlspecialchars($_GET['gender']);
    $ip_address = htmlspecialchars($_GET['ip_address']);
    $telefono = htmlspecialchars($_GET['telefono']);

    // Crear el PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Detalles del Cliente', 0, 1, 'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'ID: ' . $id);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Nombre: ' . $first_name);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Apellido: ' . $last_name);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Email: ' . $email);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Genero: ' . $gender);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'IP Address: ' . $ip_address);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Telefono: ' . $telefono);

    $pdf->Output('I', 'detalle_cliente.pdf');
} else {
    echo "No se recibieron los datos necesarios.";
}
?>
