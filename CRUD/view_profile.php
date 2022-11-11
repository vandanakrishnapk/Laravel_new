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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styleprofile.css">
    <title>view_profile</title>
    <style>
        .table
        {
            margin-left: 5%;
            margin-right:5%;            
            border:2px solid black;
            padding-right:25%;
            margin-top:2%;
            width:350px;
        }
        .btn
        {
     margin-top:10px;
     margin-bottom:10px;
     margin-right:10px;
     margin-left:10px;
        }
      
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">      
        <li class="nav-item">
        <a href="change_pass.php" class="btn btn-success float-right">Change Password</a>
        </li>
        <a href="update.php" class="btn btn-danger float-right">Update_Profile</a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link active btn btn-primary" aria-current="page" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<table class="table table-primary table-hover">
<?php 
session_start();
require_once __DIR__.'/Class/DB.php';
$db = new DB();
$userphone=$db->getPhone();
$userqual=$db->getQual();

  foreach( $db->getData() as $item)
  { ?>
   <tr>
      <td colspan="2"><center><img src="image/<?php echo $item['image'];?>" alt="" width="120" height="140"></center> </td>
    </tr>
    <tr>
    <tr>
      <th>Name</th>
      <td><?php echo $item['name'];?></td>
    </tr>
    <tr>
      <th>Dob</th>
      <td><?php echo $item['dob']; ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $item['email']; ?></td>
    </tr>   
    <tr>
    <tr>
      <th>Address</th>
      <td><?php echo $item['address']; ?> </td>
    </tr>
    
   
      <th>Phone</th>
      <td><?php if(!empty($userphone)){ foreach($userphone as $row){ echo $row['phone_no'] ."  ";}} ?></td>    
    </tr>
    <tr>
      <th>Qualification</th>
      <td><?php if(!empty($userqual)){ foreach($userqual as $row){ echo $row['qualification'] ."  ";}} ?></td>   
    </tr>
   
  <?php } ?>


</table>

</body>
</html>
