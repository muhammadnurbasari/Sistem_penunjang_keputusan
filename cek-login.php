<?php
	session_start();
	include 'config.php';

	if (isset($_POST['username']) && isset($_POST['password']) ) {
		$sql = "SELECT nama,level,id_user,username FROM user where username=? AND password=? LIMIT 1";

		$cek_log = $koneksi->prepare($sql);
		$cek_log-> bind_param('ss',$username,$password);

		$username = $_POST['username'];
		$password = $_POST['password'];

		$cek_log->execute();
		$cek_log->store_result();

		if ($cek_log->num_rows == 1) {
			$cek_log->bind_result($nama,$level,$id_user,$user);

			while ($cek_log->fetch()) {
				$_SESSION['nama']=$nama;
				$_SESSION['user_login']=$level;
				$_SESSION['sess_id']=$id_user;
				$_SESSION['user']=$user;
			}
			 $cek_log->close();
       		 header('location:on-'.$level);
        	exit();
    	} else {
        header('location: login.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    	}
   
	} else {
    header('location:login.php');
    exit();
}
?>