<?php
require('dompdf/autoload.inc.php');
include('connection.php');
$id = $_GET['id'];
$sketch = mysqli_query($conn, "SELECT * FROM sketch s inner join lan l on s.select_language = l.lan_id where s.id=$id");
$sketch_data = mysqli_fetch_assoc($sketch);
$Doctor_img_path = "image_folder_for_sketch/" . $sketch_data['Doctor_image']; //echo $url;
$logo_img_path ="image_folder_for_logo/".$sketch_data['Doctor_logo'];//print_r($sketch_data);

$html = '<html><head>
<meta charset="UTF-8">

    <style>
    body {
        font-family: "Arial", sans-serif;
      }
    .logo_image{
        width:80px;
        height:80px;
    }
    .Doctor_image{
        width:400px;
        height:400px;
        filter: grayscale(100%);
    }
    </style>
</head>
<body>
        <img src="'. $logo_img_path.'" class="logo_image">
        <h1>Dispensary Name:-' . $sketch_data["Dispensary_Name"] . '</h1>
        <h1 class="" id="" >Name try this imagic library in this project :-' . $sketch_data['name'] . '</h1>
        <h1 class="" id="" >Degree name:-' . $sketch_data['Degree_name'] . '</h1>
        <h1 class="" id="" >Designation:-' . $sketch_data['Designation'] . '</h1>
        <h1 class="" id="" >Location :-' . $sketch_data['Location'] . '</h1>
        <img src="'. $Doctor_img_path .'" class="Doctor_image" style="filter: grayscale(100%);">
        <p>' . $sketch_data['language'] . '</p>
<body>';
$html .= "</body></html>";

use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('chroot', realpath(''));
$options->set('defaultFont', 'DejaVu Sans'); // Set the default font


$pdf = new Dompdf($options);

//echo $html;

$pdf->loadHtml($html);
$filename = 'my.pdf';
$pdf->render();

$folder = 'C:/xamppNEW/htdocs/MIdars_touch/pdf/';
$filename = $sketch_data['name'].'.pdf';
$filepath = $folder . $filename;

// Save the generated PDF to the specified folder
//file_put_contents($filepath, $pdf->output());
 
$pdfContent = $pdf->output();
//header('Content-type: application/pdf');//echo $pdfContent;//header('Content-Disposition: attachment; filename="' . $filename . '"');//echo $pdfContent;

$pdf->stream($filename, ['Attachment' => false]);
/*
<body>
        <img src="<?php echo $logo_img_path;?>" class="logo_image" width="50px"; height="50px";>
        <h1>Dispensary Name:- <?php echo $sketch_data["Dispensary_Name"]; ?></h1>
        <h1 class="" id="" >Name:-<?php echo $sketch_data['name']; ?> </h1>
        <h1 class="" id="" >Degree name:-<?php echo $sketch_data['Degree_name'];?></h1>
        <h1 class="" id="" >Designation:-<?php echo $sketch_data['Designation']; ?></h1>
        <h1 class="" id="" >Location :-<?php echo $sketch_data['Location'];?></h1>
        <p>Language:-<?php echo $sketch_data['language'];?></p>
        <img src="<?php echo $Doctor_img_path ;?>" class="Doctor_image" style="filter: grayscale(100%);">
<body>*/

?>
