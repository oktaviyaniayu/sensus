<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Edit Region</h2>
		    <?php 
    		$data = mysqli_query($db, "SELECT*FROM regions WHERE id = '$_GET[id]'");
    		if (mysqli_num_rows($data)<1){
    			header('location:region.php');
    		}else{
    			$isi = mysqli_fetch_array($data); ?>
			    <form method="post" action="region_edit_p.php">
			    	Region name 
			    	<div class="row">
			    		<div class="col-sm-4">
			    			<input type="hidden" name="id" value="<?php echo $isi['id'];?>">
					    	<input type="text" name="region_name" class="form-control" required value="<?php echo $isi['name'];?>">
					    </div>
					    <div class="col-sm-4">
					    	<input type="submit" class="btn btn-md btn-primary" value="Simpan perubahan">
					    </div>
					</div>
			    </form>
			<?php } ?>
		</div>
	</div>
</main>
<?php include('footer.php');?>