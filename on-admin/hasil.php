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
include './../config.php'
?>
<div class="container">
    <div class="row">
        <div class="box">
        	<a href="index.php" toggle-target="#trunc_ban" class="btn btn-primary btn-lg">Selesai</a><hr/>
        	<h3 class="text-center"><kbd>Record Data</kbd></h3>
			<table class="table table-bordered table-striped">
            <thead>
				<tr>
					<th>Alternatif</th>
					<th>Lensa</th>
					<th>Frame</th>
					<th>Harga</th>
					<th>Merk</th>
                </tr>
            </thead>
				<tbody>
					<?php
						$query = mysqli_query($koneksi,"select * from data") or die (mysqli_error());
						if(mysqli_num_rows($query) == 0)
						{
							echo "<b>Data Not Avaible</b>";
						}
						else
						{
							while($result = mysqli_fetch_array($query)):
					?>			
					<tr>
						<td><?php echo $result['alternatif']; ?></td>
						<td><?php echo $result['lensa']; ?></td>
						<td><?php echo $result['frame']; ?></td>
						<td><?php echo $result['harga']; ?></td>
						<td><?php echo $result['merk']; ?></td>
					</tr>
					<?php
						endwhile;
						}
					?>
                </tbody>
			</table><br>
			<h3 class="text-center"><kbd>Normalisasi Data</kbd></h3>
			<table class="table table-bordered table-striped">
            <thead>
				<tr>
					<th>Alternatif</th>
					<th>Lensa</th>
					<th>Frame</th>
					<th>Harga</th>
					<th>Merk</th>
                </tr>
            </thead>
				<tbody>
					<?php
						$query = mysqli_query($koneksi,"select * from normalisasi") or die (mysqli_error());
						if(mysqli_num_rows($query) == 0)
						{
							echo "<b>Data Not Avaible</b>";
						}
						else
						{
							while($result = mysqli_fetch_array($query)):
					?>			
					<tr>
						<td><?php echo $result['alternatif']; ?></td>
						<td><?php echo $result['lensa']; ?></td>
						<td><?php echo $result['frame']; ?></td>
						<td><?php echo $result['harga']; ?></td>
						<td><?php echo $result['merk']; ?></td>
					</tr>
					<?php
						endwhile;
						}
					?>
                </tbody>
			</table><br>
			<h3 class="text-center"><kbd>Rekomendasi Sistem</kbd></h3>
			<table class="table table-bordered table-striped">
            <thead>
				<tr>
					<th>Alternatif</th>
					<th>Point</th>
                </tr>
            </thead>
				<tbody>
					<?php
						$query = mysqli_query($koneksi,"select * from ranking order by point desc") or die (mysqli_error());
						if(mysqli_num_rows($query) == 0)
						{
							echo "<b>Data Not Avaible</b>";
						}
						else
						{
							while($result = mysqli_fetch_array($query)):
					?>			
					<tr>
						<td><?php echo $result['alternatif']; ?></td>
						<td><?php echo  number_format($result['point'],2); ?></td>
					</tr>
					<?php
						endwhile;
						}
					?>
                </tbody>
			</table><br>
		</div>
	</div>
</div>

<div id="trunc_ban">
<?php
 	$data=mysqli_query($koneksi, "Truncate table data");
 	$normalisasi=mysqli_query($koneksi, "Truncate table normalisasi");
 	$ranking=mysqli_query($koneksi, "Truncate table ranking");
 ?>
</div>

<!-- memanggil footer-->
<?php
include 'footer.php';
?>
