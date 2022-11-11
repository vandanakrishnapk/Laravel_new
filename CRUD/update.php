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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="st.css">
    <title>Document</title>
    <style>
.label
{
    width:350px;
    font-size:small;
    color:black; 
}
 .form
 {
    width:750px;
    padding:5%;
    color:black;
 }  
 .input 
 {
    margin-left:140px;
 }
 .input-group
{
    width:250px;
    margin-left:30%;
}
#dob 
{
    margin-left:150px;
    
}
#address
{
    margin-left:120px;
}
    </style>
</head>

<body>
<div class="container">
<div class="row">  

    <center><h1 class="btn-primary">Edit Profile</h1></center>       
     <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <?php 
    require_once __DIR__.'/Class/DB.php';
    $db = new DB();
    $userphone=$db->getPhone();
    $userqual=$db->getQual();
    foreach($db->getData() as $item)
    { ?>
        <form method="post" action="action.php" class="form" enctype="multipart/form-data">       
            <div class="update">
                <label class="label">Name</label>
                <input type="text" class="input" name="name" value="<?php echo $item['name']?>"><br>
        
                <label class="label">Dob</label>
                <input type="date" id="dob" class="input" name="dob" value="<?php echo $item['dob']?>"><br>
          
                <label class="label">Email</label>
                <input type="email" class="input" name="email" value="<?php echo $item['email']?>"><br> 
                              
                <div class="textbox-wrapper">
                <label class="label">Phone</label>
                <div class="input-group">
                <?php
                foreach($userphone as $row)
                {     ?> 
                <div class="inputfield"> 
                <input type="text" name="phone[]" class="form-control" value="<?php if(!empty($userphone)){ echo $row['phone_no'] ." ";} ?>" /><br>
                <button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-minus"></i></button>
                </div>
                <?php  } ?>
                <span class="input-group-btn">
                <button type="button" class="btn btn-success add-textbox"><i class="glyphicon glyphicon-plus"></i></button>
                </span>
                </div>
                </div><br>
 
              <div class="textbox-wrapper-qual">
              <label class="label">Qualification</label>  
              <div class="input-group">  
                    <?php
                    foreach($userqual as $row)
                    { ?>   
               <div class="inputs">               
               <input type="text" class="form-control" name="qualification[]" value="<?php if(!empty($userqual)){ echo $row['qualification'] ." ";} ?>" /><br>              
               <button type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-minus"></i></button>
               </div>
                <?php } ?>
               
               <span class="input-group-btn">
                <button type="button" class="btn btn-success add-text"><i class="glyphicon glyphicon-plus"></i></button>
                 </span>
               </div>
              </div>     <br>         
              <label class="label1">Address</label>
              <input type="text" id="address" class="input" name="address" value="<?php echo $item['address']?>"><br>
                
              <label class="label1">Profile Photo</label>
             <input type="file" class="input" name="image" value="<?php echo $item['image'] ?>"><br>
            </div>
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
            <input type="hidden" name="action_type" value="update"/>
            <center><input type="submit" class="btn btn-primary" name="submit"  value="Update_Profile"/></center>          
          </div>
          </form>
          </div>
          </div>


<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var max = 2;
        var cnt = 1;
        $(".add-textbox").on("click", function(e){
            e.preventDefault();
            if(cnt <= max){
                cnt++;
               
                $(".textbox-wrapper").append('<div class="input-group"><input type="text" name="phone[]" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-danger remove-textbox"><i class="glyphicon glyphicon-minus"></i></button></span></div>');
            }
            else{

                alert("only allow 3 rows");
            }
         
        });
       
        $(".textbox-wrapper").on("click",".remove-textbox", function(e){
            e.preventDefault();
            $(this).parents(".input-group").remove();
            cnt--;
        });        
    });
    $(document).ready(function() {
       
        $(".textbox-wrapper").on("click",".remove", function(e){
            e.preventDefault();
            $(this).parents(".inputfield").remove();
            cnt--;
        });  
    });

    $(document).ready(function() {
        var max = 4;
        var cnt = 1;
        $(".add-text").on("click", function(e){
            e.preventDefault();
            if(cnt <= max){
                cnt++;
              
                $(".textbox-wrapper-qual").append('<div class="input-group"><input type="text" name="qualification[]" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-danger remove-textbox"><i class="glyphicon glyphicon-minus"></i></button></span></div>');
            }
            else{
                alert("only allow 5 rows");
            }
           
        });
       
        $(".textbox-wrapper-qual").on("click",".remove-textbox", function(e){
            e.preventDefault();
            $(this).parents(".input-group").remove();
            cnt--;
        });
    });    
    $(document).ready(function() {
       
       $(".textbox-wrapper-qual").on("click",".remove", function(e){
           e.preventDefault();
           $(this).parents(".inputs").remove();
           cnt--;
       });  
   });
    </script>  
</body>
</html>