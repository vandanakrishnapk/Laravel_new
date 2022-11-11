
<?php
session_start();
    if(!isset($_SESSION['id']))
    {
        header("Location:index.php");
    }
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
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add more details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
    .input-group {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .nav-item 
    {
        list-style-type:none;
    }
    </style>
</head>
<body>
    <div class="container-fluid bg-primary">
        <div class="row">
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">       
        <li class="nav-item">
        <a href="change_pass.php" class="btn btn-success float-right">Change Password</a>
        </li>
        <li class="nav-item">
        <a class="nav-link btn btn-danger" aria-current="page" href="logout.php">Logout</a>
        </li>
        </ul>
    </div> 
    </div>
    </div>
    <div class="container" style="margin-top: 30px;">
    <div class="col-xs-6 col-xs-offset-3">
        <div class="panel panel-success">
            <div class="panel-body">
                <h1>Add More Details</h1>
                <form action="action.php" name="demo-form" method="post" onsubmit="return validate()"; enctype="multipart/form-data">
             <div class="textbox-wrapper">
                <div class="input-group">
                        <label>Enter Phonenumber</label>
                        <input type="text" name="phone[]" id="phone" class="form-control" />
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success add-textbox"><i class="glyphicon glyphicon-plus"></i></button>
                    </span>
                 </div>
                </div>
                <div class="textbox-wrapper-qual">
                    <div class="input-group">
                        <label>Enter Qualification from highest..</label>
                        <input type="text" name="qual[]" id="qual" class="form-control" />
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success add-text"><i class="glyphicon glyphicon-plus"></i></button>
                        </span>
                    </div>
                </div>
                <div class="address">
                    <label>Enter Address</label>
                    <textarea cols="55" rows="3" id="addres" name="address"></textarea>
                </div>
                <div class="image">
                    <label>Upload photo</label>
                    <input type="file" id="images" name="image"><br><br>
                </div>
                <div class="form-group">
                    <input type="hidden" name="action_type" value="addmore"/>
                    <input type="submit" class="btn btn-success" name="dash" value="submit"/>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
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
        var max = 4;
        var cnt = 1;
        $(".add-text").on("click", function(e){
            e.preventDefault();
            if(cnt <= max){
                cnt++;
              
                $(".textbox-wrapper-qual").append('<div class="input-group"><input type="text" name="qual[]" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-danger remove-textbox"><i class="glyphicon glyphicon-minus"></i></button></span></div>');
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
    </script>  
    <script>
        function validate()
        {
var name = document.getElementById("phone").value;
var dob = document.getElementById("qual").value;
var email = document.getElementById("addres").value;
var password = document.getElementById("images").value;




        }

    </script> 
    </body>

</html>
