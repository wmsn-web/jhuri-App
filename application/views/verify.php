<!DOCTYPE html>
<html>
<head>
	<!----==========Layout===========--------->
	<?php include("inc/layout.php"); ?>
</head>
<body>
	
	<div class="registration">
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
	    	<h1>Verify Account</h1>
	    	<span>Did not get OTP <a href="">Resend</a> </span>
	    	
	    	<form class="logFrom" action="<?= base_url(); ?>Verify/verOtp" method="post">
	    		<div class="form-group loginp">
	    			<label>Mobile Number</label>
	    			<input type="text" name="phone" class="inpControl" value="<?= $this->session->userdata("userId"); ?>" readonly="">
	    		</div>
	    		<div class="form-group loginp">
	    			<label>Enter OTP</label>
	    			<input type="text" name="otp" class="inpControl">
	    		</div>
	    		
	    		<div class="form-group logbtn">
	    			<button class="bntSec">Verify</button>
	    		</div>
	    		<div align="center" class="form-group">
	    			<p>Already an account ? <span class="login">Sign in</span></p>
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