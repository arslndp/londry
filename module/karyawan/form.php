<?php
																	/*
  _____           __        __  _  __    __                  __  
 / ___/__ ___ _  / /  __ __/ /_/ |/ /__ / /__    _____  ____/ /__
/ (_ / _ `/  ' \/ _ \/ // / __/    / -_) __/ |/|/ / _ \/ __/  '_/
\___/\_,_/_/_/_/_.__/\_,_/\__/_/|_/\__/\__/|__,__/\___/_/ /_/\_\ 
											[!]coded by arsalan                          
																	*/

?>
<?php session_start();
	  $action = $_GET['action'];
	  require '../../config.php';
	  $no = '1';
	  if($action == ''){
	  	echo "<script>window.location='index.php'</script>";
	  }
?>
<?php if($action == 'data-kustomer'){ ?>
<?php
	$sql_lst_Kostumer = "SELECT * from tb_konsumen";
	$row_lst_Kostumer = $PDO -> prepare($sql_lst_Kostumer);
	$row_lst_Kostumer -> execute();
	$jumRow_lst_Kostumer = $row_lst_Kostumer -> fetchAll();
?>
<?php include $url.'/template/head-karyawan.php' ?>
<div class='beard-kustomer'>
<a href='index.php' class='beard_1'>Data kustomer</a> <a href='form.php?action=data-kustomer' class='beard_2'>List kustomer</a>
</div>
<div class='form-kustomer'>
<?php if($_GET['status'] == 'sukses'){ ?>
<div class='notif'>Sukses merubah</div>
<?php }?>
<?php if($_GET['status'] == 'gagal'){ ?>
<div class='notif'>Gagal merubah</div>
<?php }?>
<?php if($_GET['status'] == 'sukses_hapus'){ ?>
<div class='notif'>Berhasil menghapus</div>	
<?php }?>
<?php if($_GET['status'] == 'gagal_hapus'){ ?>
<div class='notif'>Gagal menghapus</div>
<?php }?>
<h3>List kustomer</h3>
<table class='table-kustomer'>
<tr>
	<td>No</td>
	<td>Nama</td>
	<td>Alamat</td>
	<td>Telp</td>
</tr>
<?php foreach ($jumRow_lst_Kostumer as $data) { ?>
<tr>
	<td><?php echo $no++ ?></td>
	<td><?php echo $data['nm_konsumen'] ?></td>
	<td><?php echo $data['alm_konsumen'] ?></td>
	<td><?php echo $data['telp_konsumen'] ?></td>
	<td><a href='form.php?action=edit&mode=change&user=<?php echo base64_encode($data['kode_konsumen']) ?>'>Edit</a> <a href='proses.php?action=hapus_kustomer&user=<?php echo base64_encode($data["kode_konsumen"]) ?>'>Hapus</a></td>
</tr>
<?php include $url.'/template/foot-karyawan.php' ?>
<?php }?>
</table>
</div>
<?php }?>
<?php if ($action == 'transaksi-kustomer') { ?>
<?php include $url.'/template/head-karyawan.php' ?>
<div class='form-kustomer'>
<table class='table-kustomer'>
<tr>
	<td>No</td>
	<td>Nama</td>
	<td>Tanggal transaksi</td>
	<td>Diskon</td>
	<td>Tanggal Ambil</td>
</tr>
<?php 
	$sql_pembayaran = "SELECT transaksi.* , tb_konsumen.*
					   FROM transaksi 
					   INNER JOIN tb_konsumen ON tb_konsumen.kode_konsumen = transaksi.kode_konsumen";
	$row_pembayaran = $PDO -> prepare($sql_pembayaran);
	$row_pembayaran -> execute();
	$jumRow_pembayaran = $row_pembayaran -> fetchAll();
?>
<?php foreach($jumRow_pembayaran as $data ){ ?>
<tr>
	<td><?php echo $no++ ?></td>
	<td><?php echo $data['nm_konsumen'] ?></td>
	<td><?php echo $data['tgl_transaksi'] ?></td>
	<td><?php echo $data['diskon'] ?></td>
	<td><?php echo $data['tgl_ambil'] ?></td>
</tr>
<?php }?>
</table>
</div>
<?php include $url.'/template/foot-karyawan.php' ?> 	
<?php }?>
<?php if ($action == 'waiting-list') { ?>
<?php include $url.'/template/head-karyawan.php' ?> 	  

<?php include $url.'/template/foot-karyawan.php' ?>
<?php }?>
<?php if ($action == 'rincian') { ?>
<?php include $url.'/template/head-karyawan.php' ?> 

<?php include $url.'/template/foot-karyawan.php' ?>
<?php include $url.'/template/foot-karyawan.php' ?>
<?php }?>

<?php if ($action == 'edit') { ?>
<?php include $url.'/template/head-karyawan.php' ?>
<?php $user = base64_decode($_GET['user']); ?>
<?php
	$sql_edit_kustomer = "SELECT * FROM tb_konsumen WHERE kode_konsumen = ?";
	$row_edit_kustomer = $PDO -> prepare($sql_edit_kustomer);
	$row_edit_kustomer -> execute(array($user));
	$jumRow_edit_kustomer = $row_edit_kustomer -> fetch(); 
?>
<div class='beard-kustomer'>
<a href='index.php' class='beard_1'>Data kustomer</a> <a href='form.php?action=data-kustomer' class='beard_2'>List kustomer</a><a class='beard_1'>Edit <?php echo $jumRow_edit_kustomer['nm_konsumen'] ?></a>
</div>

<div class='form-kustomer'>
<h2>Edit <?php echo $jumRow_edit_kustomer['nm_konsumen'] ?></h2>
<form method='POST' action='proses.php?user=<?php echo base64_encode($jumRow_edit_kustomer['kode_konsumen']) ?>&action=update_kust&q=edit_kustomer'>
	Nama : <input type='text' name='nm_konsumen' class='form-edit' value='<?php echo $jumRow_edit_kustomer['nm_konsumen'] ?>'/><br/><br/>
	Alamat : <input type='text' name='alm_konsumen' class='form-edit' value='<?php echo $jumRow_edit_kustomer['alm_konsumen'] ?>'/><br/><br/>
	Telp : <input type='text' name='telp_konsumen' class='form-edit' value='<?php echo $jumRow_edit_kustomer['telp_konsumen'] ?>'/><br/><br/>
	<input type='submit' class='btn-edit' value='Perbarui'/>
</form>
</div>
<?php include $url.'/template/foot-karyawan.php' ?>
<?php }?>
