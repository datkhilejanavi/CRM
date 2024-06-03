<?php include_once('navbar.php');
$sql12 = "select MAX(bill) as billno FROM `newconnection` ";
$res12 = mysqli_query($con, $sql12);
$row12 = mysqli_fetch_assoc($res12);
$billno = $row12['billno'] + 1;
?>
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <?php include_once('header.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Recharge Details</h1>
            </div>
            <style>
                .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                }
            </style>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="CRUDOP();">
            Recharge Details
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Recharge Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 col-sm-12 mb-4">
                                <form action="save.php" method="post" id="rechargefrm">
                                    <div class="form-floating mb-2">
                                        <label for="bill">Bill Number</label>
                                        <input type="text" class="form-control" placeholder="Please Enter Bill Number" id="bill" name="bill" required value="<?php echo $billno; ?>" readOnly>
                                        <input type="text" class="form-control d-none" id='crudid' name='crudid'> 
                                        <input type="text" class="form-control d-none" id='crud' name='crud' value="">
                                    </div>

                                    <div class="form-floating mb-2">
                                        <select class="form-control" id="fname" name="fname" for="fname" required>
                                            <option value="">Select Customer Name</option>
                                            <?php
                                                $sql = "select * from personalinfo where actype='Customer'";
                                                $sqlrun = mysqli_query($con, $sql);
                                                while ($rows = mysqli_fetch_assoc($sqlrun)) {
                                            ?>
                                                <option value="<?php echo $rows['perid']; ?>"><?php echo $rows['fname']; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mt-2">
                                        <select class="form-control" id="plan" name="plan" for="plan" required>
                                            <option value="">Select Plan</option>
                                            <?php
                                            $sql = "select * from tblplantype";
                                            $sqlrun = mysqli_query($con, $sql);
                                            while ($rows = mysqli_fetch_assoc($sqlrun)) {
                                            ?>
                                                <option value="<?php echo $rows['id']; ?>"><?php echo $rows['pname']; ?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mt-2 mb-2">
                                        <select class="form-control" id="transactiontype" name="transactiontype" required>
                                        
                                            <option value="">Transaction Type</option>
                                            <option value="Cash Payment">Cash Payment</option>
                                            <option value="Credit Card">Credit Card</option>
                                            <option value="Online Payment">Online Payment</option>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-2">
                                            <input type="number" class="form-control" placeholder="Enter Recharge Amount" id="rechargeamount" name="rechargeamount" required autofocus>
                                            <label for="rechargeamount">Recharge Amount</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                            <input type="number" class="form-control" placeholder="Enter Advanced Amount" id="adamount" name="adamount">
                                            <label for="adamount">Advanced Recharge Amount</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                            <input type="number" class="form-control" placeholder="Enter Remaining Amount" id="remamount" name="remamount" required>
                                            <label for="remamount">Remaining Recharge Amount</label>
                                    </div>
                                    <div class="form-floatin mt-2 mb-2">
                                        <label for="plandate" class="col-1 col-form-label">PlanExpiryDate</label>
                                        <input type="date" class="form-control" id="planenddate" name="planenddate" required>
                                    </div>
                                    <div class="d-grid gap-3 ">
                                        <button type="button" id="Insert" name='Insert' class="btn btn-primary" onclick="CRUDOPAjax('insert');">Save</button>
                                        <button type="button" id="Update" name='Update' class="btn btn-primary d-none" onclick="CRUDOPAjax('update');">Update</button>
                                        <input type="hidden" class="form-control d-none" name="recharge" id="recharge">
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
        </div>
        <!-- End of Main Content -->
        <script>
            function CRUDOP(opration, bill, fname, plan, transactiontype,rechargeamount,adamount,remamount, planenddate,) {
                if (bill != '' && bill != undefined) {
                    // $(".d-none").removeClass("d-none");
                    $("#Update").removeClass("d-none");
                    $("#Insert").addClass("d-none");
                    $("#crud").val("update");
                    $("#crudid").val(bill);

                    $("#bill").val(bill);
                    $("#fname").val(fname);
                    $("#plan").val(plan);
                    $("#transactiontype").val(transactiontype);
                    $("#rechargeamount").val(rechargeamount);
                    $("#adamount").val(adamount);
                    $("#remamount").val(remamount);
                    $("#planenddate").val(planenddate);
                } else {
                    $("#Update").addClass("d-none");
                    $("#Insert").removeClass("d-none");
                    $("#crudid").val('');
                    $("#crud").val("insert");

                    $("#bill").val('');
                    $("#fname").val('');
                    $("#plan").val('');
                    $("#transactiontype").val('');
                    $("#rechargeamount").val('');
                    $("#adamount").val('');
                    $("#remamount").val('');
                    $("#planenddate").val('');
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
                var formData = new FormData($("#rechargefrm")[0]);
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
                    console.log("=" + return_data);
                    if (return_data != 0 && return_data !='Exist') {
                        if (crud == 'insert') {
                            alert("New Recharge Successfully..!");
                        } else if (crud == 'update') {
                            alert("New Recharge Update Successfully..!");
                        } else if (crud == 'delete') {
                            alert("New Recharge Delete Successfully..!");
                        }
                        $("#exampleModal").modal('hide');
                        refreshdata();
                    } else if (return_data == 'Exist') {
                        alert("Recharge Already Exist..!");
                    } else {
                        alert("try again");
                    }
                });
            }

            function refreshdata() {
                var req = $.ajax({
                    url: 'rechargeget.php',
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