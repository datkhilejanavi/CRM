<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link href="data/boostraplib.css" rel="stylesheet">
    <script src="data/jquery.js"></script>
    <script src="data/icon.js"></script>

    <style>
        .col-lg-4 {
            background: linear-gradient(315deg, #00bfb2 0%, #028090 74%);
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#register").click(function(){
                let letters =/^[A-Za-z]+$/;
                let filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                let number = /^[0-9]+$/;
                let pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;

                let fname =$("#fname").val();
                let mb =$("#mb").val();
                let email =$("#email").val();
                let psw =$("#psw").val();
                let cpsw =$("#cpsw").val();

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
                }else if(psw.trim()==""){
                    alert("Pleade Enter Password");
                    $("#psw").focus();
                    return false;
                }else if(cpsw.trim()==""){
                    alert("Please Enter Confirm Password");
                     $("#cpsw").focus();
                    return false;
                }else if(!pwd_expression.test(psw)){
                    alert("Upper case,Lower case,Specialcharacter and Numeric letters are required in Password feild");
                    $("#psw").val("");
                    $("#psw").focus();
                    return false;
                }else if(psw.trim()!=cpsw.trim()){
                    alert("Password ="+psw+" & Confirm Password ="+cpsw+" Not Match..");
                    $("#psw").val("");
                    $("#cpsw").val("");
                    $("#psw").focus();
                }else{
                    alert("Thank You for Registration...");
                    return true;
                }
            });
            $("#showpsw").click(function(){
                var x = $("#psw").attr("type");
                if(x==="password"){
                    $("#psw").attr("type","text");
                }else{
                    $("#psw").attr("type","password");
                }
            });
            $("#showpsw").click(function(){
                var x = $("#cpsw").attr("type");
                if(x==="password"){
                    $("#cpsw").attr("type","text");
                }else{
                    $("#cpsw").attr("type","password");
                }
            });
        });
                    
    </script>
</head>
<body>
    <div class="container">
        <div class="row m-5">
            <div class="col-sm-4 col-md-4 col-lg-4 d-block">
                <div class=" container mt-2 p-5">
                    <h1 class="text-light text-center">Welcome Back!</h1>
                    <h6 class="mt-4 text-light">To keep connected with us please login with your personal info</h6>
                    <div class="d-grid gap-3 mt-4">
                        <button type="button" class="btn btn-outline-light"onclick="window.location='index.php'" >SIGN IN</button>
                    </div>
                </div>
                <img src="images/city2.jpg" class="img-fluid img-responsive mb-1" width="400" height=600 alt="sample image" style="background-size:cover !important;">
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 shadow mt-2 p-5 ">
               
    
                    <h2 style="text-align: center;" class="mt-3">REGISTRATION FORM</h2>
                    <h6 style="text-align: center;" class="mt-2 mb-3">Use your email for registration</h6>
                    
                        <form action="save.php" method="post" onsubmit="return validform()">
    
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" placeholder="Enter name" id="fname" name="fname" required>
                                <label for="fn">First Name</label>
                            </div>
    
                            <div class="form-floating mt-2">
                                <input type="tel" class="form-control" id="mb" name="mb"
                                    placeholder="Enter your mobile number" required>
                                <label for="mb">Mobile Number</label>
                            </div>
    
                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your Email id" required>
                                <label for="email">Email Id</label>
                            </div>
    
                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="psw" name="psw"
                                    placeholder="Enter your password" required>
                                <label for="password">Password</label>
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="cpsw" name="cpsw"
                                    placeholder="Enter your conform password" required>
                                <label for="cpsw"> Conform Password</label>
                            </div>
                            <div class="form-check mt-2">
                                <label for="cpsw"> Show Password</label>
                                <input type="checkbox" class="form-check-input" id="showpsw" name="showpsw" >
                            </div>

                            <div class="d-grid gap-3 ">
                                <button type="submit" id="register" name="register"  class="btn btn-primary btn-block bt-lg mt-3 mb-3" onclick="validform()">Register</button>
                            </div>
                        </form>
                    
            </div>
    
            </div>
        </div>
    </div>   
</body>
</html>
    
    
    
    
        
        
    
    
    
    
    

                
                    
                



    

 
                



