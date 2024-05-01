<?php

function numRp($val) {
    $format = number_format($val, 2, ',', '.');
    $res = "Rp $format";
    return $res;
}

function getFapi($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);      

    return $output;
}

function inData($gate, $data) {
    $sql = "INSERT INTO `trfx_backup` (`tgl`, `cat`, `val_cat`, `ket`)
    VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."');";
    $res = $gate->query($sql);
    return $res;
}

// UPDATE `trfx_backup` SET `tgl`='[value-1]',`timestamp`='[value-2]',`cat`='[value-3]',`val_cat`='[value-4]',`ket`='[value-5]' WHERE 1
function editData($gate, $vpar, $data) {
    $vpar = base64_decode($vpar);
    $sql = "UPDATE `trfx_backup`
            SET `tgl`='$data[0]',`cat`='$data[1]',`val_cat`='$data[2]',`ket`='$data[3]'
            WHERE `timestamp` = '$vpar'";
    $res = $gate->query($sql);
    return $res;
}

?>