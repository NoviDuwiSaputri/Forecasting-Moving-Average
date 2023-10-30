<?php
	// memulai session
    session_start();
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
							<h1>Data Aktual</h1>
						</div>
					</div>
					
					<?php
						//Include file koneksi, untuk koneksikan ke database
						include "koneksi.php";
						
						//Fungsi untuk mencegah inputan karakter yang tidak sesuai
						function input($data) {
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
						//Cek apakah ada kiriman form dari method post
						if (isset($_POST["Submit"])) {
							$tahun=input($_POST["tahun"]);
							$aktual=input($_POST["aktual"]);
							
							//Query input menginput data kedalam tabel pendaftaraan
							$sql="INSERT INTO ma (tahun,aktual) VALUES ('$tahun','$aktual')";
							
							//Mengeksekusi/menjalankan query diatas
							$hasil=mysqli_query($conn,$sql);

							//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
							if ($hasil) { 
								echo "<div class='alert alert-success'> Data aktual $tahun telah tersimpan.</div>"; 
							}
							else {
								echo "<div class='alert alert-danger'> Gagal Tersimpan</div>";
							}
						}
					?>
					<form action="" id="form" method="post" enctype="multipart/form-data">
						<div class="alert alert-primary">
							<strong>Input Data Aktual</strong>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<input type="text" name="tahun" id="tahun" class="form-control" placeholder="Masukan Tahun"
									maxlength="16" required oninvalid="this.setCustomValidity('Tahun Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="form-group">
									<input type="text" name="aktual" id="aktual" class="form-control" placeholder="Masukan Data Aktual" maxlength="16" required oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<button type="submit" name="Submit" id="Submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-secondary">Reset</button>
							</div>
						</div>
					</form>
					<br>
				</section>
				
				<section class="section-tabel">
					<h1 class="judul">Moving Average</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" id="tahun" class="text-center">Tahun</th>
                                        <th scope="col" id="aktual" class="text-center">Data Aktual</th>
                                        <th scope="col" id="fore_3">Fore 3 Bln</th>
                                        <th scope="col" id="fore_6">Fore 6 Bln</th>
                                        <th scope="col" id="mse_3">MSE 3 Bln</th>
                                        <th scope="col" id="mse_6">MSE 6 Bln</th>
                                    </tr>
                                </thead>
								<tbody>
									<!-- awal proses menampilkan -->
									 <?php
									 $no=1;
									 $sql = "SELECT*FROM ma ORDER BY id ASC";
									 $result = $conn->query($sql);
									 while($row = $result->fetch_assoc()) {
									 ?>
										 <tr>
											<td><?= $no++; ?></td>
											<td><?php echo $row['tahun']; ?></td>
											<td><?php echo $row['aktual']; ?></td>
											<td><?php echo $row['fore_3']; ?></td>
											<td><?php echo $row['fore_6']; ?></td>
											<td><?php echo $row['mse_3']; ?></td>
											<td><?php echo $row['mse_6']; ?></td>
										 </tr>
									 <?php
										 }
									 ?>
									 <!-- akhir proses menampilkan -->
								   </tbody>
							</table>
						</div>
						<div class="col-sm-8">
							<form id="form" method="post">
								<button type="submit" name="ramal" id="ramal" class="btn btn-primary">Forecasting</button>
							</form>
							<br>
							<?php
								require "koneksi.php";
								if (isset($_POST["ramal"])){
									peramalan();
								}
							?>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	
	<?php
		require "koneksi.php";
		function peramalan(){
			global $conn;
			
			$sql = mysqli_query($conn, "SELECT * FROM ma");

			while($row = mysqli_fetch_array($sql)) {
				$id[] = $row['id'];
				$data[] = $row['aktual'];
			}
			
			$fore3 = [];
			$fore6 = [];
			$mse = [];
			
			for($i=0; $i<3; $i++) {
				$fore3[$i] = 0;
				$mse3[$i] = 0;
			}
			
			for($i=0; $i<count($data); $i++){
				if($i + 2 == count($data))
					break;
				$fore3[$i+3]=round(($data[$i]+$data[$i+1]+$data[$i+2])/3);
				$mse3[$i+3]=($data[$i+3]-$fore3[$i+3]) * ($data[$i+3]-$fore3[$i+3]);error_reporting(0);
			}
			
			echo "<b>Hasil Forecasting 3 Pada Tahun Berikutnya: ".$fore3[$i+2]."</b>";
			
			for($i=0; $i<6; $i++){
				$fore6[$i] = 0;
				$mse6[$i] = 0;
			}
			
			for($i=0; $i<count($data); $i++){
				if($i + 5 == count($data))
					break;
					$fore6[$i+6]=round(($data[$i]+$data[$i+1]+$data[$i+2]+$data[$i+3]+$data[$i+4]+$data[$i+5])/6);
					$mse6[$i+6]=($data[$i+6]-$fore6[$i+6]) * ($data[$i+6]-$fore6[$i+6]); error_reporting(0);
			}
				
			echo "<br><b>Hasil Forecasting 6 Pada Tahun Berikutnya: ".$fore6[$i+5]."</b>";

			for($i=0; $i<count($data); $i++){
				mysqli_query($conn, "UPDATE ma SET fore_3 = '$fore3[$i]', fore_6 = '$fore6[$i]', mse_3 = '$mse3[$i]',
							mse_6 = '$mse6[$i]' WHERE id = '$id[$i]'");
			}
			
			$sql = mysqli_query($conn, "SELECT * FROM ma");
			
			while($row = mysqli_fetch_array($sql)) {
				$data_mse_3[] = $row['mse_3'];
				$data_mse_6[] = $row['mse_6'];
			}

			$jumlah_mse_3 = 0;
			$jumlah_mse_6 = 0;
			$rata_rata_mse_3 = 0;
			$rata_rata_mse_6 = 0;

			for($i=3; $i<count($data_mse_3); $i++){
				$jumlah_mse_3 += $data_mse_3[$i];
			}								
			
			for($i=6; $i<count($data_mse_6); $i++){
				$jumlah_mse_6 += $data_mse_6[$i];
			}
			
			$rata_rata_mse_3 = $jumlah_mse_3 / (count($data_mse_3) - 3);
			$rata_rata_mse_6 = $jumlah_mse_6 / (count($data_mse_6) - 6);
			
			echo "<br><b>MSE pada Forecasting 3 : ".$rata_rata_mse_3."</b>";
			echo "<br><b>MSE pada Forecasting 6 : ".$rata_rata_mse_6."</b>";
		}
	?>
	
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