<div class="addOrder">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<div class="input-group  top30">
							<span class="input-group-addon">
		        				<i class="fas fa-search"></i>
		    				</span>
		    				<input type="text" class="form-control srch" placeholder="Search Products" />
						</div>
					</div>
				<div class="cl2 top30">
					<?php echo form_open_multipart('upload/do_upload');?>
						<label for="uplImg2" id="lbl">
					         <img class="img-responsive" src="<?= base_url(); ?>assets/images/site_img/clc.png">
					    </label>
					    <input type="file" name="ordImg" id="uplImg2" accept="image/*" capture="camera">
							<div class="uploadSec2">
								<div align="center">
									<div class="prevImg">
										<img id="blahd" src="#" class="img-responsive" alt="your image" />
										<button  id="subuplBtn2" class="bnt1">Submit</button><br><br>
										<span onClick="history.back()" class="cncl">Cancel</span><br><br>
									</div>
								</div>
								<div class="subLoder2">
    								<img src="<?= base_url(); ?>assets/images/site_img/loader.gif" class="img-responsive" />
   								 </div>
							</div>
						</form>
				</div>
				<div class="cl2 top30">
					<a href="<?= base_url(); ?>ListOrder">
					 <img class="img-responsive" src="<?= base_url(); ?>assets/images/site_img/ordd.png">
					<a href="<?= base_url(); ?>ListOrder">
				</div>
		    </div>
		    <div class="col-md-12">
				<div class="marg25">
					<p>Just give us the details about the work you need completed, and our freelancers will get it done faster, better, and cheaper than you could possibly imagine. This includes:</p>
				</div>
			</div>
			<div class="col-md-12  top30">
				<img class="img-responsive" src="<?= base_url(); ?>assets/images/site_img/btImg.png">
			</div>
		</div>
	</div>