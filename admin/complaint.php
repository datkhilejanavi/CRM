<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Customer Complaint Details</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="CRUDOP();">
                 Add Customer Complaint
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header mb-2">
                                <h5 class="modal-title mb-2">Customer Complaint Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 col-sm-12 mb-4">
                                    <form action="save.php" method="post" id="compaintfrm">

                                        <div class="form-floatin mt-2 mb-2">
                                            <label for="compdate" class="col-1 col-form-label">ComplaintDate</label>
                                            <input type="date" class="form-control" id="compdate" name="compdate" required autofocus>
                                            <input type="text" class="form-control d-none" id='crudid' name='crudid'>
                                            <input type="text" class="form-control d-none" id='crud' name='crud' value="">
                                        </div>
                                        <div class="form-floating mb-2">
                                        <select class="form-control" id="fname" name="fname" for="fname" required >
                                                <option value="">Select Customer Name</option>
                                                <?php
                                                    $sql="select * from personalinfo where actype='Customer'";
                                                    $sqlrun=mysqli_query($con,$sql);
                                                    while($rows=mysqli_fetch_assoc($sqlrun)){
                                                        ?>
                                                            <option value="<?php echo $rows['perid']; ?>"><?php echo $rows['fname']; ?></option>
                                                        <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" class="form-control" placeholder="Enter Complaint Details" id="Complaintsub" name="Complaintsub" required>
                                            <label for="Complaintsub" >Complaint Subject</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="textarea" class="form-control" placeholder="Enter Complaint Details" id="Complaint" name="Complaint" required>
                                            <label for="Complaint">CustomerComplaint</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                        <select class="form-control" id="wname" name="wname" for="wname"required autofocus>
                                                <option selected value="">Select Worker Name</option>
                                                <?php
                                                    $sql="select * from personalinfo where actype='Worker'";
                                                    $sqlrun=mysqli_query($con,$sql);
                                                    while($rows=mysqli_fetch_assoc($sqlrun)){
                                                        ?>
                                                            <option value="<?php echo $rows['perid']; ?>"><?php echo $rows['fname']; ?></option>
                                                        <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <textarea name="workerdis" class="form-control" id="workerdis" cols="30" rows="4"></textarea>
                                            <label for="workerdis">Worker Description</label>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <select class="form-control" id="compstatus" name="compstatus" required>
                                                <option value="Pending">Pending</option>
                                                <option value="Later">Later</option>
                                                <option value="Solve">Solve</option>
                                            </select>
                                            <label for="compstatus">Complaint Status</label>

                                        </div>
                                        <div class="form-floating mt-2 mb-2">
                                            <select class="form-control" id="coppriority" name="coppriority"required  >
                                                <option value="">Complaint Priority</option>
                                                <option value="Critical">Critical</option>
                                                <option value="High">High</option>
                                                <option value="Low">Low</option>
                                            </select>
                                            <label for="coppriority">Complaint Status</label>
                                        </div>
                                        <div class="d-grid gap-3 ">
                                            <!--button type="submit" id="cuscomp" name="cuscomp"  class="btn btn-primary btn-block bt-lg mt-3 mb-3">Submit</button-->
                                            <button type="button" id="Insert" name='Insert' class="btn btn-primary" onclick="CRUDOPAjax('insert');">Save</button>
							            	<button type="button" id="Update" name='Update' class="btn btn-primary d-none" onclick="CRUDOPAjax('update');">Update</button>
                                            <input type="hidden" class="form-control d-none" name="cuscomp" id="cuscomp">
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
		<script type="text/javascript">
			function CRUDOP(opration,complaintid,compdate,fname,Complaintsub,Complaint,wname,workerdis,compstatus,coppriority){
				if(complaintid != '' && complaintid != undefined){
					// $(".d-none").removeClass("d-none");
					$("#Update").removeClass("d-none");
					$("#Insert").addClass("d-none");
					$("#crud").val("update");
					$("#compdate").val(compdate);
					$("#crudid").val(complaintid);
					$("#fname").val(fname);
					$("#Complaintsub").val(Complaintsub);
					$("#Complaint").val(Complaint);
					$("#wname").val(wname);
					$("#workerdis").val(workerdis);
					$("#compstatus").val(compstatus);
					$("#coppriority").val(coppriority);
				}else{
					$("#Update").addClass("d-none");
					$("#Insert").removeClass("d-none");
					$("#crudid").val('');
					$("#crud").val("insert");
					$("#fname").val('');
					$("#compdate").val('');
					$("#complaintid").val('');
					$("#fname").val('');
					$("#Complaintsub").val('');
					$("#Complaint").val('');
					$("#wname").val('');
					$("#workerdis").val('');
					$("#compstatus").val('');
					$("#coppriority").val('');
				}
			}
			function CRUDOPAjax(crud,idcrud){
				if(crud.trim()=='delete'){
					$("#crud").val("delete");
					$("#crudid").val(idcrud);
					var r = confirm("Do you want to Delete ?");
					if(r == false){
						return false;
					}
				}
				var formData = new FormData($("#compaintfrm")[0]);
				var req = $.ajax({
					url : 'save.php',
					type : 'POST',
					cache : false,
					data : formData,
					mimeType: "multipart/form-data",
					contentType: false,
					processData: false
				});
				req.done(function(text) {
					var return_data=text.trim();
					// console.log("="+return_data);
					if(return_data != 0 && return_data != 'Exist'){
						if(crud == 'insert'){
							alert("Complaint Register Successfully..!");
						}else if(crud == 'update'){
							alert("Complaint Update Successfully..!");
						}else if(crud == 'delete'){
							alert("Complaint Delete Successfully..!");
						}
						$("#exampleModal").modal('hide');
						refreshdata();
					}else if(return_data=='Exist'){
						alert("Complaint Already Exist..!");
					}else{
						alert("try again");
					}
				});
			}
			function refreshdata(){
				var req = $.ajax({
					url : 'complaintget.php',
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