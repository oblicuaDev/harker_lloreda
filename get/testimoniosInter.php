<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$testimonios = $sdk->gTestimoniosInternational();
echo json_encode($testimonios);
