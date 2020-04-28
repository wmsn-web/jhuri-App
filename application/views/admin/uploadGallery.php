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
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                    <form action="<?= base_url(); ?>Admin/uploadGal" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Choose Image</label>
                        <input type="file" name="product_img" class="form-control-file">
                      </div>
                      <div class="form-group">
                       <button>Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Gallery</h3>
              </div>
              <div class="card-body">
                <div class="cards">
                  <div class="row">
                    <?php if($getGal->num_rows()==0)
                    {
                      echo "<h3>No Images</h3>";
                    }else{ ?>
                        <?php
                         $results = $getGal->result();
                         foreach ($results as $key) { ?>
                           <div class="col-md-2">
                             <img src="<?= base_url(); ?>uploads/gallery/<?= $key->images; ?>" style="width:120px; height: 210px;" >
                           </div>
                         <?php } ?>

                        
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
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
</body>
</html>
