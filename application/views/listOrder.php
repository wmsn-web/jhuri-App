<!DOCTYPE html>
<html>
<head>
    <!----==========Layout===========--------->
    <?php include("inc/layout.php"); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link rel="stylesheet" href="bootstrap-iconpicker/css/bootstrap-iconpicker.min.css">
</head>
<body>
    
    <div class="loginProfile">
        <div class="container-fluid">
            <div class="row">
                <div class="navicon cl1 bckbtn">
                    <img style="width: 25px" src="<?= base_url(); ?>assets/images/site_img/arrow_left.png">
                </div>
                <div class="logo cl2">
                    <div align="center">
                        <img src="<?= base_url(); ?>assets/images/site_img/logo.png" alt="img" align="center" />
                    </div>
                </div>
                <div class="notice cl3">
                    
                </div>
            </div>
        </div>
        <div class="container">
            <h3>List your Orders</h3>
            <p><?= date('d-m-Y'); ?></p> 
            <form id="frmEdit" class="form-horizontal">
                <div class="form-group">
                    <small id="itm" class="text-danger"></small>
                    <input type="text"  id="text"  name="text" placeholder="Type Names" class="lstOrdinp  item-menu">
                </div>
                <div class="form-group">
                    <div align="right">
                        <small id="qty" class="text-danger"></small>
                        <input type="text" id="title" name="title" class="lstOrdinp2  item-menu">
                    </div>
                </div>
                <input type="hidden" name="itemName" id="itemName">
                <div class="form-group">
                    <div align="right">
                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                    </div>
                </div>
              </form>
                <div class="card">
                    <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                </div>
              <button id="btnOutput" type="button" class="bntSec"><i class="fas fa-check-square"></i> Next</button> 
              <textarea id="out" class="form-control" cols="50" rows="10"></textarea>
            <?= br(4); ?>
        </div>
    </div>

    <!---=================Foot Menu==========------------>
    
<!--------==================Java script===========---------->
<?php include("inc/js.php"); ?>
<script type="text/javascript" src="assets/js/jquery-menu-editor.js"></script>
        <script type="text/javascript" src="bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js"></script>
        <script type="text/javascript" src="bootstrap-iconpicker/js/bootstrap-iconpicker.min.js"></script>
        <script>
            jQuery(document).ready(function () {
                /* =============== DEMO =============== */
                // menu items
                
                // icon picker options
                var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
                // sortable list options
                var sortableListOptions = {
                    placeholderCss: {'background-color': "#cccccc"}
                };

                var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
                editor.setForm($('#frmEdit'));
                editor.setUpdateButton($('#btnUpdate'));
                $('#btnReload').on('click', function () {
                    editor.setData(arrayjson);
                });

                $('#btnOutput').on('click', function () {
                    var str = editor.getString();
                    if(str == "[]"){
                        $("#itm").html("Please Enter Item Name"); $("#text").focus();}
                    else{
                        var itemName = $("#itemName").val();
                        location.href="<?=base_url(); ?>ListOrder/addorder/?data="+str;
                    }
                });

                $("#btnUpdate").click(function(){
                    editor.update();
                });

                $('#btnAdd').click(function(){
                   var txtval = $("#text").val();
                   var ttlval = $("#title").val();
                   if(txtval == ""){ $("#itm").html("Please Enter Item Name"); $("#text").focus(); }
                   else if(ttlval == ""){ $("#qty").html("Please Enter Quantity"); $("#title").focus(); }
                   else{
                    editor.add();
                    $("#itm").html("");
                    $("#qty").html("");
                    $("#itemName").val(txtval);
                }
                });
                /* ====================================== */

                /** PAGE ELEMENTS **/
                
            });
        </script>
</body>
</html>