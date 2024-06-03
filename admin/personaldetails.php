<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Account Details</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
                 <script>
                $(document).ready(function(){
                    $("#Insert, #Update").click(function(){
                        let letters =/^[A-Za-z ]+$/;
                        let filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        let number = /^[0-9]+$/;
                        //let pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;

                        let actype =$("#actype").val();
                        let fname =$("#fname").val();
                        let mb =$("#mb").val();
                        let email =$("#email").val();
                        let address =$("#address").val();
                
                        if(actype.trim()==""){
                            alert("Please Select Account Type");
                            $("#actype").focus();
                            return false; 
                        }else if(fname.trim()==""){
                            alert("Please Enter Name");
                            $("#fname").focus();
                            return false; 
                        }else if(!letters.test(fname)){
                            alert("Name feild required only alphabet characters");
                            $("#fname").val("");
                            $("#fname").focus();
                            return false;
                        }else if(mb.trim()==""){
                            alert("Please Enter Mobile Number");
                            $("#mb").focus();
                            return false;
                        }else if(!number.test(mb)){
                            alert("Mobile Number feild required only Numeric value");
                            $("#mb").val("");
                            $("#mb").focus();
                            return false;
                        }else if(mb.trim().length < 10 || mb.trim().length > 10){
                            alert ('Mobile Number length is 10');
                            $("#mb").val("");
                            $("#mb").focus();
                        return false;
                        }else if(email.trim()==""){
                            alert("Pleade Enter Email Id");
                            $("#email").val("");
                            return false;
                        }else if(!filter.test(email)){
                            alert("Please Enter Valid Email");
                            $("#email").val("");
                            $("#email").focus();
                            return false;
                        }else if(address.trim()==""){
                            alert("Please Enter Address");
                            $("#address").focus();
                            return false; 
                        }else{
                            CRUDOPAjax('a');
                        }
                    });
                });       
                </script>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="CRUDOP()">
                Account Details
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Account Details </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 col-sm-12 mb-4">
                                    <form action="save.php" method="post" id="personalfrm">

                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control d-none" id='crudid' name='crudid'> 
                                            <input type="text" class="form-control d-none" id='crud' name='crud' value="">
                                            <select class="form-control" id="actype" name="actype"required autofocus >
                                                <option value="">Account Type</option>
                                                <option value="Customer">Customer</option>
                                                <option value="Employee">Employee</option>
                                                <option value="Worker">Worker</option>
                                            </select>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control" placeholder="Please Enter name" id="fname" name="fname" required >
                                            <label for="fname">Name</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="tel" class="form-control" id="mb" name="mb" placeholder="Enter your mobile number" required >
                                            <label for="mb">Mobile Number</label>
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email id" required >
                                            <label for="email">Email Id</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter your Religon" required >
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="tel" class="form-control" id="altmb" name="altmb"placeholder="Enter your Alter Contact Number" required >
                                            <label for="altmb">Alter Contact Number</label>
                                        </div>
                                        <div class="d-grid gap-3 ">
                                            <input type="text" id="personaldata" name="personaldata" value="personaldata" class="btn btn-primary btn-block bt-lg mt-3 mb-3 d-none">
                                            <button type="button" id="Insert" name='Insert' class="btn btn-primary">Save</button>
                                            <button type="button" id="Update" name='Update' class="btn btn-primary d-none">Update</button>
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        <script>
            function CRUDOP(opration,perid,actype,fname,mb,email,address,altmb) {
                //console.log(perid);
                if (perid != '' && perid != undefined) {
                    // $(".d-none").removeClass("d-none");
                    $("#Update").removeClass("d-none");
                    $("#Insert").addClass("d-none");
                    $("#crud").val("update");
                    $("#crudid").val(perid);
                    
                    $("#actype").val(actype);
                    $("#fname").val(fname);
                    $("#mb").val(mb);
                    $("#email").val(email);
                    $("#address").val(address);
                    $("#altmb").val(altmb);
                } else {
                    $("#Update").addClass("d-none");
                    $("#Insert").removeClass("d-none");
                    $("#crudid").val('');
                    $("#crud").val("insert");

                    $("#actype").val('');
                    $("#fname").val('');
                    $("#mb").val('');
                    $("#email").val('');
                    $("#address").val('');
                    $("#altmb").val('');
            
                }
            }

            function CRUDOPAjax(crud, idcrud) {
                if (crud.trim() == 'delete') {
                    $("#crud").val("delete");
                    $("#crudid").val(idcrud);
                    var r = confirm("Do you want to Delete ?");
                    if (r == false) {
                        return false;
                    }
                }
                var formData = new FormData($("#personalfrm")[0]);
                var req = $.ajax({
                    url: 'save.php',
                    type: 'POST',
                    cache: false,
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    processData: false
                });
                req.done(function(text) {
                    var return_data = text.trim();
                    //console.log("=" + return_data);
                    if (return_data != 0 && return_data != 'Exist') {
                        alert("Account Data Save Successfully..!");
                        $("#exampleModal").modal('hide');
                        refreshdata();
                    } else if (return_data == 'Exist') {
                        alert("Account Already Exist..!");
                    } else {
                        alert("try again");
                    }
                });
            }

            function refreshdata() {
                var req = $.ajax({
                    url: 'personaldetailsget.php',
                    type: 'get',
                    cache: false
                });
                req.done(function(text) {
                    $('#recordshow').html(text);
                });
            }
            refreshdata();
        </script>
<?php include_once('footer.php'); ?>
