<?php
	$u_mysql = 'root';
	$p_mysql = '';
	try {
		$PDO = new PDO('mysql:host=localhost;dbname=laundry',$u_mysql,$p_mysql);
	} catch (PDOException $e) {
		echo "server_down.php";
	}

	$url = 'http://localhost/belajar/laundry';
?>
