<?php 
include './../config.php'; //file database yang sudah di buat

if (isset($_POST['update'])) {
 $id= $_POST['id_kriteria'];
 $kriteria= $_POST['kriteria'];
 $bobot= $_POST['bobot'];
 $atribute= $_POST['atribute'];
 $merk= $_POST['merk'];

 $query= mysqli_query($koneksi, "update bobot SET lensa = '$kriteria', frame = '$bobot', harga = '$atribute', merk = '$merk' where id_bobot = '$id'") or die(mysqli_error());

  echo "<script>
  document.location='kriteria.php';

  </script>";
 
}

?>