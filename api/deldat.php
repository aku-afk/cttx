<?php 

header('Content-Type: application/json; charset=utf-8');

include '../_bakul.php';
include '../_cfgx.php';

$vdelpar = $_POST['vdelpar'];

$proses = delData($gate, $vdelpar);
$res = json_encode($proses);

print_r($res);

?>