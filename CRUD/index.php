
<?php
session_start();

 if(isset($_SESSION['id']))
 {
    require_once 'Class/DB.php'; 
    $db = new DB(); 
    $conditions = [ 
        'where' => [
            'user_id' => $_SESSION['id'],            
        ], 
        'return_type' => 'single' 
        ]; 
        $var=$db->getRows('details',$conditions);
    if(empty($var))
    {
        header("Location:./dashboard.php");
            exit;  
    }
    else{
        header("Location:./view_profile.php");
    }
 }
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="bg-dark">
 
<div class="container h-100">
<div class="row h-100 mt-5 justify-content-center align-items-center">
<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
<h1 class="mx-auto w-25" >Login</h1>
<!-- <?php 
	if(isset($errors) && count($errors) > 0)
	{
		foreach($errors as $error_msg)
		{
						echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
	}


	// $userdetail=$db->userid;
?> -->
<form action="action.php" id="loginForm" name="form1" onsubmit="return validate()"; method="post">
<div class="form-group" id="logout">
<label for="username" class="control-label">Username / Email id</label>
<input type="text" class="form-control" id="username" name="username"   title="Please enter you username or Email-id" placeholder="email or username" >
<span class="help-block"></span>
</div>
<div class="form-group" id="logout">
<label for="password" class="control-label">Password</label>
<input type="password" class="form-control" id="password" name="password" placeholder="Password"   title="Please enter your password">
<span class="help-block"></span>
</div>
 <input type="hidden" name="action_type" value="login"/>
 <input type="submit" class="btn btn-primary" name="login" value="Login"/>
<!-- <button type="submit" class="btn btn-success" name="login"></button> -->
<a href="add.php" class="btn btn-primary">Signup</a>
</form>
</div>
</div>
</div>


<script>
	function validate()
	{
		var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
		var check =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ 
		var checks = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/
		

		if (username == "") {   
        alert("must have an username/emailid")    
        document.form1.username.focus();
        return false;
    }
    
    if (password == "") {
        alert("must have a password");
        document.form1.password.focus();
        return false;
    }
	if(check.test(email))
    {
        alert("you have provided a valid email");
    }
    else
    {
        alert("invalid email");
    }
    if(checks.test(password))
    {
        alert("You have provided a strong password")
    }
    else{
        alert("password is not strong");
    }
	}
</script>
</body>
</html>
 