<?php
session_start();
/**
	 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
include 'edit-bobot.php';

if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin' ) ) {
	header('location:./../login.php');
	exit();
}
?>
<!-- memanggil header dan koneksi database-->
<?php
include 'header.php';
include './../config.php';
$query = mysqli_query($koneksi,"SELECT * FROM bobot");	
?>


<!-- bagian Body-->
<div class="container">

	
	<h2>Data Kriteria & nilai bobot</h2>
	<div class="panel panel-default">
		<div class="panel-heading">
		</div>
		<div class="panel-body">
			
			<table class="table table-bordered">
				<tr>
					<th colspan="4"><center>Bobot</center> </th>
					<th rowspan="2">Aksi</th>
				</tr>
				<tr>
					<th>Lensa</th>
					<th>Frame</th>
					<th>Harga</th>
					<th>Merk</th>
				</tr>
				<?php
					while ($data = mysqli_fetch_array($query)) { ?>
						
				<tbody id="myTable">
					<tr>
						<td><?php echo $data['lensa']?></td>
						<td><?php echo $data['frame']?></td>
						<td><?php echo $data['harga']?></td>
						<td><?php echo $data['merk']?></td>
						<td>
								<a href="#" id="edit_kriteria" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['id_bobot']?>" data-kriteria="<?php echo $data['lensa']?>" data-bobot="<?php echo $data['frame']?>" data-atribute="<?php echo $data['harga']?>" data-merk="<?php echo $data['merk']?>">
								<button class="btn btn-warning btn-sm">Edit</button>
								</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>	
			</table>
		</div>
		<?php 

		// seleksi apabila total bobot lebih dari seratus
		$total = mysqli_query($koneksi, "SELECT lensa + frame + harga + merk FROM bobot") or die(mysqli_error());
		$array_total = mysqli_fetch_array($total);


		 // seleksi apabila field bernilai nol 

		$totalPerField = mysqli_query($koneksi, "SELECT * FROM bobot") or die(mysqli_error());
		$seleksi = mysqli_fetch_array($totalPerField);

		if ($array_total[0] != 100 OR $seleksi[1] <= 0 OR $seleksi[2] <= 0 OR $seleksi[3] <= 0 OR $seleksi[4] <= 0 ): ?>
				<div class="panel-footer">
					<div class="alert alert-danger">
					    <strong>warning</strong> Total bobot harus = 100 dan tidak boleh ada field yang <= 0
					 </div>	
				</div>
		<?php endif; ?>
		
	</div>
</div>

<!--modal EDIT DATA-->
					<div class="modal fade" id="edit" role="dialog">
						<div class="modal-dialog">
							<form action="edit-bobot.php" method="POST">
							<!--modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title"><kbd>Edit Nilai Bobot</kbd></h3>
								</div>
								<div class="modal-body" id="modal-edit">
										<div class="form-group">
											<input type="hidden" name="id_kriteria"	class="form-control" id="id" >
										</div>
										<div class="form-group">
											<label for="kriteria">Lensa :</label>
											<input type="number" name="kriteria"	class="form-control"  placeholder="Input bobot lensa" id="kriteria">
										</div>
										<div class="form-group">
											<label for="bobot">Frame :</label>
											<input type="number" name="bobot"	class="form-control"  placeholder="Input bobot frame" id="bobot">
										</div>
										<div class="form-group">
											<label for="atribute">Harga :</label>
											<input type="number" name="atribute"	class="form-control"  placeholder="Input bobot harga" id="atribute">
										</div>
										<div class="form-group">
											<label for="merk">Merk :</label>
											<input type="number" name="merk"	class="form-control"  placeholder="Input bobot merk" id="merk">
										</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success" name="update">Update</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
							</form>
						</div>
					</div>
					<!-- selesai modal EDIT-->		

  <!-- script edit modal-->
  <script type="text/javascript">
  	$(document).on("click","#edit_kriteria", function(){
  		var id = $(this).data('id');
  		var kriteria = $(this).data('kriteria');
  		var bobot = $(this).data('bobot');
  		var atribute = $(this).data('atribute');
  		var merk = $(this).data('merk');
  		$("#modal-edit #id").val(id);
  		$("#modal-edit #kriteria").val(kriteria);
  		$("#modal-edit #bobot").val(bobot);
  		$("#modal-edit #atribute").val(atribute);
  		$("#modal-edit #merk").val(merk);
  	})
  </script>


<!-- memanggil footer-->
<?php
include 'footer.php';
?>