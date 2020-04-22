<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upload files using Codeigniter and Ajax</title>
    <?php include("inc/layout.php"); ?>
</head>
<body>
    <div class="container">
        <div class="col-sm-4 col-md-offset-4">
        <h4>Upload files using Codeigniter and Ajax</h4>
            <form class="form-horizontal" id="submit">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <input id="imgg" type="file" name="file">
                </div>
 
                <div class="form-group">
                    <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                </div>
            </form>   
        </div>
    </div>
<?php include("inc/js.php"); ?>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
 
 
    });
     
</script>
</body>
</html>