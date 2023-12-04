<?php
    session_start();
    include "sdk.php";
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'es';
    $sdk = new SDK($lang);