<?php 
include('db.php');
include('header.php');?>
<main role="main" class="container">
	<div class="card">
		<div class="card-body">
		    <h2>Hapus Person ?</h2>
		    <?php 
    		$data = mysqli_query($db, "SELECT p.*, r.name AS region_name FROM person p 
		    			INNER JOIN regions r ON p.region_id=r.id WHERE p.id = '$_GET[id]'");
    		if (mysqli_num_rows($data)<1){
    			header('location:person.php');
    		}else{
    			$isi = mysqli_fetch_array($data); ?>
			    <form method="post" action="person_hapus_p.php">
			    	<input type="hidden" name="id" value="<?php echo $isi['id'];?>">
			    	<table>
		    			<tr>
		    				<td>Name</td><td>:</td>
		    				<td><h4><?php echo $isi['name'];?></h4>
		    			</tr>
		    			<tr>
		    				<td>Address</td><td>:</td>
		    				<td><h4><?php echo $isi['address'];?></h4>
		    			</tr>
		    			<tr>
		    				<td>Income</td><td>:</td>
		    				<td><h4><?php echo $isi['income'];?></h4>
		    			</tr>
		    			<tr>
		    				<td>Region</td><td>:</td>
		    				<td><h4><?php echo $isi['region_name'];?></h4>
		    			</tr>
		    			<tr>
		    				<td colspan="3" align="right"><input type="submit" class="btn btn-md btn-danger" value="Hapus"></td>
	    				</tr>
			    	</table>
			    </form>
			<?php } ?>
		</div>
	</div>
</main>
<?php include('footer.php');?>