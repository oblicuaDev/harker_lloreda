<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$gEmpresasConvenios = $sdk->gEmpresasConvenios();
echo json_encode($gEmpresasConvenios);