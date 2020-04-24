<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>New Orders</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="favicon" href="dist/img/AdminLTELogo.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">New Orders</h3>

                <div class="card-tools">
                  
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Order Id</th>
                    <th>Customer(s)</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $num = $getNewOrders->num_rows();
                      $results = $getNewOrders->result();
                      if($num == 0)
                      {
                        echo "<b style='color:#f00'>Orders Not Found!</b>";
                      }
                      else
                      {
                    ?>
                      <?php foreach ($results as $key) { ?>
                        <tr>
                          <td><?= $key->date; ?></td>
                          <td><?= $key->order_id; ?></td>
                          <td><?= $key->user_id; ?></td>
                          <td><?= $key->status; ?></td>
                          <td>
                            <a href="<?= base_url(); ?>Admin/DetailsOrder/<?= $key->order_id; ?>/newOrder">
                              <button class="btn btn-primary">Details</button>
                            </a>
                            <a href="<?= base_url(); ?>Admin/deleteOrder/<?= $key->id; ?>/newOrder" onClick="return confirm('Delete this Order? Once it Deleted never can retrive. Click Ok to process the Deletion');">
                              <button  class="btn btn-danger">Delete</button>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Order Id</th>
                    <th>Customer(s)</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
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
<script src="<?= base_url(); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
