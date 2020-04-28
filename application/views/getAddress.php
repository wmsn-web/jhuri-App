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
				<div class="navicon cl1"  onClick="history.back()">
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
	    <form action="<?= base_url(); ?>ChooseAddress/completeOrder/<?= $this->uri->segment(3); ?>" method="post">
	    <div class="container">
	    	<h3>Choose Address</h3>
	    	<?php
	    	foreach ($adres as $key) { ?>
		    	<div class="cards">
		    		<div class="card-body">
		    			<label class="chkCont ">
		    				<table>
		    					<tr>
		    						<td>
					    				<?= $key->name; ?>,<br>
					    				<?= $key->address; ?>,<br>
					    				<?= $key->city; ?>,<br>
					    				<?= $key->pin; ?><br>
					    			</td>	
					    			<td>					    				
					    				<input type="radio"  name="addrId" value="<?= $key->id; ?>" required="required">
			  							<span class="checkmark"></span>
					    			</td>
		    					</tr>
		    				</table>
		    			</label>
		    		</div>
		    	</div>
	    	<?php } ?>
	    </div>
	    
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-12">
	    				<div align="center">
	    					<?= br(2); ?>
	    					<span id="moreDes">Add More Description<br>(Optional)</span>
	    					<div id="moreDescr"  class="cards">
	    						<textarea name="desc" id="txtare" rows="6" class="form-control" placeholder="More Description"></textarea>
	    					</div>
	    				</div>
	    			</div>
	    			<div style="margin-top: 35px" align="center">
	    				<?php if($numAdres==0){

	    				}else{ ?>
		    		<button class="bntSec3">Contunue</button><br><br><br> <?php } ?>
		    		<a href="<?= base_url(); ?>AddAddress/?order=<?= $orderId; ?>" class="bntSec4">Add New Address</a>
		    		<?= br(3); ?>
	        </div>
	    </div>
	</div>
</form>
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