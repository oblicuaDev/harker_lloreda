<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$destacados = $sdk->gEquipoDestacadoHome();

echo json_encode($destacados);