<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Edit Person</h2>
		    <?php 
    		$data = mysqli_query($db, "SELECT*FROM person WHERE id = '$_GET[id]'");
    		if (mysqli_num_rows($data)<1){
    			header('location:person.php');
    		}else{
    			$isi = mysqli_fetch_array($data); ?>
			    <form method="post" action="person_edit_p.php">
			    <div class="row">
		    		<div class="col-sm-3">
		    			<input type="hidden" name="id" value="<?php echo $isi['id'];?>">
				    	<input type="text" name="person_name" class="form-control" required placeholder="Name" value="<?php echo $isi['name'];?>">
				    </div>
				    <div class="col-sm-3">
				    	<input type="text" name="person_address" class="form-control" required placeholder="Address" value="<?php echo $isi['address'];?>">
				    </div>
				    <div class="col-sm-2">
				    	<input type="number" name="person_income" class="form-control" required placeholder="Income" value="<?php echo $isi['income'];?>">
				    </div>
				    <div class="col-sm-2">
				    	<select name="region" class="form-control" required>
				    		<option value="">--Pilih region--</option>
					    	<?php 
					    	$reg = mysqli_query($db, "SELECT*FROM regions");
					    	while($reg_data = mysqli_fetch_array($reg)){ ?>
					    		<option value="<?php echo $reg_data['id'];?>" <?php echo $isi['region_id']==$reg_data['id']?'selected':'';?>><?php echo $reg_data['name'];?></option>
					    	<?php } ?>
					    </select>
				    </div>
				    <div class="col-sm-1">
				    	<input type="submit" class="btn btn-md btn-primary" value="Simpan">
				    </div>
				</div>
			<?php } ?>
		</div>
	</div>
</main>
<?php include('footer.php');?>