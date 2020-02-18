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
		<img src="<?php echo base_url('assets/img/kop.png'); ?>" width="100%">
				<h3 align="center" style="color: black;"><b><u>PROFIL LEMBAGA</u></b></h3>
				<h5 align="center" style="color: black;">Pondok Pesantren <?php echo $company['nama_ponpes']; ?></h5>
		          <table class="table table-bordered">
            <tr>
              <th>Nama</th>
              <td><?php echo $company['nama_ponpes']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?php echo $company['alamat']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Tenaga</th>
              <td><?php echo $company['jumlah_tenaga']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Santri</th>
              <td><?php echo $company['jumlah_santri']; ?></td>
            </tr>
            <tr>
              <th>Tanggal Berdiri</th>
              <td><?php echo (date("d M Y", strtotime($company['tgl_berdiri'])));?></td>
            </tr>
            <tr>
            	<th>Unit Lembaga</th>
            	<td>Berjumlah <?php echo $company['jumlah_unit']; ?></td>
            	<?php $no = 1;
            	foreach ($unit as $val) { ?>
            		<tr>
            			<th></th>
            		<td><?php echo $val['nama_unit']; ?></td>
            		</tr>
            	<?php } ?>

            	
            </tr>
          </table>
	</div>
	<script>
		window.print();
	</script>
	
</body>
</html>