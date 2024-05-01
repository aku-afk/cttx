<?php

$table_par = $_GET['tpar'];
$table_val = $_GET['tval'];
$table_val = base64_decode($table_val);

if (empty($table_par) || empty($table_val)) {
  $out = [
    'res' => 'null'
  ];
  $out = json_encode($out, JSON_PRETTY_PRINT);
  die(print_r($out));
}

header('Content-Type: application/json; charset=utf-8');

include '../_bakul.php';
include '../_cfgx.php';

$sql = "SELECT *
        FROM `trfx_backup`
        WHERE `$table_par` = '$table_val'";

$res = mysqli_query($gate, $sql);

if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      $out[] = [
        'tgl' => $row['tgl'],
        'timestamp' => $row['timestamp'],
        'cat' => $row['cat'],
        'vcat' => $row['val_cat'],
        'ket' => $row['ket']
      ];
    }
  } else {
    $out = [
      'res' => 'null'
    ];
}

$out = json_encode($out, JSON_PRETTY_PRINT);


print_r($out);
