<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$preguntas = $sdk->gPreguntasProcedimiento();
echo json_encode($preguntas);