<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$procedimientos = $sdk->gProcedimientosPorCategoria($_GET["category"]);
echo json_encode($procedimientos);