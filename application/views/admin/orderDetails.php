<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="favicon" href="dist/img/AdminLTELogo.png">

  <!-- Font Awesome -->
  <?php include("admin_inc/layout_home.php"); ?>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include("admin_inc/header.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("admin_inc/side_menu.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php
       $this->breadcrumbcomponent->add('Dashboard', base_url()."Admin/dashboard");
       $this->breadcrumbcomponent->add('New Orders', base_url().'newOrder');  
       $this->breadcrumbcomponent->add('order Details', base_url().'tutorials/orderDetails');

      ?>    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumb">
                        <?php
                           foreach ($breadcrumb as $key=>$value) {
                            if($value!=''){
                           ?>
                        <li><a href="<?=$value; ?>"><?=$key; ?></a> <span class="divider">></span></li>
                        <?php }else{?>
                        <li class="active"><?=$key; ?></li>
                        <?php }
                           }
                           ?>     
                     </ul>
          </div>
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="cards">
                      <h4>Order ID: <?= $details['orderId']; ?></h4>
                      <?php
                      $orders = json_decode($details['orders']);
                        if($details['types']=="list"){ ?>
                          <table class="table table-bordered">
                            <tr>
                              <th>SL</th>
                              <th>Item Name</th>
                              <th>Qty</th>
                            </tr>
                          <?php
                          $sls =1;
                          foreach ($orders as $key) { $sl = $sls++; ?>
                            <tr>
                              <td><?= $sls; ?></td>
                              <td><?= $key->text; ?></td>
                              <td><?= $key->title; ?></td>
                            </tr>
                         
                          <?php } ?>
                        </table>
                        <p><b>Description:</b><br>
                          <?= $details['description']; ?>
                        </p>
                          <?php 
                        }else{ ?>
                          <img src="<?= base_url(); ?>uploads/<?= $details['images']; ?>" class="img-responsive" />
                        <?php } ?>
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="cards">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="cards">
                            <h4>Shipping Address:</h4>
                            <p><?= $details['adress']; ?></p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="cards">
                            <h4>Status Details</h4>
                            <p>
                              <b>Status:</b> <?= $details['status']; ?><br>
                              <b>Price:</b>  &#8377;<?= $details['price']; ?><br>
                              <b>Invoice:</b> <a href="<?= base_url(); ?>uploads/<?= $details['invoice']; ?>" download><i class="fas fa-file-pdf"></i></a>
                            </p>
                          </div>
                        </div>
                      </div>
                      <?php
                      $disb1 = "";
                      $disb2 = "";
                      $disb3 = "";
                      $slct1 = "";  $slct2 = "";
                        $status = $details["status"];
                        if($status == "submitted"){$dv = "style='display:block'"; $h4 = "Update Information:"; }
                        elseif($status == "Confirm"){$dv = "style='display:block'"; $h4 = "Update Information:"; $disb1 = "disabled='disabled'"; $slct1 = "selected='selected'";  $slct2 = ""; }
                        elseif($status == "Processing"){$dv = "style='display:block'"; $h4 = "Update Information:"; $disb2 = "disabled='disabled'"; $disb1 = "disabled='disabled'"; $slct1 = "";  $slct2 = "selected='selected'"; }
                        elseif($status == "Completed"){$dv = "style='display:none'"; $h4 = "<b style='color:#090'>Goods Delevered to the Customer</b>"; $disb3 = "disabled='disabled'"; }
                        elseif($status == "Cancelled"){$dv = "style='display:none'"; $h4 = "<b style='color:#f00'>This Order Cancelled</b>";}
                      ?>
                      <h4><?= $h4; ?></h4>
                      <div <?= $dv; ?>>
                        <form action="<?= base_url(); ?>Admin/updateInformation" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Status(<small class="text-primary">Current Status: <b><?= $details["status"]; ?></b></small>)</label>
                            <select name="status" id="sts" class="form-control" required="required">
                              <option value="">Select</option>
                              <option <?= $disb1; ?> <?= $slct1; ?> value="Confirm">Confirm</option>
                              <option <?= $disb2; ?> <?= $slct2; ?>   value="Processing">Processing</option>
                              <option <?= $disb3; ?>  value="Completed">Completed</option>
                              <option   value="Cancelled">Cancelled</option>
                            </select>
                          </div>
                          <div id="prc" class="form-group col-md-6">
                            <label>Update Price:</label>
                           <input type="text" id="prcVal" name="price" value="0.00" class="form-control">
                          </div>
                          <div id="uplInv" class="form-group col-md-6">
                            <label>Upload Invoice:</label>
                           <input type="file" id="upll" name="inv" class="form-control-file">
                          </div>
                          <div class="form-group col-md-12">
                            <input type="hidden" name="orderId" value="<?= $details["orderId"]; ?>">
                           <button class="btn btn-primary">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <?php if($feed = $this->session->flashdata("Feed")){ ?>
      <div class="flash">
        <?= $feed; ?>
      </div>
    <?php } ?>
  </div>
  <!-- /.content-wrapper -->

  <?php include("admin_inc/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include("admin_inc/js_home.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#prc").hide();
    $("#uplInv").hide();
    //$(".flash").fadeOut(8000);
    $("#sts").change(function(){
      var status =  $("#sts").val();
      if(status == "Processing"){ 
        $("#prc").fadeIn(200); 
        $("#uplInv").hide(); }
        else if(status == "Completed"){ 
        $("#prc").hide(200); 
        $("#uplInv").show(200); }
        else if(status == "Cancelled"){ 
        $("#prc").hide(200);
        $("#uplInv").hide();  }
    });
  });
</script>
</body>
</html>
