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
						<a href="<?= base_url(); ?>">
						<img src="<?= base_url(); ?>assets/images/site_img/logo.png" alt="img" align="center" />
					</a>
					</div>
				</div>
				<div class="notice cl3">
					
				</div>
		    </div>
	    </div>
	    <div class="container">
	    	<h1>My Profile</h1>
	    	<form class="proFrom" action="<?= base_url(); ?>Profile/updateProfile" method="post">
	    		<div class="form-group proinp">
	    			<label>Full Name</label>
	    			<input type="text" name="name" class="inpControl" value="<?= $userData->name; ?>" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Address Lane</label>
	    			<input type="text" name="address" value="<?= @$addr->address; ?>" class="inpControl" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>City</label>
	    			<input type="text" name="city" value="<?= @$addr->city; ?>" class="inpControl" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Postal Code</label>
	    			<input type="text" name="pin" class="inpControl" value="<?= @$addr->pin; ?>" required="required">
	    		</div>
	    		<div class="form-group proinp" required="required">
	    			<label>Gender</label>
	    			<select name="gender" class="inpControl"  required="required">
	    				<?php if($userData->gender == "") { }else{ ?>
	    					<option selected="selected" value="<?= $userData->gender; ?>"><?= $userData->gender; ?></option>
	    				 <?php } ?>
	    				<option value="">Select</option>
	    				<option value="Male">Male</option>
	    				<option value="Female">Female</option>
	    			</select>
	    		</div>
	    		<div class="form-group proinp">
	    			<label>E-mail</label>
	    			<input type="text" name="email" value="<?= $userData->email; ?>" class="inpControl">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Phon Number</label>
	    			<input type="text" name="phone" value="<?= $userData->phone; ?>" class="inpControl" required="required" readonly="readonly">
	    		</div>
	    		<div class="form-group proinp">
	    			<button class="bntSec">Confirm</button>
	    		</div>
    	    </form>
	    </div>
	</div>
		<?php if($feed=$this->session->flashdata("Feed")){ ?>
		<div class="flash">
			<span class="msg"><?= $feed; ?></span>
		</div>
   <?php } ?>
	<!---=================Foot Menu==========------------>
	<?php include("inc/foot_menu.php"); ?>
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
</body>
</html>