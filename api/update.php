<?php 

header('Content-Type: application/json; charset=utf-8');

include '../_bakul.php';
include '../_cfgx.php';

$datalist = [
    $_POST['tgl'],
    $_POST['cat'],
    $_POST['vcat'],
    $_POST['ket'],
    'vpar' => $_POST['tparval']
];

$proses = editData($gate, $datalist['vpar'], $datalist);
$res = json_encode($proses);

print_r($res);

?>