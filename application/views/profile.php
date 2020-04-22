<?php include("fnc.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<!----==========Layout===========--------->
	<?php include("inc/layout.php"); ?>
</head>
<body>
	
	<div class="myProfile">
		<div class="container-fluid">
			<div class="row">
				<div class="navicon cl1 bckbtn">
					<img style="width: 25px" src="<?= base_url(); ?>assets/images/site_img/arrow_left.png">
				</div>
				<div class="logo cl2">
					<div align="center">
						<img src="<?= base_url(); ?>assets/images/site_img/logo.png" alt="img" align="center" />
					</div>
				</div>
				<div class="notice cl3">
					
				</div>
		    </div>
	    </div>
	    <div class="container">
	    	<h1>My Profile</h1>
	    	<form class="proFrom">
	    		<div class="form-group proinp">
	    			<label>Full Name</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Address Lane</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>City</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Postal Code</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Gender</label>
	    			<select name="fname" class="inpControl">
	    				<option value="">Select</option>
	    				<option value="Male">Male</option>
	    				<option value="Female">Female</option>
	    			</select>
	    		</div>
	    		<div class="form-group proinp">
	    			<label>E-mail</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Phon Number</label>
	    			<input type="text" name="fname" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<button class="bntSec">Confirm</button>
	    		</div>
    	    </form>
	    </div>
	</div>

	<!---=================Foot Menu==========------------>
	<?php include("inc/foot_menu.php"); ?>
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
</body>
</html>