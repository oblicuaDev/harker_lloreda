<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$extra = $sdk->gExtraInfoHome();

echo json_encode($extra);