<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);
$gAntesDespues = $sdk->gAntesDespues($_GET['id']);
echo json_encode($gAntesDespues);