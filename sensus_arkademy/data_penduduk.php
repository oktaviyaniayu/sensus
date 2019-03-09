<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Person</h2>
		    <form method="get" action="data_penduduk.php">
		    	<div class="row">
				    <div class="col-sm-3">
				    	<select name="region_id" class="form-control" required>
				    		<option value="">--Pilih region--</option>
					    	<?php 
					    	$reg = mysqli_query($db, "SELECT*FROM regions");
					    	while($reg_data = mysqli_fetch_array($reg)){ ?>
					    		<option value="<?php echo $reg_data['id'];?>"><?php echo $reg_data['name'];?></option>
					    	<?php } ?>
					    </select>
				    </div>
				    <div class="col-sm-1">
				    	<input type="submit" class="btn btn-md btn-primary" value="Filter">
				    </div>
				    <div class="col-sm-1">
				    	<a href="data_penduduk.php" class="btn btn-md btn-primary"> Tampilkan semua</a>
				    </div>
				</div>
		    </form>

		    <table class="table table-hover table-striped mt-4">
		    	<caption>Data person</caption>
		    	<thead>
		    		<tr>
		    			<th>No</th>
		    			<th>Name</th>
		    			<th>Address</th>
		    			<th>Income</th>
		    			<th>Region</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		if (isset($_GET['region_id']) && $_GET['region_id']<>''){
			    		$data = mysqli_query($db, "SELECT p.*, r.name AS region_name FROM person p 
			    			INNER JOIN regions r ON p.region_id=r.id
			    			WHERE r.id = '$_GET[region_id]'");
			    	}else{
			    		$data = mysqli_query($db, "SELECT p.*, r.name AS region_name FROM person p 
			    			INNER JOIN regions r ON p.region_id=r.id");
			    	}
		    		while($isi=mysqli_fetch_array($data)) { ?>
		    		<tr>
		    			<td><?php echo $isi['id'];?></td>
		    			<td><?php echo $isi['name'];?></td>
		    			<td><?php echo $isi['address'];?></td>
		    			<td><?php echo $isi['income'];?></td>
		    			<td><?php echo $isi['region_name'];?></td>
		    		</tr>
		    	<?php } ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</main>
<?php include('footer.php');?>