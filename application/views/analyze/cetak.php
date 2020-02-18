<?php function DateToIndo($date) {
	$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

// memisahkan format tahun menggunakan substring
	$tahun = substr($date, 0, 4);

// memisahkan format bulan menggunakan substring
	$bulan = substr($date, 5, 2);

// memisahkan format tanggal menggunakan substring
	$tgl = substr($date, 8, 2);

	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

	return($result);
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Laporan Hasil Analisa Data Pengelompokkan Pondok Pesantren</title>
	<style>

	    h1 {
	  color: blue;
	}
	    

	button a{
	  color: white;
	}
	    
	button a:hover{
	  color: white;
	}

		/*Styles Paging*/
	.paging {
		padding: 10px;
	}

	.paging a {
		/*padding piksel atas, piksel kanan, piksel bawah, piksel kiri */
		padding: 4px 8px 4px 8px;
		border-radius: 2px;
		background: #5cb85c;
		color: white;
		text-decoration: none;
		margin: 4px;
	}

	a.active {
		background: #3D7A3D;
	}

		 .warnae {

		       background: red !important;

		   }

body { font-family: Times New Roman; }
		h1, h2, h3, h4, h5 { font-family: Cambria,"Times New Roman",serif; }
		#paragraf2 { font-family: Georgia, serif; }


	</style>
</head>
<body>
	<br/>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo base_url('assets/img/kop.png'); ?>" width="100%">
				<h3 align="center" style="color: black;"><b><u>HASIL ANALISA DATA</u></b></h3>
				<h6 align="center" style="color: black;">PENGELOMPOKKAN PONDOK PESANTREN</h6>
				<div class="table table-responsive-sm mt-4">
					<table class="table table-bordered" id="table-result">
						<thead>
							<tr class="text-center">
								<th>No.</th>
								<th>Nama Pesantren</th>
								<th>Jumlah Santri</th>
								<th>Jumlah Tenaga</th>
								<th>Jumlah Unit</th>
								<th>Kelompok</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($hasil as $val) { ?>
								<tr class="text-center">
									<th><?php echo $no++; ?></th>
									<td><?php echo $val['nama_ponpes']; ?></td>
									<td><?php echo round($val['jumlah_santri'], 4); ?></td>
									<td><?php echo round($val['jumlah_tenaga'], 4); ?></td>
									<td><?php echo round($val['jumlah_unit'], 4); ?></td>
									<td><?php if($val['max'] == 'C1'){ echo 'Besar'; } elseif ($val['max'] == 'C2') { echo 'Menengah'; } else { echo 'Kecil'; } ?></td>
								</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>		
			</div>
		</div>
	</div>
	<script>
		window.print();
	</script>
	
</body>
</html>