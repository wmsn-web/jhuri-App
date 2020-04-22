<!DOCTYPE html>
<html>
<head>
	<!----==========Layout===========--------->
	<?php include("inc/layout.php"); ?>
	
</head>
<body>
	
	<div class="statuss">
		<div class="container-fluid">
			<div class="row">
				<div class="navicon cl1" onClick="history.back()">
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
	    <?php
	    $btnClass = "class='btn btn-danger'";
	    $btnTxt = "Cancel Order";
	    	$steps = $rowsOrd->steps;
	    	if($steps == '0'){ $confr = ""; $prc = ""; $ver = ""; }
	    	elseif($steps == '1'){ $confr = "class='greens'"; $prc = ""; $ver = "";}
	    	elseif($steps == '2'){$prc = "class='greens'"; $confr ="class='greens'";  $ver = ""; $btnClass="class='btn btn-success'"; $btnTxt = "Invoice";}
	    	elseif($steps == '3'){$ver = "class='greens'"; $confr ="class='greens'"; $prc = "class='greens'";
	    	$btnClass="calss='btn btn-success'"; $btnTxt = "Invoice";	}
	    	else{
	    		$confr =""; $prc = ""; $ver = ""; $btnClass = "calss='btn btn-danger'";
	    $btnTxt = "Cancel Order";
	    	}
	    	

	    ?>

	    <div class="container">
	    	<div class="cardds">
	    		<div class="row">
	    			<div class="cl2 fst">
	    				<h4>Order No.<br><?= $rowsOrd->order_id; ?></h4>
	    			</div>
	    			<div class="cl2 fst">
	    				<br>
	    				<button  <?= $btnClass ?>> <?= $btnTxt; ?></button>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="bdCont">
	    		<div class="progressd">
					<div class="vertical_bar">
						<div class="success_bar">
							
						</div>
					</div>
					<ul class="steps">
						<li <?= $confr; ?>><i class="fas fa-check-circle"></i> Verify</li>
						<li <?= $confr; ?>><i class="fas fa-check-circle"></i> Confirmed</li>
						<li <?= $prc; ?>><i class="fas fa-check-circle"></i> On Process</li>
						<li <?= $prc; ?>><i class="fas fa-check-circle"></i> Price</li>
						<li <?= $ver; ?>><i class="fas fa-check-circle"></i> Received</li>
					</ul>
    			</div>
	    	</div>
	    	
	    </div>
	</div>
<div class="fx_btmx"></div>
	    
	    		
	    	
	
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