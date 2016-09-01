<?php 
	require '../../config.php';
	$action = $_GET['action'];
	$q = $_GET['q'];
	$user = base64_decode($_GET['user']);

	if($action == 'hapus_kustomer'){
		$sql = "DELETE FROM tb_konsumen WHERE kode_konsumen = ?";
		$row = $PDO -> prepare($sql);
		$row -> execute(array($user));
		if($row){
			echo "<script>window.location='form.php?action=data-kustomer&status=sukses_hapus'</script>";
		}else{
			echo "<script>window.location='form.php?action=data-kustomer&status=gagal_hapus'</script>";
		}
	}

	if($action == 'update_kust'){
		//definisikan
		$nm_konsumen = $_POST['nm_konsumen'];
		$alm_konsumen = $_POST['alm_konsumen'];
		$telp_konsumen = $_POST['telp_konsumen'];

		//di jadikan array terlebih dahulu
		$data[] = $nm_konsumen;
		$data[] = $telp_konsumen;
		$data[] = $alm_konsumen;
		$data[] = $user;

		//query
		$sql_update_kust = "UPDATE tb_konsumen SET 
							nm_konsumen = ?, 
							alm_konsumen = ?, 
							telp_konsumen = ? 
							WHERE 
							tb_konsumen.kode_konsumen = ?";
		$row = $PDO -> prepare($sql_update_kust);
		$row -> execute($data);
		if($row){
			echo "<script>window.location='form.php?action=data-kustomer&status=sukses'</script>";
		}else{
			echo "<script>window.location='form.php?action=data-kustomer&status=gagal'</script>";	
		}
	}
?>
