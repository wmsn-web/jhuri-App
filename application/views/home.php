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
						<div class="input-group">
							<span class="input-group-addon">
		        				<i class="fas fa-search"></i>
		    				</span>
		    				<input type="text" class="form-control srch" placeholder="Search Products" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="upl_sec">
						<?php echo form_open_multipart('upload/do_upload');?>
							<label for="uplImg" id="lbl">
								<img src="<?= base_url(); ?>assets/images/site_img/cmp.png">
							</label>
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
						<img src="<?= base_url(); ?>assets/images/site_img/Rectangle_31.png">
					</div>
					<div class="conticn cl5">
						<img src="<?= base_url(); ?>assets/images/site_img/msnger.png"><br><br>
						<img src="<?= base_url(); ?>assets/images/site_img/whtsp.png">
					</div>
				</div>
			</div>
		</section>
		<section class="gal">
			<div class="cat_gal">
				<h3>Category <span>See All</span></h3>
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
				<h3>Category <span>See All</span></h3>
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
				<h3>Category <span>See All</span></h3>
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
				<h3>Category <span>See All</span></h3>
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
				<h3>Category <span>See All</span></h3>
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
	<!---=================Foot Menu==========------------>
	<?php include("inc/foot_menu.php"); ?>
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
</body>
</html>