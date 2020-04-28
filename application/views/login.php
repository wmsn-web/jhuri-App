<!DOCTYPE html>
<html>
<head>
	<!----==========Layout===========--------->
	<?php include("inc/layout.php"); ?>
</head>
<body>
	
	<div class="loginProfile">
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
	    	<h1>Login</h1>
	    	<form class="logFrom" action="<?= base_url(); ?>Login/signin" method="post">
	    		<div class="form-group loginp">
	    			<label>Mobile Number</label>
	    			<input type="text" id="phones"  name="phone" class="inpControl">
	    		</div>
	    		<div class="form-group loginp">
	    			<label>Password</label>
	    			<input type="password" id="pass_log" name="password" class="inpControl">
	    			<span class="showIcon"><i id="eye" class="fas fa-eye-slash"></i></span>
	    		</div>
	    		
	    		<div class="form-group logbtn">
	    			<button class="bntSec">Login</button>
	    		</div>
	    		<div align="center" class="form-group">
	    			
	    			<p>Don’t have an account ? <span class="reg">Sign Up</span></p>
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