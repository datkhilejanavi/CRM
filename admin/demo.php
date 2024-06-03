<?php include_once('navbar.php');?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php include_once('header.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Employee Details</h1>
                </div>
                <style>
                    .col-lg-4 {
                    background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
                     }
                </style>
                 <script>
                $(document).ready(function(){
                    $("#personalemp").click(function(){
                        let letters =/^[A-Za-z]+$/;
                        let filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        let number = /^[0-9]+$/;
                        //let pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;

                        let fname =$("#fname").val();
                        let mb =$("#mb").val();
                        let email =$("#email").val();
                        let address =$("#address").val();
                        let pin =$("#pin").val();
                    

                        if(fname.trim()==""){
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
                        }else if(!letters.test(address)){
                            alert("Address feild required only alphabet characters");
                            $("#address").val("");
                            $("#address").focus();
                            return false;
                        }else if(pin.trim()==""){
                            alert("Please Enter Pin-Code Number");
                            $("#pin").focus();
                            return false;
                        }else if(!number.test(pin)){
                            alert("Pin-Code Number feild required only Numeric value");
                            $("#pin").val("");
                            $("#pin").focus();
                            return false;
                        }else {
                            alert("Thank You for Registration...");
                            return true;
                        }
                    });
                });       
            </script>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Add Customer
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Customer Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 col-sm-12 mb-4">
                                    <form action="save.php" method="post">

                                        <div class="form-floating mb-2">
                                            <label for="fname">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name" id="fname" name="fname" required autofocus>
                                        </div>

                                        <div class="form-floating mt-2">
                                            <label for="mb">Mobile Number</label>
                                            <input type="tel" class="form-control" id="mb" name="mb"
                                                placeholder="Enter your mobile number" required autofocus>
                                        </div>

                                        <div class="form-floating mt-2">
                                            <label for="email">Email Id</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your Email id" required autofocus>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter your Religon" required autofocus>
                                        </div>
                                        <div class="form-floating mt-2">
                                            <label for="pin">Pin-Code</label>
                                            <input type="text" class="form-control" id="pin" name="pin"
                                                placeholder="Enter your Pin-Code Number" required autofocus>
                                        </div>
                                        <div class="d-grid gap-3 ">
                                            <button type="submit" id="personalemp" name="personalemp"  class="btn btn-primary btn-block bt-lg mt-3 mb-3">Submit</button>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>action</th>
                            <th>First Name</th>
                            <th>Contact No</th>
                            <th>Email Id</th>
                            <th>Religon</th>
                            <th>Pin-Code</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sql="SELECT * FROM `personalinfoemp`";
                        $sqlrun=mysqli_query($con,$sql);
                        while($rows=mysqli_fetch_assoc($sqlrun)){
                            ?>
                                <tr>
                                    <td><button type="button" class="btn btn-info"><?php echo $rows['perid']; ?></button></td>
                                    <td><?php echo $rows['fname']; ?></td>
                                    <td><?php echo $rows['mb']; ?></td>
                                    <td><?php echo $rows['email']; ?></td>
                                    <td><?php echo $rows['address']; ?></td>
                                    <td><?php echo $rows['pin']; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
                <!-- /.container-fluid -->
            </div>
<!-- End of Main Content -->
<?php include_once('footer.php'); ?>