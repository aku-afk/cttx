<?php
$mod = null;
$mod = $_GET['mod'];
header('Content-Type: application/json; charset=utf-8');

include '../_bakul.php';
include '../_cfgx.php';

$sql = "SELECT *
        FROM `trfx_backup`";

$res = mysqli_query($gate, $sql);

if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      if ($mod == 'PRETTY_PRINT') {
        $out['res'][$row['tgl']][$row['cat']][] = [
          $row['timestamp'],
          $row['val_cat'],
          $row['ket']
        ];
      } elseif (($mod == 'RAW_PRINT')) {
        $out[] = [
          'tgl' => $row['tgl'],
          'timestamp' => $row['timestamp'],
          'cat' => $row['cat'],
          'vcat' => $row['val_cat'],
          'ket' => $row['ket']
        ];
      } else {
        $out['res'] = 'null';
      }

    }
  } else {
    $out = [
      'res' => 'null'
    ];
}

$out = json_encode($out, JSON_PRETTY_PRINT);


print_r($out);
