<?php

header('Content-Type: application/json; charset=utf-8');

include '../_bakul.php';
include '../_cfgx.php';

function inData($gate, $data) {
        $sql = "INSERT INTO `trfx_backup` (`tgl`, `cat`, `val_cat`, `ket`)
        VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."');";
        $res = $gate->query($sql);
        return $res;
}

$fg = $_POST['fg'];

if ($fg == '1') {
        $tgl = $_POST['tgl'];
        $cat = $_POST['cat'];
        $vcat = $_POST['vcat'];
        $ket = $_POST['ket'];
        
        $cekval = [
                $tgl,
                $cat,
                $vcat,
                $ket
        ];
        
        for ($i=0; $i < 3; $i++) { 
                if ($cekval[$i] != null) {
                        $fb = 1;
                } else {
                        $fb = 0;
                }
        }
        
        if (($fb == 1) && ($fg == '1')) {
                if (inData($gate, $cekval)) {
                        $fg = null;
                        $res = [
                                'res' => 'ACC',
                                'msg' => 'form submit to database',
                                'con' => [
                                        $cekval
                                ]
                        ];
                        
                }
        } else {
                $res = [
                        'res' => 'ERR',
                        'msg' => 'form cannot empty',
                        'con' => [
                                $cekval
                        ]
                ];
        }
} else {
        $res = [
                'res' => 'ERR',
                'msg' => 'illegal input'
        ];
}

$out = json_encode($res, JSON_PRETTY_PRINT);
print_r($out);
unset($_POST);

?>