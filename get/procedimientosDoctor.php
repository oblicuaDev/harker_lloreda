<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$procedimiento = $sdk->gProcedimiento($_GET["idPro"]);
echo json_encode($procedimiento);