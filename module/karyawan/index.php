<?php session_start();
	require '../../config.php';
	include $url.'/template/head-karyawan.php';
?>
<div class="content">
<h2>Karyawan panel</h2>
	<div class="pane-kustomer">
		<a href="form.php?action=data-kustomer" style="text-decoration:none;color:#fff">
		<center><strong>manage data kustomer</strong></center>
		</a>
	</div>
	<div class="pane-transaksi">
		<a href="form.php?action=transaksi-kustomer" style="text-decoration:none;color:#fff">
		<center><strong>data transaksi kustomer</strong></center>
		</a>
	</div>
	<div class="pane-waiting">
		<a href="form.php?action=waiting-list" style="text-decoration:none;color:#fff">
		<center><strong>waiting list kustomer</strong></center>
		</a>
	</div>
	<div class="pane-rincian">
		<a href="form.php?action=rincian" style="text-decoration:none;color:#fff">
		<center><strong>rincian</strong></center>
		</a>
	</div>
	<div class="logs-activity">
		<h3>Logs activity</h3>
		<div class="content-logs-activity">
			
		</div>
	</div>
</div>
