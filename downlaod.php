<?php
require('dompdf/autoload.inc.php');
include('connection.php');
// $id = $_GET['id'];
// $sketch = mysqli_query($conn, "SELECT * FROM sketch s inner join lan l on s.select_language = l.lan_id where s.id=$id");
// $sketch_data = mysqli_fetch_assoc($sketch);
// $Doctor_img_path = "image_folder_for_sketch/" . $sketch_data['Doctor_image']; //echo $url;
// $logo_img_path ="image_folder_for_logo/".$sketch_data['Doctor_logo'];//print_r($sketch_data);

$html = '<html><head>
<meta charset="UTF-8">
<style>
*{
    margin: 0;
    padding:0;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAHAYATYA 24x7</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body style="text-align: center;">
    <div class="logo_cover" style="position:absolute;top:140px;width:100%;text-align: center;">
    <img src="images/logo-dark.png" alt="logo" style="max-width:70px;height:auto;">
    <h1 style="font-size: 18px;color: #2f2884;">RAVI TIWARI</h1>  
    <h1 style="font-size: 16px;color: #2f2884;letter-spacing: 1.5px;margin-top: 10px;">EYE SPECIALIST</h1>  
    <p style="max-width:300px;color: #2f2884;font-size:14px;margin: auto;"> B-003, Star Premier -1/B,C, Indralok Phase-5, Annapurna Estate, Bhayander(East)</p>
    </div>
    <img src="images/banner_midas.png" style="position:absolute;left:0;top:0;z-index:-1;height:100%;margin:auto;width:100%;" alt="banner_midas">
';
$html .= "</body></html>";
//echo $html;

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('chroot', realpath(''));
$options->set('defaultFont', 'DejaVu Sans'); // Set the default font


$pdf = new Dompdf($options);

// //echo $html;

$pdf->loadHtml($html);
// $filename = 'my.pdf';
$pdf->render();

// $folder = 'C:/xamppNEW/htdocs/MIdars_touch/pdf/';
$filename = 'ram.pdf';
// $filepath = $folder . $filename;

// // Save the generated PDF to the specified folder
// //file_put_contents($filepath, $pdf->output());
 
// $pdfContent = $pdf->output();
header('Content-type: application/pdf');//echo $pdfContent;//header('Content-Disposition: attachment; filename="' . $filename . '"');//echo $pdfContent;

$pdf->stream($filename, ['Attachment' => false]);
?>
