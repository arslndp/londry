<?php
	session_start();
	require 'config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql_login = "SELECT login.* , karyawan.* FROM login
				  LEFT JOIN karyawan ON login.nik = karyawan.nik
				  WHERE login.Username = ? AND login.Password = md5(?)"; 
	$row_login = $PDO -> prepare($sql_login);
	$row_login -> execute(array($username,$password));
	$cekUser = $row_login -> rowCount();
	
	if ($cekUser > 0) {
		$hasil = $row_login -> fetch();
		$_SESSION['akun'] = $hasil;
		echo "<script>window.location='module/karyawan/'</script>";
	}else{
		echo "<script>window.location='index.php?error=invalid_login'</script>";
	}	
?>
