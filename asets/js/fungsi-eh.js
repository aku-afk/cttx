
function yakin(nama) {
   return confirm('YAKIN INGIN MENGHAPUS "' + nama + '" DARI TABEL ?');
}

function cancel() {
   return confirm('YAKIN INGIN MEMBATALKAN PERUBAHAN ?');
}

function metu() {
   if (cancel() == true) {
     window.location.href = "";
   }
}

function yend(opt) {
   if (opt == 1) {
      return confirm('YAKIN INGIN MENGAKHIRI SEMUA SESI ?');
   } else {
      return confirm('YAKIN INGIN MENGAKHIRI SESI INI ?');
   }
}

function logOut(opt) {
   if (opt == 1) {
      if (yend(1) == true) {
         window.location.href = "logout.php?end=1";
      }
   } else {
      if (yend(0) == true) {
         window.location.href = "logout.php?end=0";
      }
   }
}

