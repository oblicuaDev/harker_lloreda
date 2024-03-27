<?php 
include "../includes/sdk.php";
$sdk = new HarkerLloreda($_GET["lang"]);

$teamMembers = $sdk->gTeamMembers();

echo json_encode($teamMembers);