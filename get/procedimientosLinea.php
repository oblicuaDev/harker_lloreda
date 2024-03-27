<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$procedimientos = $sdk->gProcedimientosPorLinea($_GET["linea"]);
echo json_encode($procedimientos);