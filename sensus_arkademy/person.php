<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Person</h2>
		    <form method="post" action="person_save.php">
		    	<div class="row">
		    		<div class="col-sm-3">
				    	<input type="text" name="person_name" class="form-control" required placeholder="Name">
				    </div>
				    <div class="col-sm-3">
				    	<input type="text" name="person_address" class="form-control" required placeholder="Address">
				    </div>
				    <div class="col-sm-2">
				    	<input type="number" name="person_income" class="form-control" required placeholder="Income">
				    </div>
				    <div class="col-sm-2">
				    	<select name="region" class="form-control" required>
				    		<option value="">--Pilih region--</option>
					    	<?php 
					    	$reg = mysqli_query($db, "SELECT*FROM regions");
					    	while($reg_data = mysqli_fetch_array($reg)){ ?>
					    		<option value="<?php echo $reg_data['id'];?>"><?php echo $reg_data['name'];?></option>
					    	<?php } ?>
					    </select>
				    </div>
				    <div class="col-sm-1">
				    	<input type="submit" class="btn btn-md btn-primary" value="Simpan">
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
		    			<th>Created</th>
		    			<th>Aksi</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$no=1;
		    		$data = mysqli_query($db, "SELECT p.*, r.name AS region_name FROM person p 
		    			INNER JOIN regions r ON p.region_id=r.id");
		    		while($isi=mysqli_fetch_array($data)) { ?>
		    		<tr>
		    			<td><?php echo $no++;?></td>
		    			<td><?php echo $isi['name'];?></td>
		    			<td><?php echo $isi['address'];?></td>
		    			<td><?php echo $isi['income'];?></td>
		    			<td><?php echo $isi['region_name'];?></td>
		    			<td><?php echo $isi['created_at'];?></td>
		    			<td><a href="person_edit.php?id=<?php echo $isi['id'];?>" class="btn btn-sm btn-warning m-1">Edit</a>
		    				<a href="person_hapus.php?id=<?php echo $isi['id'];?>" class="btn btn-sm btn-danger m-1">Hapus</a>
		    			</td>
		    		</tr>
		    	<?php } ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</main>
<?php include('footer.php');?>