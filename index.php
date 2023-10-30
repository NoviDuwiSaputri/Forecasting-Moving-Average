<?php 
    date_default_timezone_set("Asia/Jakarta");
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forecasting</title>
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="pustaka/bootstrap/css/bootstrap.min.css">
    <script src="skrip/jquery-3.6.0.min.js"></script>
    <script src="pustaka/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-light" id="navbarutama">
		<div class="container-md">
			<a class="navbar-brand text-white" href="index.php">Penjualan Ekspor PT. Gudang Garam Tbk</a>
		</div>
		<button class="navbar-toggler navbar-toggler-right d-sm-block d-lg-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-controls="navbarNav" aria-label="Toggle navigation" style="background: white">
            <span class="navbar-toggler-icon"></span>
        </button>
		
		<!-- Menu navbar -->
		<div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="lihat_data.php" class="nav-link text-white">Data</a></li>
            </ul>
        </div>
	</nav>

<!-- container -->
	<div class="container">
		<div class="row" style="background:#e8e8e8">
			<div class="col-lg-12">
			<section class="section-header">
				<!-- Ini row buat tulisan -->
				<div class="row">
					<div class="col">
						<h1>Selamat Datang</h1> <br>
						<p class="paragraph text-center">Anda telah memasuki aplikasi Peramalan Ekspor PT.Gudang Garam Tbk.</p>
					</div>
				</div>
			</section>
			
			<section class="section-ajakan">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <h1 class="text-white" id="judulajakan">Ayo lakukan peramalan dengan mudah</h1>
                    </div>
                    <div class="col-lg-8 col-sm-12">
						<div class="row">
							<div class="col">
                            <p class="paragraph1 text-white"> Untuk melakukan peramalan dapat dilakukan dengan mengklik tombol di bawah ini </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
								<a href="lihat_data.php" id="linklogin"><button class="btn btn-outline-light center-block" id="tomboldaftar">
								Lihat Data Sekarang</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			
			<section class="section-developer">
                <div class="row">
                    <!-- card pertama -->
                    <div class="col-lg-6 col-sm-12">
                    <!-- Class card itu ngikut dari Bootstrapnya yaw -->
                        <div class="card">
							<!-- Class gambar rounded-circle itu sama kayak foto Gubernur -->
							<img src="img/ava.png" id="pakgubernur" class="rounded-circle" height="175px" width="175px" alt="">
							<!-- Card body juga class dari Bootstrap, gaboleh yang lain -->
							<div class="card-body">
								<hr>
								<h5 class="card-title">
								Novi Duwi Saputri
								</h5>
								<p class="card-text">
								Sistem Informasi 2018 <br>
								180441100044
								</p>
							</div>
                        </div>
                    </div>

                    <!-- Card kedua -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <img src="img/ava.png" id="pakgubernur" class="rounded-circle" height="175px" width="175px" alt="">
                            <div class="card-body">
                                <hr>
                                <h5 class="card-title">
                                Oktavia Dwi Iswahyuni
								</h5>
                                <p class="card-text">
                                Sistem Informasi 2018 <br>
                                180441100048
                                </p>
                            </div>
                        </div>
                    </div>
				</div>
			</section>
			</div>
		</div>
	</div>

<!-- Tampilan Footer -->
	<footer style="margin-top: 0px;" id="footer">
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p style="color: #fff; font-family: Segoe UI; ">
                            &#169;Copyright 2021 Sistem Informasi</p>
                    </div>
                </div>
                
            </div>
        </div>
    </footer>

</body>
</html>