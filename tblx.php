<?php

include './_bakul.php';
include './_cfgx.php';

$datalist = json_decode(getFapi('http://localhost/cttx/api/vdat.php?mod=RAW_PRINT'), true);

/*
echo "<pre>";
print_r($getdata[1]);
echo "</pre>";
*/

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CATET PERTIK</title>
    <link href="./asets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./asets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./asets/css/customan.css">
    <link rel="stylesheet" href="./asets/css/dataTables.bootstrap5.min.css">
  </head>
  <body class="mb-5">
    <div class="container mt-3">
        <div class="mb-5">
            <ul class="nav nav-tabs">
             <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">CATET PETRIK</a>
             </li>
            </ul>
        </div>

        <?php /* include'sajadah/alert.php'; */ ?>
        
        <div class="mt-5">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new"><i class="fa fa-plus"></i> <span style="margin-left: 10px;">TAMBAH CATETAN</span></button>
        </div>

        <div class="container mt-5" style="overflow: auto;">
            <table class="table table-hover" id="list">
              <thead>
                <tr>
                  <th scope="col" width="2%">TANGGAL</th>
                  <th scope="col" width="3%">KATEGORI</th>
                  <th scope="col" width="20%">JUMLAH</th>
                  <th scope="col" width="30%">KETERANGAN</th>
                  <th scope="col" class="text-center" width="2%"></th>
                  <th scope="col" class="text-center" width="2%"></th>
                </tr>
              </thead>
              <tbody>
                <!-- EDIT -->
                <?php
                if (isset($_POST['edit'])) {
                  $id = $_POST['idb'];
                  // SELECT * FROM `trfx_backup`WHERE `timestamp` = '2024-04-26 23:02:22';
                  $getdata = json_decode(getFapi('http://localhost/cttx/api/select.php?tpar=timestamp&tval='.$id), true);
                  $getdata = $getdata[0];
                  if ($getdata['cat'] == 'i') {
                    $itru = 'selected';
                  } elseif ($getdata['cat'] == 'o') {
                    $otru = 'selected';
                  }
                ?>
                <script>console.log('<?= $getdata ?>')</script>
                <tr id="<?= $id ?>" class="bg-success" style="--bs-bg-opacity: 45%;">
                <form id="editdata" action="#" method="POST">
                  <input type="hidden" name="tparval" value="<?= $id ?>">
                  <th scope="row">
                    <input type="date" class="form-control" name="tgl" value="<?= $getdata['tgl'] ?>" placeholder="TANGGAL" required>
                  </th>
                  <td>
                    <select name="cat" class="form-control" id="cat" required>
                        <option value="i" <?= $itru?> >MASUK</option>
                        <option value="o" <?= $otru?> >KELUAR</option>
                    </select>
                  </td>
                  <td>
                    <input type="number" class="form-control" name="vcat" value="<?= $getdata['vcat'] ?>" placeholder="JUMLAH (CONTOH : 2500)" required>  
                  </td>
                  <td>
                    <textarea name="ket" class="form-control" id="" cols="30" rows="5"><?= $getdata['ket'] ?></textarea>
                  </td>
                  <td  class="text-center">
                    <button name="ubah" type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> </button>
                  </td>
                  <td  class="text-center">
                    <button onclick="metu()" type="button" class="btn btn-danger"> <i class="fa fa-close"></i> </button>
                  </td>
                </form>
                </tr>
                <?php
                }
                ?>
                <!-- EOL EDIT -->

                <!-- VIEW DATA -->
                <?php
                foreach ($datalist as $dl => $val) {
                  $idtime = base64_encode($val['timestamp']);
                ?>
                <tr id="<?= $idtime ?>">
                  <th scope="row"><?=  $val['tgl'] ?></th>
                  <td><center><?= $val['cat'] ?></center></td>
                  <td><pre><?= numRp($val['vcat']) ?></pre></td>
                  <td><pre><?= $val['ket'] ?></pre></td>
                  <td  class="text-center">
                    <form method="POST" action="<?= '#'.$idtime ?>">
                      <input type="hidden" name="idb" value="<?= $idtime ?>">
                      <button name="edit" type="submit" class="btn btn-success"> <i class="fa fa-pencil"></i> </button>
                    </form>
                  </td>
                  <td  class="text-center">
                    <form onSubmit="return yakin('')" method="POST" action="">
                      <button name="del" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                    </form>
                  </td>
                </tr>
                <?php 
                }
                ?>
                <!-- EOL VIEW DATA -->

              </tbody>
            </table>
        </div>

        <div class="modal fade" id="new" tabindex="-1" aria-labelledby="new" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form method="post" action="">
                <div class="modal-header">
                  <h5 class="modal-title">CATET BANG</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label">TANGGAL</label>
                      <input type="date" class="form-control" name="tgl" placeholder="pilih tanggal" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">KATEGORI</label>
                      <select name="cat" class="form-control" id="cat" required>
                        <option value="i">PEMASUKAN</option>
                        <option value="o">PENGELUARAN</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">JUMLAH</label>
                      <input type="number" class="form-control" name="vcat" placeholder="Jumlah uang (CONTOH : 2500)" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">KETERANGAN</label>
                      <textarea name="ket" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="tambah" class="btn btn-success">CATET</button>
                </div>
              </form>
            </div>
          </div>
        </div>

    </div>
    <script src="./asets/js/bootstrap.bundle.min.js"></script>
    <script src="./asets/js/fungsi-eh.js"></script>
    <!-- script src="swal/dist/sweetalert2.all.min.js"></script -->

    <script src="./asets/js/jquery-3.5.1.js"></script>
    <script src="./asets/js/jquery.dataTables.min.js"></script>
    <script src="./asets/js/dataTables.bootstrap5.min.js"></script>
    <script src="./asets/js/dataTables.select.js"></script>
    <script>
        $(document).ready(function () {
            $('#list').dataTable({
                aLengthMenu: [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                iDisplayLength: 10
            });
        });

        $(function() {
            $('form#editdata').on('submit', function(e) {
                $.post('./api/update.php', $(this).serialize(), function (data) {
                  console.log('edited kah?');
                }).error(function() {
                    console.log('error cok');
                });
                e.preventDefault();
            });
        });
    </script>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg> 

  </body>
</html>