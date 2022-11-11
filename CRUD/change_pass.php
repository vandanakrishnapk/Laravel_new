
<?php 
session_start();
if(!isset($_SESSION['id']))
    {
        header("Location:index.php");
    }
    
?>
    <?php if(!empty($statusMsg)){ ?>
        
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylepass.css">
    <title>Document</title>

</head>
<body>

    <div>
  
    <form action="action.php" method="POST">
      
        <center><h3>Change Password</h3></center>
        <label class="form-field-control">Username/EmailID</label>
        <input class="form-field-controls" type="email" name="email"><br>
        <label class="form-field-control">old password </label>
        <input class="form-field-controls" type="password" name="opas"><br>
        <label class="form-field-control">New Password</label>
        <input class="form-field-controls" type="password"  name="npas"><br>
        <label class="form-field-control">Confirm new password</label>
        <input class="form-field-controls"type="password" name="cpass"><br>
        <input type="hidden" name="action_type" value="change_pass">
        <center><input type="submit" class="btn btn-success" value="change"></center>        
    </div>
    </form>
</body>
</html>
