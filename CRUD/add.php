<?php

session_start();   
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $status = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
}  
    $postData = array(); 
if(!empty($sessData['postData'])){ 
    $postData = $sessData['postData']; 
    unset($_SESSION['postData']); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add profile</title> 

    <style>
        body
        {
            background-color:grey;
        }
        .registartion-form
        {
            border:1px solid blue;
            margin-left:20%;
            margin-right:45%;
            margin-top:2%;
            background: #A9C9E1;
        }
        .form-control
        {
            width: 300px;
            margin-left:100px;
            margin-top:10px;
            margin-bottom:10px;
        }
        .label 
        {
            margin-left:20%;
            padding: 5px;
        }
        #btn 
        {
            margin-left:35%;
            margin-bottom:10px;
        }
        h3
        {
            color:pink;
            margin-left:20%;
            margin-top:5%;
        }   
    </style>

</head>
<body>
<div class="row">
    <div class="col-md-12 head">
    <h3><b>Register Now</b></h3>       
    </div>
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>
    
    <div class="col-md-12">
    <form method="post" action="action.php" name="form1" onsubmit = "return validate()";  class="registartion-form">
    <div class="form-group">
    <label class="label">Name</label>
    <input type="text" class="form-control" id="names" name="name"  value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>">
    </div>
    <div class="form-group">
    <label class="label">Dob</label>
    <input type="date" class="form-control" id="dobs"  name="dob" value="<?php echo !empty($postData['dob'])?$postData['dob']:''; ?>">
    </div>
    <div class="form-group">
    <label class="label">Email</label>
    <input type="text" class="form-control" id="emails" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>">
    </div>
    <div class="form-group">
    <label class="label">Password</label>
    <input type="password" class="form-control" id="passwords" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" value="<?php echo !empty($postData['password'])?$postData['password']:''; ?>">
    </div>
    <input type="hidden" name="action_type" value="add"/> 
    <input type="submit" class="btn-primary" id="btn" name="submit" value="Add User"/>
    </form>
    </div>
    </div>
<script>
function validate()
 {   
var name = document.getElementById("names").value;
var dob = document.getElementById("dobs").value;
var email = document.getElementById("emails").value;
var password = document.getElementById("passwords").value;
var check =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ 
var checks = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/

    if (name == "") {   
        alert("must have a name")    
        document.form1.name.focus();
        return false;
    }
    
    if (dob =="") {
        alert("must have a date of birth");
        document.form1.dob.focus();
        return false;
    }

    if (email == "") {
        alert("must have an email");
        document.form1.email.focus();
        return false;
    }
    
    if(password == "")
    {
        alert("must have a password");
        document.form.password.focus();
        return false;
    }
    if(!check.test(email))
    {
   
        alert("invalid email");
        return false;
    }
    if(!checks.test(password))
    {
    
        alert("password is not strong");
        return false;
    }
   
    return true;
}

</script>
</body>
</html>

