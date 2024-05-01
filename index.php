<?php

include './_bakul.php';
include './_cfgx.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test up</title>
</head>
<body>
    <form action="./api/ambil.php" method="post">
        <input type="hidden" name="fg" value="1">
        <input type="date" name="tgl" id="" placeholder="tgl"> <br>
        <select name="cat" id="">
            <option value="i">i</option>
            <option value="o">o</option>
        </select> <br>
        <input type="number" name="vcat" id="" placeholder="vcat"> <br>
        <textarea name="ket" id="" cols="30" rows="10"></textarea> <br>
        <input type="submit" name="kirim" value="kirim">
    </form>
</body>
</html>