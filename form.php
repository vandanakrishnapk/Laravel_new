
 
 <?php
$name_err=$age_err=$mob_err=$email_err=NULL;
$name=$age=$mobile=$email=NULL;
$flag=true;
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(empty($_POST['na']))
    {
        $name_err="Name  is required";
        $flag=FALSE;
    }
    else {
        $name=test_input($_POST['na']);
        if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
            $ErrMsg = "Only alphabets and whitespace are allowed.";  
                     echo $ErrMsg;  
        }
        }

    if(empty($_POST['ag']))
    {
        $age_err ="Age is required";
        $flag=FALSE;
    }
    else {
        $age=test_input($_POST['ag']);
    }
    if(empty($_POST['mo']))
    {
        $mob_err="Mobile number is required";
        $flag=FALSE;
    }
    else {
        
            $mobile=test_input($_POST['mo']);
            if (!preg_match ("/^[0-9]*$/", $mobile) ){  
                $ErrMsg = "Only numeric value is allowed.";  
                echo $ErrMsg;  
            }
        }
    if(empty($_POST['em'])){
        $email_err="Email is required";
        $flag=FALSE;
    }
    else{
        $email=test_input($_POST['em']);
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $email) ){  
        $ErrMsg = "Email is not valid.";  
        echo $ErrMsg;  
}
    }

    }
    function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

        }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form validation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>

.error {color: #FF0000;}

</style>
</head>
<body>   
   <form action="form.php"  method="post">
   <div class="form-group">
    <label class="label">Enter Name</label>
    <input type="text" class="form-control-file"  name="na">
    <span class="error">* <?php echo $name_err;?></span><br>
</div>
<div class="form-group">
    <label class="label">Enter Age</label>
    <input type="number" class="form-control-file"  name="ag">
    <span class="error">* <?php echo $age_err;?></span><br>
    </div>
    <div class="form-group">
    <label class="label">Enter Mobile Number</label>
    <input type="number" class="form-control-file"  name="mo">
    <span class="error">* <?php echo $mob_err;?></span><br>
    </div>
    <div class="form-group">
    <label class="label">Email Id</label>
    <input type="email" class="form-control-file"  name="em">
    <span class="error">* <?php echo $email_err;?></span><br>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-secondary" name="sub" value="show profile">
     </div>
   </form>
</div>
<form>
<div class="form-group">
    <label class="label">Your Name</label>
    <input type="text" class="form-control-file"  name="na" value="<?php echo $name ?>"><br>
</div>
<div class="form-group">
    <label class="label">Your Age</label>
    <input type="number" class="form-control-file"  name="ag" value="<?php echo $age ?>"><br>
    </div>
    <div class="form-group">
    <label class="label">Your Mobile Number</label>
    <input type="number" class="form-control-file"  name="mo" value="<?php echo $mobile ?>"><br>
    </div>
    <div class="form-group">
    <label class="label">Your Email Id</label>
    <input type="email" class="form-control-file"  name="em" value="<?php echo $email ?>"><br>
    </div>    
</div>
</form>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js">
   </script>  
    
</body>
</html>





