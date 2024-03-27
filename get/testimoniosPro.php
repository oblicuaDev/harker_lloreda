<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$testimonios = $sdk->gTestimoniosPro($_GET['idPro']);

echo json_encode($testimonios);
