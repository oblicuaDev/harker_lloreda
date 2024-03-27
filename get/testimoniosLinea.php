<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$testimonios = $sdk->gTestimoniosLinea($_GET['idLinea']);

echo json_encode($testimonios);
