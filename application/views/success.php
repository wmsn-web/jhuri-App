<!DOCTYPE html>
<html>
<head>
	<!----==========Layout===========--------->
	<?php include("inc/layout.php"); ?>
</head>
<body>
	
	<div class="success">
		<div class="container-fluid">
			<div class="row">
				<div class="navicon cl1">
					
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
	    	<div align="center">
	    		<div class="bigCircle">
	    			<div class="smalCircle">
	    				<img src="<?= base_url(); ?>assets/images/site_img/thumbsup.png" />
	    			</div>
	    		</div>
	    		<h1 style="margin-top: 25px">Confirmation</h1>
	    		<div class="container">
	    			<p style="font-size: 20px">You have successfully completed your Order procedure</p>
	    			<div style="margin-top: 55px; margin-bottom: 75px">
	    				<a style="text-decoration: none" href="<?= base_url(); ?>MyOrders">
	    					<button style="font-size: 20px; height: 55px" class="bntmain">View Orders</button>
	    			    </a>
	    			</div>
	    	    </div>
	    	</div>
	    	
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