<?php
include 'db_connection.php';
session_start();
?>

<?php
if (isset($_GET["id"]) && $_GET["id"] != '') {
    $check = TRUE;
    $app_id = $_GET["id"];
    $sql = "SELECT * FROM application a WHERE USER_ID=" . $_SESSION["USER_ID"] . " AND APPLICATION_ID=" . $app_id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $degree = $row["DEGREE"];
        $country = $row["COUNTRY"];
        $university = $row["UNIVERSITY"];
        $department = $row["DEPARTMENT"];
        $startDate = $row["DATE_START"];
        $endDate = $row["DATE_END"];
    } else {
        // FIXME
        echo "You are not supposed to be here :-)";
        exit();
    }
} else {
    exit();
}

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->ln(10);
$pdf->Cell(40,10,$university);
$pdf->ln(10);
$pdf->Cell(40,10,$department);
$pdf->ln(10);
$pdf->Output();
?>