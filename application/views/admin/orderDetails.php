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
                      <h4>Shipping Address:</h4>
                      <p><?= $details['adress']; ?></p>
                      <h4>Update Information:</h4>
                      <div class="row">
                        <div class="form-group col-md-6">
                          <label>Status(<small class="text-primary">Current Status: <?= $details["status"]; ?></small>)</label>
                          <select class="form-control">
                            <option value="Confirm">Confirm</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label>Update Price:</label>
                         <input type="text" name="price" class="form-control">
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
</body>
</html>
