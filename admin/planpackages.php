<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Plan & Packages Details And Offer Master</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
               
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Add Plan & Packages
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Plan & Packages Details And Offer Master</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 col-sm-12 mb-4">
                                <form action="" id="Packageform" method="post" enctype="multipart/form-data">

                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Enter Plan Name" id="pname" name="pname" required autofocus>
                                            <input type="text" class="form-control d-none" id='id' name='id'>
				                            <input type="text" class="form-control d-none" id='crud' name='crud' value="">
                                            <label for="pname">Plan Name</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Enter Speed-Limits" id="splimit" name="splimit" required >
                                            <label for="splimit">Speed-limits</label>
                                        </div>

                                        <div class="form-floating mb-2">
                                            <input type="tel" class="form-control" id="planprice" name="planprice" placeholder="Enter Plan Price" required >
                                            <label for="planprice">Plan Price</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Please Enter Plan Duration" id="duration" name="duration" required >
                                            <label for="duration">Plan Duration</label>
                                        </div>
                                         
                                        <div class="form-floating mb-2">
                                            <label for="photo"><b>Photo:</b></label>
                                            <input type="file" class="bg-light form-control mb-2" name="photo" id="photo" required>
                                            <input type="text" class="form-control d-none" id='photoold' name='photoold'>
                                            <img src="" class="img img-responsive d-none" id='photodisplay'>
                                        </div>
                                             <div class="form-floating mb-2">
                                                <button type="button" id="Insert" name='Insert' class="btn btn-primary" onclick="CRUDOPAjax('insert');">Save</button>
                                                <button type="button" id="Update" name='Update' class="btn btn-primary d-none" onclick="CRUDOPAjax('update');">Update</button>
                                            </div>
                                     </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12" id="recordshow">
                </div>
                
<script type="text/javascript">
    function CRUDOP(opration,id,name,price,duration,photo){
        if(id != '' && id != undefined){
            $("#Update").removeClass("d-none");
            $("#Insert").addClass("d-none");
            $("#crud").val("update");
            $("#id").val(id);
            $("#pname").val(name);
            $("#splimit").val(price);
            $("#planprice").val(duration);
            $("#duration").val(duration);
            $("#photo").val('');
            $("#photoold").val(photo);
            $("#photodisplay").attr("src",photo);
            $("#photodisplay").removeClass("d-none");
        }else{
            $("#Update").addClass("d-none");
            $("#Insert").removeClass("d-none");
            $("#id").val('');
            $("#crud").val("insert");
            $("#pname").val('');
            $("#splimit").val('');
            $("#planprice").val('');
            $("#duration").val('');
            $("#photo").val('');
            $("#photoold").val('');
            $("#photodisplay").attr("src",'');
            $("#photodisplay").addClass("d-none");
        }
    }
    function CRUDOPAjax(crud,id){
        $("#crud").val(crud);
        if(crud.trim()=='delete'){
            $("#crud").val("delete");
            $("#id").val(id);
            var r = confirm("Do you want to Delete ?");
            if(r == false){
                return false;
            }
        }
        var formData = new FormData($("#Packageform")[0]);
        var req = $.ajax({
            url : 'packagesave.php',
            type : 'POST',
            cache : false,
            data : formData,
            mimeType: "multipart/form-data",
            contentType: false,
            processData: false
        });
        req.done(function(text) {
            var return_data=text.trim();
            console.log("=hiiii--"+return_data);
            if(return_data != 0 && return_data != 'Exist'){
                if(crud == 'insert'){
                    alert("Plan Insert Successfully..!");
                }else if(crud == 'update'){
                    alert("Plan Update Successfully..!");
                }else if(crud == 'delete'){
                    alert("Plan Delete Successfully..!");
                }
                $("#exampleModal").modal('hide');
                refreshdata();
            }else if(return_data=='Exist'){
                alert("Plan Already Exist..!");
            }else{
                alert("try again");
            }
        });
    }
    function refreshdata(){
        var req = $.ajax({
            url : 'plangetnew.php',
            type : 'get',
            cache : false
        });
        req.done(function(text) {
            $('#recordshow').html(text);
        });
    }
    refreshdata();
</script>				
<?php include_once('footer.php'); ?>
