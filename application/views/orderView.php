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
	    <div class="container">
	    	<h4>Order Details</h4>
	    	
	    	<?php
	    	$row = $getOrd->row();
	    		$types = $row->types;
	    		$descr = html_entity_decode($row->description);
	    			if($descr == ""){ $desc = "<span class='text-danger'>No Description Added</span>"; }else{ $desc = $descr; }
	    		if($types == "list")
	    		{
	    			
	    			$jsons = html_entity_decode($row->orders);
	    			$json = json_encode($jsons);
	    			$arrays = json_decode($jsons); //print_r($array); br(15); ?>

	    			<div class="cards">
	    				<h4>Order Id: <strong><?= $row->order_id; ?></strong></h4>
	    				<span><?= $row->date; ?></span>
	    			</div>
	    			<?php
	    			
	    			$sls =1;
	    			foreach ($arrays as $key) { $sl = $sls++; ?>
	    				<div class="cards">
	    					<span class="dots"><?= $sl; ?></span>
	    					<span><?= $key->text; ?></span>
	    					<span class="rights"><?= $key->title; ?></span>
	    				</div>
	    		<?php	}  ?>
	    				<div class="cards">
	    					<p><?= $desc; ?></p>
	    			     </div>
	    		<?php
	    		}else{ ?>
	    			<div class="cards">
	    				<h4>Order Id: <strong><?= $row->order_id; ?></strong></h4>
	    				<span><?= $row->date; ?></span>
	    			</div>
	    			<div class="row">
	    				<div class="col-md-12">
	    					<img src="<?= base_url(); ?>uploads/<?= $row->images; ?>" class="img-responsive">
	    				</div>
	    				<div class="cards">
	    					<p><?= $desc; ?></p>
	    			     </div>
	    			</div>
	    		<?php }
	    	?>
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