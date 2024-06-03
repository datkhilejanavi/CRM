<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="data/boostraplib.css" rel="stylesheet">
    <script src="data/jquery.js"></script>
    <script src="data/icon.js"></script>
    <script>
        $(document).ready(function(){
            $("#reset").click(function(){
                // let letters =/^[A-Za-z]+$/;
                let filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let number = /^[0-9]+$/;
                let pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
                let mb =$("#mb").val();
                let newpsw =$("#newpsw").val();
                let newcpsw =$("#newcpsw").val();

                if(mb.trim()==""){
                    alert("Please Enter Mobile Number");
                    $("#mb").focus();
                    return false;
                }else if(!number.test(mb)){
                    alert("Mobile Number feild required only Numeric value");
                    $("#mb").val("");
                    $("#mb").focus();
                    return false;
                }else if(newpsw.trim()==""){
                    alert("Please Enter Password");
                    $("#newpsw").focus();
                    return false;
                }else if(newcpsw.trim()==""){
                    alert("Please Enter Confirm Password");
                     $("#newcpsw").focus();
                    return false;
                }else if(!pwd_expression.test(newpsw)){
                    alert("Upper case,Lower case,Specialcharacter and Numeric letters are required in Password feild");
                    $("#newpsw").focus();
                    return false;
                }else if(newpsw.trim()!=newcpsw.trim()){
                    alert("Password ="+newpsw+" & Confirm Password ="+newcpsw+" Not Match..");
                    $("#newpsw").val("");
                    $("#newcpsw").val("");
                    $("#newpsw").focus();
                }
            });
            $("#showpsw").click(function(){
                var x = $("#newpsw").attr("type");
                if(x==="password"){
                    $("#newpsw").attr("type","text");
                }else{
                    $("#newpsw").attr("type","password");
                }
            });
            $("#showpsw").click(function(){
                var x = $("#newcpsw").attr("type");
                if(x==="password"){
                    $("#newcpsw").attr("type","text");
                }else{
                    $("#newcpsw").attr("type","password");
                }
            });
        });
    </script>



    <style>
        *{
            font-family:"poppins",sans-serif;
        }
        .col{
            background:linear-gradient(326deg,#a4508b 0%,#5f0a87 74%);
        }
       
        
        button{
            color: white;
            /* text-decoration:none; */
            text-transform:uppercase;
            transition:0.4s all ease-in;
            overflow:hidden;
            border:2px solid white;
        }
        button:hover{
            background-color:white;
            color:purple;
            box-shadow: 0 0 5px white,0 0 25px white,0 0 50px white,0 0 200px white;
            -webkit-box-reflect: below 1px linear-gradient(transparent,#0005);
        }
    </style>
</head>
<body>
    <?php
        require_once("include/connection.php");
        if(isset($_POST['reset'])){
            $mb=trim($_POST['mb']);
            $newpsw=trim($_POST['newpsw']);  //newpsw is for new password
            $newcpsw=trim($_POST['newcpsw']);  // newcpsw is for conform new password
            $sqlforgot = "SELECT idregister FROM registration where mb='".$mb."'"; 
            $resultforgot =mysqli_query($con,$sqlforgot);
            if(mysqli_num_rows($resultforgot) > 0){
                $rowforgot = mysqli_fetch_assoc($resultforgot);
                $idregister = $rowforgot["idregister"];
                //update query
                $sqlforgotupdate = "update registration set password='".$newpsw."',cpsw='".$newcpsw."' where idregister='".$idregister."'";
                $set = mysqli_query($con,$sqlforgotupdate);
                echo "<script> alert('Password Reset SuccessFully...'); </script>";
			    echo "<script> window.location='index.php'; </script>";
 		    } else {
                echo "<script> alert('Please Valid new Password & Conform Password.'); </script>";
                echo "<script> window.location='index.php'; </script>";
 		    }
            
        }

    ?>

    <div class="container shadow bg-#7fcec5">
        <div class="row mt-5 mb-3">
            
            <div class="col col-lg-4 mx-auto bg-light">
                
                <div class="p-5 mb-3 mt-3">
                    <form action="" method="post"onsubmit="return validform()">
                        <h4 class="text-center text-size-auto text-light mb-2">FORGOT YOUR PASSWORD ?</h4>
                        <h6 class="mt-2 text-center text-light">Its Okay! reset your password</h6>

                        <div class="input-group bg-light mt-2">
                            <span class="input-group-text"><i class="fa fa-phone bg-light"></i></span>
                            <input type="text" class="form-control form-control-md" id="mb" name="mb"
                                placeholder="Enter Mobile Number">
                        </div>

                        <div class="input-group bg-light mt-2">
                            <span class="input-group-text"><i class="fa fa-lock bg-light"></i></span>
                            <input type="password" class="form-control form-control-md" id="newpsw" name="newpsw"
                                placeholder="Enter New Password">
                        </div>
                        <div class="input-group bg-light mt-2">
                            <span class="input-group-text"><i class="fa fa-lock bg-light"></i></span>
                            <input type="password" class="form-control form-control-md" id="newcpsw" name="newcpsw"
                                placeholder="Enter Confirm Password">
                        </div>
                        <div class="input-group bg-light mt-2">
                                <label for="cpsw"> Show Password</label>
                                <input type="checkbox" class="form-check-input" id="showpsw" name="showpsw" >
                            </div>
                        <div class="d-grid mt-3 mb-2">
                            <button type="submit" name="reset" id="reset" class="btn btn-lg btn-block border-white" onclick="validform()">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
                



            

            

         
      

        


                


                        


            




