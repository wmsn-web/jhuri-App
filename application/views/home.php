<!DOCTYPE html>
<html>
<head>
	<!--==========Layout===========-->
	<?php include("inc/layout.php"); ?>
</head>
<body>
	<?php include("inc/header.php"); ?>
	<?php if($feed=$this->session->flashdata("Feed")){ ?>
		<div class="flash">
			<span class="msg"><?= $feed; ?></span>
		</div>
   <?php } ?>
<!--==================Header Navigation===========-->

<?php 
if(!$this->session->userdata("userId"))
{
if(@$usedata) { ?>
<div class="tab_box">
	<h4>Login With</h4>
	<table>
		<?php 
		$tl = 1;
		foreach($usedata as $userdata) { $tls = $tl++; $id = "ph".$tls; ?>
			<tr>
				<th><a href="<?= base_url(); ?>Home/getPhoneUser/<?= $userdata->phone; ?>"><?= $userdata->phone; ?></a></th>
				<td><input type="radio" class="phn" id="<?= $id; ?>" name="phone" value="<?= $userdata->phone; ?>"></td>
			</tr>
	    <?php } ?>
	</table>
</div>
<?php } ?>
<?php } ?>
    
    <div id="pageCont" class="pageCont1">
		<section class="secbg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<!---div class="input-group">
							<span class="input-group-addon">
		        				<i class="fas fa-search"></i>
		    				</span>
		    				<input type="text" class="form-control srch" placeholder="Search Products" />
						</div--->
					</div>
				</div>
				<div class="row">
					<div class="upl_sec">
						<?php echo form_open_multipart('upload/do_upload');?>
						<?php if($this->session->userdata("userId")) { ?>
							<label for="uplImg" id="lbl">
								<img src="<?= base_url(); ?>assets/images/site_img/cmp.png">
							</label>
						<?php }else{ ?>
							<a href="<?= base_url(); ?>Login">
								<img src="<?= base_url(); ?>assets/images/site_img/cmp.png">
							</a>
						<?php } ?>
							<input type="file" name="ordImg" id="uplImg" accept="image/*" capture="camera">
							<div class="uploadSec">
								<div align="center">
									<div class="prevImg">
										<img id="blah" src="#" class="img-responsive" alt="your image" />
										<button id="subuplBtn" class="bnt1">Submit</button><br><br>
										<span onClick="history.back()" class="cncl">Cancel</span><br><br>
									</div>
								</div>
								<div class="subLoder">
    								<img src="<?= base_url(); ?>assets/images/site_img/loader.gif" class="img-responsive" />
   								 </div>
							</div>
						</form>
					</div>
					<div class="ord_sec">
						<a href="<?= base_url(); ?>ListOrder">
							<img src="<?= base_url(); ?>assets/images/site_img/order_btn.png">
						</a>
						<br><br>
						<a href="<?= base_url(); ?>MyOrders">
							<img src="<?= base_url(); ?>assets/images/site_img/myorder_btn.png">
					    </a>
					</div>
				</div>
				<div class="row">
					<div class="cont cl4">
						<img id="htiwrk" src="<?= base_url(); ?>assets/images/site_img/Rectangle_31.png">
					</div>
					<div class="conticn cl5">
						<a href="tel:+919735151074">
							<img src="<?= base_url(); ?>assets/images/site_img/call.png">
						</a>
						<br><br>
						<a href="https://api.whatsapp.com/send?phone=9735151074&text=I%20want%20to%20make%20an%20order%20">
							<img src="<?= base_url(); ?>assets/images/site_img/whtsp.png">
						</a>
					</div>
				</div>
			</div>
		</section>
		<section class="gal">
			<div class="cat_gal">
				<h3>Category <span>See All</span></h3><br>
				<div class="row">
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/1.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/2.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/3.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/4.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/5.png" />
						<span>Fruits & Vegetables</span>
					</div>

					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/6.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="col-sm-12">
						<div align="center">
							<img src="<?= base_url(); ?>assets/images/site_img/mdl.png">
						</div>
					</div>
			    </div>
			</div>


			<div class="cat_gal">
				
				<div class="row">
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/1.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/2.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/3.png" />
						<span>Fruits & Vegetables</span>
					</div>
			    </div>
			</div>

			<div class="cat_gal">
				
				<div class="row">
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/1.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/2.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/3.png" />
						<span>Fruits & Vegetables</span>
					</div>
			    </div>
			</div>

			<div class="cat_gal">
				
				<div class="row">
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/1.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/2.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/3.png" />
						<span>Fruits & Vegetables</span>
					</div>
			    </div>
			</div>

			<div class="cat_gal">
				
				<div class="row">
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/1.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/2.png" />
						<span>Fruits & Vegetables</span>
					</div>
					<div class="galdv cl6">
						<img class="catImg" src="<?= base_url(); ?>assets/images/site_img/gal/3.png" />
						<span>Fruits & Vegetables</span>
					</div>
			    </div>
			</div>
		</section>
	</div>
	<div id="pop">
		<div class="container-fluid">
			<div class="cards bgGrn">
				<span id="cls">&times;</span><br>
				<h3>How its work?</h3>
				<h4>What kind of products can I get at my doorstep?</h4>
				<p>How does "anything you want" sound? We have 5000+ products across food, personal care, household & other categories.</p>

				<p>step 1. Click a photo of your order list and just upload it with additional description and confirm. quick and simple.<br>
				or </p>
				<p>List your order and submit and confirm.
				or just WhatsApp us with your order list.</p>

				<p>Step 2. our representative will call you and verify the order list and you can track your order.</p>

				<p>Step 3. get your order at your doorstep quickly as never before without any delivery charges.</p>

				<p>Step 4. Pay when you receive your order with the seller invoice.<p>
			</div>
		</div>
	</div>
	<!---=================Foot Menu==========------------>
	<?php include("inc/foot_menu.php"); ?>
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
</body>
</html>