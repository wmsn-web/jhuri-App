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
						<img src="<?= base_url(); ?>assets/images/site_img/logo.png" alt="img" align="center" />
					</div>
				</div>
				<div class="notice cl3">
					
				</div>
		    </div>
	    </div>
	    <div class="container">
	    	<h1>Signup</h1>
	    	<form class="logFrom" action="<?= base_url(); ?>SignUp/addAcc" method="post">
	    		<div class="form-group loginp">
	    			<label>Name</label>
	    			<input type="text" name="name" class="inpControl" required="required">
	    		</div>
	    		<div class="form-group loginp">
	    			<label>Mobile Number</label>
	    			<input type="text" id="phones" name="phone" class="inpControl" required="required">
	    		</div>
	    		<div class="form-group loginp">
	    			<label>Password</label>
	    			<input type="password" id="pass_log" name="password" class="inpControl" required="required">
	    			<span class="showIcon"><i id="eye" class="fas fa-eye-slash"></i></span>
	    		</div>
	    		
	    		<div class="form-group logbtn">
	    			<button class="bntSec">Signup</button>
	    		</div>
	    		<div align="center" class="form-group">
	    			<p>Already an account ? <span class="login">Sign in</span></p>
	    		</div>
    	    </form>
	    </div>
	</div>
		<div class="flashof">
			<span class="msg">Do not Use special characters!</span>
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