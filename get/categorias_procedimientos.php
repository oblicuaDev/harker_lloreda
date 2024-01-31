<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$categorias = $sdk->gCategoriasProcedimientos();

echo json_encode($categorias);