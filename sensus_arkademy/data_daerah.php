<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Data daerah</h2>
		    <table class="table table-hover table-striped mt-4">
		    	<caption>Data region</caption>
		    	<thead>
		    		<tr>
		    			<th>No</th>
		    			<th>Nama daerah</th>
		    			<th>Jumlah penduduk</th>
		    			<th>Total pendapatan</th>
		    			<th>Rata-rata pendapatan</th>
		    			<th>Status</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$no=1;
		    		$data = mysqli_query($db, "SELECT*FROM regions");
		    		while($isi = mysqli_fetch_array($data)){ 
		    			$penduduk = mysqli_query($db, "SELECT COUNT(id) AS penduduk FROM person WHERE region_id = '$isi[id]'");
		    			$dt_penduduk = mysqli_fetch_array($penduduk);
		    			$pendapatan = mysqli_query($db, "SELECT SUM(income) AS pendapatan FROM person WHERE region_id = '$isi[id]'");
		    			$dt_pendapatan = mysqli_fetch_array($pendapatan);
		    			$rata = mysqli_query($db, "SELECT AVG(income) AS rata FROM person WHERE region_id = '$isi[id]'");
		    			$dt_rata = mysqli_fetch_array($rata);
		    			if ($dt_rata['rata']<1700000){
		    				$status = '<span class="badge badge-danger">Merah</span>';
		    			}elseif ($dt_rata['rata']>1700000 && $dt_rata['rata']<2200000){
		    				$status = '<span class="badge badge-warning">Kuning</span>';
		    			}else{
		    				$status = '<span class="badge badge-success">Hijau</span>';
		    			}
		    			?>
			    		<tr>
			    			<td><?php echo $no++;?></td>
			    			<td><?php echo $isi['name'];?></td>
			    			<td><?php echo $dt_penduduk['penduduk'];?></td>
			    			<td><?php echo $dt_pendapatan['pendapatan'];?></td>
			    			<td><?php echo $dt_rata['rata'];?></td>
			    			<td><?php echo $status;?></td>
			    		</tr>
		    	<?php } ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</main>
<?php include('footer.php');?>