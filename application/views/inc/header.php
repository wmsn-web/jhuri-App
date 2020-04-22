<div class="fx">
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="navicon cl1 nvtoggle">
					<i id="bars" class="fas fa-bars"></i>
				</div>
				<div class="logo cl2">
					<div align="center">
						<img src="<?= base_url(); ?>assets/images/site_img/logo.png" alt="img" align="center" />
					</div>
				</div>
				<div class="notice cl3">
					<div align="right">
						<i class="fas fa-bell"></i>
						<i class="fas fa-filter"></i>
				    </div>
				</div>
		    </div>
	    </div>
	</div>
</div>
<section class="side_menu">
	<div class="addr">
		<span>Delivery Address:</span>
		<div class="row">
			<div class="cl15 marks">
				<i class="glyphicon glyphicon-map-marker"></i>
				
			</div>
			<div class="cl75">
				<ul>
					<li>
						Anandapur Main Road, East Kolkata, 100007
					</li>
					
		        </ul>
			</div>
			<div class="cl10 marks-right">
				<i class="glyphicon glyphicon-pencil"></i>
			</div>
		</div>
	</div>
	<div class="menuMain">
		<ul>
			<li><a href="<?= base_url(); ?>">Home</a></li>
			<li><a href="<?= base_url(); ?>Profile">Profile</a></li>
			<li><a href="<?= base_url(); ?>Mycart">My Cart</a></li>
			<li id="catts"><a href="javascript:void(0)">Categories</a></li>
			<li  id="frmMenu"><a href="<?= base_url(); ?>MyOrders">My Order</a></li>
			<li><a href="javascript:void(0)">Language</a></li>
			<li><a href="javascript:void(0)">Settings</a></li>
			<?php if($this->session->userdata("userId")){ ?>
				<li><a href="SignUp/logout">Logout</a></li>
		    <?php }else{ ?>
		    	<li><a href="Login">Login</a></li>
		    <?php } ?>
		</ul>
	</div>
</div>
</section>
