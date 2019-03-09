<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Region</h2>
		    <form method="post" action="region_save.php">
		    	Region name 
		    	<div class="row">
		    		<div class="col-sm-4">
				    	<input type="text" name="region_name" class="form-control" required>
				    </div>
				    <div class="col-sm-4">
				    	<input type="submit" class="btn btn-md btn-primary" value="Simpan">
				    </div>
				</div>
		    </form>

		    <table class="table table-hover table-striped mt-4">
		    	<caption>Data region</caption>
		    	<thead>
		    		<tr>
		    			<th>No</th>
		    			<th>Name</th>
		    			<th>Created</th>
		    			<th>Aksi</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php 
		    		$no=1;
		    		$data = mysqli_query($db, "SELECT*FROM regions");
		    		while($isi = mysqli_fetch_array($data)){ ?>
		    		<tr>
		    			<td><?php echo $no++;?></td>
		    			<td><?php echo $isi['name'];?></td>
		    			<td><?php echo $isi['created_at'];?></td>
		    			<td><a href="region_edit.php?id=<?php echo $isi['id'];?>" class="btn btn-sm btn-warning m-1">Edit</a>
		    				<a href="region_hapus.php?id=<?php echo $isi['id'];?>" class="btn btn-sm btn-danger m-1">Hapus</a>
		    			</td>
		    		</tr>
		    	<?php } ?>
		    	</tbody>
		    </table>
		</div>
	</div>
</main>
<?php include('footer.php');?>