	<?php
	include "./../config.php";

		if(isset($_POST['simpan'])){
			$a1 = $_POST['alternatif1'];
			$l1 = $_POST['lensa1'];
			$f1 = $_POST['frame1'];
			$h1 = $_POST['harga1'];
			$m1 = $_POST['merk1'];

			$a2 = $_POST['alternatif2'];
			$l2 = $_POST['lensa2'];
			$f2 = $_POST['frame2'];
			$h2 = $_POST['harga2'];
			$m2 = $_POST['merk2'];


			$a3 = $_POST['alternatif3'];
			$l3 = $_POST['lensa3'];
			$f3 = $_POST['frame3'];
			$h3 = $_POST['harga3'];
			$m3 = $_POST['merk3'];


			$insert1=mysqli_query($koneksi,"insert into data value (NULL,'$a1','$l1','$f1','$h1','$m1')");
			$insert2=mysqli_query($koneksi,"insert into data value (NULL,'$a2','$l2','$f2','$h2','$m2')");
			$insert3=mysqli_query($koneksi,"insert into data value (NULL,'$a3','$l3','$f3','$h3','$m3')");


			//normalisasi lensa
			$maksl=mysqli_query($koneksi,"select max(lensa) as jl from data");
			$maklensa=Mysqli_fetch_array($maksl);

			$r11=  $l1 / $maklensa['jl'];
			$r21=  $l2 / $maklensa['jl'];
			$r31= $l3 / $maklensa['jl'];

			//normalisasi frame
			$maxf=mysqli_query($koneksi,"select max(frame) as maxf from data");
			$maxframe=Mysqli_fetch_array($maxf);

			$r12=$f1 / $maxframe['maxf'];
			$r22=$f2 / $maxframe['maxf'];
			$r32=$f3 / $maxframe['maxf'];


			//normalisasi harga
			$min=mysqli_query($koneksi,"select min(harga) as cost from data");
			$cost=Mysqli_fetch_array($min);

			$r13=$cost['cost'] / $h1 ; 
			$r23=$cost['cost'] / $h2 ;  
			$r33=$cost['cost'] / $h3 ;  

			//normalisasi merk
			$maxme=mysqli_query($koneksi,"select max(merk) as maxme from data");
			$maxmerk=Mysqli_fetch_array($maxme);

			$r14=$m1 / $maxmerk['maxme'];
			$r24=$m2 / $maxmerk['maxme'];
			$r34=$m3 / $maxmerk['maxme'];

			//input table normalisasi ban
			$n1=mysqli_query($koneksi,"insert into normalisasi value (NULL,'$a1','$r11','$r12','$r13','$r14')");
			$n2=mysqli_query($koneksi,"insert into normalisasi value (NULL,'$a2','$r21','$r22','$r23','$r24')");
			$n3=mysqli_query($koneksi,"insert into normalisasi value (NULL,'$a3','$r31','$r32','$r33','$r34')");

			//hasil jumlah normalisasi
			$atribut=mysqli_query($koneksi,"select * from bobot");
			$bobot=Mysqli_fetch_array($atribut);

			$v1=($r11*$bobot['lensa'])+($r12*$bobot['frame'])+($r13*$bobot['harga'])+($r14*$bobot['merk']);
			$v2=($r21*$bobot['lensa'])+($r22*$bobot['frame'])+($r23*$bobot['harga'])+($r24*$bobot['merk']);
			$v3=($r31*$bobot['lensa'])+($r32*$bobot['frame'])+($r33*$bobot['harga'])+($r34*$bobot['merk']);

			//input table rangking
			$a=mysqli_query($koneksi,"insert into ranking value (NULL,'$a1','$v1')");
			$b=mysqli_query($koneksi,"insert into ranking value (NULL,'$a2','$v2')");
			$c=mysqli_query($koneksi,"insert into ranking value (NULL,'$a3','$v3')");


			if($a){
				header ('Location: hasil.php');
			}else{
				echo 'Data Gagal di Input';
			}
		}
	?>