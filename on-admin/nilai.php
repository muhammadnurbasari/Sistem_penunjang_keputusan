<?php
session_start();
/**
	 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {
	header('location:./../login.php');
	exit();
}
?>
<?php
include 'header.php';
?>

<!-- bagian Body-->
<form method="POST" action="tambah-data.php">
	<div class="container-fluid">
		<div class="panel panel-default">
			<div class="panel-heading">
				<button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
			</div>
			<div class="panel-body">
				<div class="row">
					<!-- alternatif1-->
					<div class="col-sm-4">
					<h3><kbd>Alternatif 1</kbd></h3>
					<hr/>
					<div class="form-group">
						<label for="alternatif1">Input Alternatif</label>
						<input type="text" name="alternatif1" class="form-control" placeholder="Input Nama Alternatif">
					</div>
					<div class="form-group">
						<label for="lensa1">Pilih Jenis Lensa :</label>
						<select name="lensa1" class="form-control">
							<option selected disabled>--</option>
							<option value="40">Kaca</option>
							<option value="30">Mika</option>
						</select>
					</div>
					<div class="form-group">
						<label for="frame1">Pilih Nilai Warna Frame :</label>
						<select name="frame1" class="form-control">
							<option selected disabled>--</option>
							<option value="30">Sangat Menarik</option>
							<option value="20">Menarik</option>
							<option value="10">Tidak Menarik</option>
						</select>
					</div>
					<div class="form-group">
						<label for="harga1">Input Harga</label>
						<input type="number" name="harga1" class="form-control">
					</div>
					<div class="form-group">
						<label for="merk1">Merk :</label>
						<select name="merk1" class="form-control">
							<option selected disabled>--</option>
							<option value="20">Ternama</option>
							<option value="10">Biasa Saja</option>
						</select>
					</div>
					</div>

					<!-- alternatif2-->
					<div class="col-sm-4">
					<h3><kbd>Alternatif 2</kbd></h3>
					<hr/>
					<div class="form-group">
						<label for="alternatif2">Input Alternatif</label>
						<input type="text" name="alternatif2" class="form-control" placeholder="Input Nama Alternatif">
					</div>
					<div class="form-group">
						<label for="lensa2">Pilih Jenis Lensa :</label>
						<select name="lensa2" class="form-control">
							<option selected disabled>--</option>
							<option value="40">Kaca</option>
							<option value="30">Mika</option>
						</select>
					</div>
					<div class="form-group">
						<label for="frame2">Pilih Nilai Warna Frame :</label>
						<select name="frame2" class="form-control">
							<option selected disabled>--</option>
							<option value="30">Sangat Menarik</option>
							<option value="20">Menarik</option>
							<option value="10">Tidak Menarik</option>
						</select>
					</div>
					<div class="form-group">
						<label for="harga2">Input Harga</label>
						<input type="number" name="harga2" class="form-control">
					</div>
					<div class="form-group">
						<label for="merk2">Merk :</label>
						<select name="merk2" class="form-control">
							<option selected disabled>--</option>
							<option value="20">Ternama</option>
							<option value="10">Biasa Saja</option>
						</select>
					</div>
					</div>

					<!-- alternatif3-->
					<div class="col-sm-4">
					<h3><kbd>Alternatif 3</kbd></h3>
					<hr/>
					<div class="form-group">
						<label for="alternatif3">Input Alternatif</label>
						<input type="text" name="alternatif3" class="form-control" placeholder="Input Nama Alternatif">
					</div>
					<div class="form-group">
						<label for="lensa3">Pilih Jenis Lensa :</label>
						<select name="lensa3" class="form-control">
							<option selected disabled>--</option>
							<option value="40">Kaca</option>
							<option value="30">Mika</option>
						</select>
					</div>
					<div class="form-group">
						<label for="frame3">Pilih Nilai Warna Frame :</label>
						<select name="frame3" class="form-control">
							<option selected disabled>--</option>
							<option value="30">Sangat Menarik</option>
							<option value="20">Menarik</option>
							<option value="10">Tidak Menarik</option>
						</select>
					</div>
					<div class="form-group">
						<label for="harga3">Input Harga</label>
						<input type="number" name="harga3" class="form-control">
					</div>
					<div class="form-group">
						<label for="merk3">Merk :</label>
						<select name="merk3" class="form-control">
							<option selected disabled>--</option>
							<option value="20">Ternama</option>
							<option value="10">Biasa Saja</option>
						</select>
					</div>
					</div>


				</div>
			</div>	
		</div>
	</div>
</form>


<!-- memanggil footer-->
<?php
include 'footer.php';
?>