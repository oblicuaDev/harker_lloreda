<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$testimonios = $sdk->gTestimoniosDoctor($_GET['idDoctor']);

echo json_encode($testimonios);
