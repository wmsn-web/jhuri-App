<!DOCTYPE html>
<html>
<head>
	<?php include("inc/layout.php"); ?>
</head>
<body>

<div class="myOrderdd">
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
	    <?php if(!@$notFound){ ?>
	    	<?php
	    	 $types = $firstOne->types;
	    	 if($types == "list")
	    	 {
	    	 	$img = base_url()."assets/images/site_img/demoPic.png";
	    	 }
	    	 else
	    	 {
	    	 	$img = base_url()."uploads/".$firstOne->images;
	    	 }
	    	 if($firstOne->status == "Cancelled"){$link = ""; $color= "style='color:#f00'";  }else{ $link = base_url()."OrdStatus/status/". $firstOne->order_id; $color ="style='color:#090'"; }
	    	 ?>
	    <div class="container">
	    	<h4>My Orders</h4>
	    		<div class="cards">
	    			<div class="row">
	    				<div class="cl5 left10">
	    					<img class="img-responsive" src="<?= $img; ?>">
	    				</div>
	    				<div class="cl4 left20">
	    					Order No: <?= $firstOne->order_id; ?><br><br>Date : <?= $firstOne->date; ?><br>
	    					<a style="text-decoration: none;" href="<?= $link; ?>">

	    						<button class="bntmain">Check Order Status</button>
	    				    </a>
	    				    <span <?= $color; ?>><?= $firstOne->status; ?></span>
	    				</div>
	    			</div>
	    		</div>
	    		<h4 style="margin-top: 20px">My Past Orders</h4>
	    		
	    			
	    				<?php foreach ($allOrders as $key) {
	    					if($key->status == "Cancelled")
	    						{
	    							$link = ""; $back = "style='background:#f00; color:#fff'"; 
	    							$txt = "Cancelled";
	    						}
	    						else
	    						{ 
	    							$link = base_url()."OrdStatus/status/". $key->order_id; 
	    							$back = "";
	    							$txt = "View Details";
	    					    }
	    				 ?>	    					
		    				<div <?= $back; ?> class="cards">
		    					<span class="charts"># <?= $key->order_id; ?></span>
		    					<span class="chartsb">
		    						<a style="text-decoration: none;" href="<?= $link; ?>">
		    							<button  <?= $back; ?>><?= $txt; ?></button>
		    						</a>
		    					</span>
		    				</div>
	    			   <?php } ?>
	    			
	    		
	    </div>
	<?php } ?>
	<?php if($feed=$this->session->flashdata("Feed")){ ?>
		<div class="flash">
			<span class="msg"><?= $feed; ?></span>
		</div>
   <?php } ?>
	</div>
<?php include("inc/js.php"); ?>
</body>
</html>