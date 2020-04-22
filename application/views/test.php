<!DOCTYPE html>
<html lang="en">
    <head>

       <?php include("inc/layout.php"); ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link rel="stylesheet" href="bootstrap-iconpicker/css/bootstrap-iconpicker.min.css">
       
    </head>
    <body>
       
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="float-right">
                               
                            </div>
                        </div>
                        <div class="card-body">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card">
                    <div class="card-header">JSON Output
                    <div class="float-right">
                    <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Output</button>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group"><textarea id="out" class="form-control" cols="50" rows="10"></textarea>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">Edit item</div>
                        <div class="card-body">
                            <form id="frmEdit" class="form-horizontal">
                                <div class="form-group">
                                    <label for="text">Text</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">Tooltip</label>
                                    <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>
                   
                </div>
            </div>
           
            <hr>
           
        </div>
        <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
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
                    $("#out").text(str);
                });

                $("#btnUpdate").click(function(){
                    editor.update();
                });

                $('#btnAdd').click(function(){
                    editor.add();
                });
                /* ====================================== */

                /** PAGE ELEMENTS **/
                
            });
        </script>
    </body>
</html>