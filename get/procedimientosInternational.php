<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$procedimientos = $sdk->gProcedimientosInternational();
echo json_encode($procedimientos);