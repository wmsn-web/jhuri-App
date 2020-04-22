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
	    	<h4>Add New Address</h4>
	    	<form class="proFrom" action="<?= base_url(); ?>AddAddress/submitAddr/<?= @$_GET['order']; ?>" method="post">
	    		<div class="form-group proinp">
	    			<label>Name</label>
	    			<input type="text" name="name"  class="inpControl" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Address Lane</label>
	    			<input type="text" name="address"  class="inpControl" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>City</label>
	    			<input type="text" name="city"  class="inpControl" required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Postal Code</label>
	    			<input type="text" name="pin" class="inpControl"  required="required">
	    		</div>
	    		<div class="form-group proinp">
	    			<label>Phon Number</label>
	    			<input type="text" name="phone" value="<?= $this->session->userdata('userId'); ?>" class="inpControl" required="required" readonly="readonly">
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
	
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
</body>
</html>