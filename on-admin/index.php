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
	<!--bagian body-->
	<div class="container">
		<div class="jumbotron">
			<h4><kbd>Apa Itu Dss?</kbd></h4>

			<blockquote>
				<p>
					Sistem pendukung keputusan (Inggris: decision support systems disingkat DSS) adalah bagian dari sistem informasi berbasis komputer (termasuk sistem berbasis pengetahuan (manajemen pengetahuan)) yang dipakai untuk mendukung pengambilan keputusan dalam suatu organisasi atau perusahaan.

					Dapat juga dikatakan sebagai sistem komputer yang mengolah data menjadi informasi untuk mengambil keputusan dari masalah semi-terstruktur yang spesifik.
				</p>
				<footer>Sumber : https://id.wikipedia.org/wiki/Sistem_pendukung_keputusan</footer>
			</blockquote>

			<h4><kbd>Apa Itu metode SAW?</kbd></h4>
			<blockquote>
				<p>
					Metode Simple Additive Weighting (SAW) sering juga
					dikenal istilah metode penjumlahan terbobot.
					Konsep dasar metode SAW adalah mencari
					penjumlahan terbobot dari rating kinerja pada setiap
					alternatif pada semua atribut (Fishburn,
					1967)(MacCrimmon, 1968). 
					<footer>Sumber : http://kaputama.ac.id/sites/default/files/Metode-SAW.pdf</footer>
				</p>
			</blockquote>
		</div>
	</div>
<?php
	include 'footer.php';
?>