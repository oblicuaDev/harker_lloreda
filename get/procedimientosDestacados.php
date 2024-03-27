<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$procedimientos = $sdk->gProcedimientosDestacados();
echo json_encode($procedimientos);