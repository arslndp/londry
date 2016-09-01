<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi laundry by Gambut - Network</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>/assets/css/home.css">
</head>
<body>
	<div class="nav">
		<div class="nav-left">
			ok Laundry 
		</div>
		<div class="nav-right">
			<ul>
				<li><a href="#login">Login</a></li>
				<li><a href="#daftar">Register</a></li>
				<li><a href="#aboutus">Tentang kita</a></li>
			</ul>
		</div>
	</div>
	<div class="bg-aboutus">
		<h1>OK LAUNDRY</h1>
		<p>Membersihkan hingga ke bulan</p>
	</div>
	<div id="aboutus">
		<center><h1>Tentang kita</h1></center>
		<p>
			Kami adalah tukang cuci baju terbaik seIndonesia,
			ok laundry lan telah berdiri dari tahun 1999 yg didirikan oleh Arsalan
			dan kini kami telah ada di lebih dari 200 kota se antero indonesia
			kami juga telah mendapatkan banyak pengharagaan di tingkat nasional dan internasional,
			anda dapat mempercayakan pakaiaan anda kepada kami ,
			pakaiaan yg rusak , jelek , bau , pudar dapat kami perbaiki menjadi pakaiaan yg lebih dari layak pakai
			kami juga telah di percaya oleh lebih dari 50 warga dunia yg mencuci bersama kami di hari buruh cuci dunia
			kami juga menerima jasa gosok dan jemur hinggan wantex jahit dan buat pakaiaan , 

		</p>
	</div>
	<div id='daftar'>
		<h1>ingin menjadi memeber(kustomer kami)?</h1>
		<form>
			username :
			<input type="text" required="required" name="username" class="form-daftar" placeholder="username..."><br/><br/>
			password :
			<input type="password" required="required" name="username" class="form-daftar" placeholder="password..."><br/><br/>
			Nama depan :
			<input type="text" required="required" name="nm_depan" class="form-daftar" placeholder="nama depan anda..."><br/><br/>
			Nama belakang :
			<input type="text" required="required" name="nm_belakang" class="form-daftar" placeholder="nama belakang anda..."><br/><br/>
			Email : 
			<input type="email" required="required" name="email" class="form-daftar" placeholder="email..."><br/><br/>
			<input type="checkbox" name="ok" value="ok">dengan mendaftar anda telah menyetujui peraturan<br/>
			<input type="submit" name="" class="btn-daftar" value="Daftar!">
		</form>
	</div>
	<div id="login">
	<h1>Login ke akun anda </h1>
	<?php 
		if($_GET['error'] == 'invalid_login'){ ?>
			<div class='badge-error'>invalid username atau password</div>
			<style>
			#login{
				height: 300px;
			}
			.login{
				border: 4px solid #E33939;
			}
			.login:hover{
				border:4px solid #fff;
			}
			</style>
	<?php }?>
		<form method="POST" action="proses_login.php">
			Username :
			<input type="text" name="username" class="form-daftar login" placeholder="Username"><br/><br/>
			Password :
			<input type="password" name="password" class="form-daftar login" placeholder="Password"><br/><br/>
			<input type="submit" name="login" value="Login" class="btn-login">
		</form>
	</div>
	<div class="footer">
		<div class="footer-top">
			<div class="footer-top-left">
				<h3>Get touch with us</h3>
				<ul>
					<li>+6289680837605</li>
					<li>http://www.facebook.com/blackman404</li>
					<li>http://arslndp.ml</li>
					<li>http://arslndp.github.io</li>
				</ul>
			</div>
			<div class="footer-top-right">
				<h3>Alamat</h3>
				<ul>
					<li>Gambut raya utara</li>
					<li>Desa kupukilen</li>
					<li>Depan gang Kelenci</li>
					<li>Gambutan 2 </li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
			<center><h4>Copyright Arslndp 2016</h4></center>
		</div>
	</div>
</body>
</html>
