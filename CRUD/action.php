<?php 
session_start(); 
    require_once 'Class/DB.php'; 
    $db = new DB(); 
        $tblName = 'users'; 
        $postData = $statusMsg = $valErr = ''; 
        $status = 'danger'; 
        $redirectURL = './index.php'; 
        $action_type=$_REQUEST['action_type'];
switch($action_type)
{ 
case "add":
    $postData = $_POST; 
    $name = !empty($_POST['name'])?trim($_POST['name']):''; 
    $dob = !empty($_POST['dob'])?trim($_POST['dob']):''; 
    $email = !empty($_POST['email'])?trim($_POST['email']):''; 
    $password = !empty($_POST['password'])?md5(trim($_POST['password'])):''; 
    $conditions = [ 
        'where' => [ 
            'email' => $email,
        ], 
        'return_type' => 'count' 
    ]; 
    $result = $db->getRows('users', $conditions); 

    if($result>0)
    {
    $valErr .= 'email already exist please choose another one<br/>'; 
    $redirectURL = './add.php';
    }
  
    if(empty($name)){ 
        $valErr .= 'Please enter your name.<br/>'; 
    } 
    if(empty($dob)){ 
        $valErr .= 'Please enter your date of birth.<br/>'; 
    } 
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    if(empty($password)){ 
        $valErr .= 'Please enter password.<br/>'; 
    }     
    if(empty($valErr)) { 
        $userData = [ 
            'name' => $name, 
            'dob' => $dob,
            'email' => $email, 
            'password' => $password
        ]; 
       
    $insert = $db->insert($tblName, $userData); 
    
    if($insert) {  
        $key = key($insert);
        $value = $insert[$key];
        $_SESSION['id']=$value;  

        $_SESSION['email']=$_POST['email'];
        $status = 'success'; 
        $statusMsg = 'User data has been added successfully!'; 
        $postData = ''; 
        $redirectURL = './dashboard.php';  
        }
        else
        { 
            $redirectURL = './add.php'; 
            $statusMsg = 'Something went wrong, please try again after some time.'; 
        }
        
    } else { 
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr,'<br/>'); 
    } 
     
  
        $sessData['postData'] = $postData; 
        $sessData['status']['type'] = $status; 
        $sessData['status']['msg'] = $statusMsg; 
        $_SESSION['sessData'] = $sessData; 

    
break;
case "login":
        $uname = $_POST['username'];
        $password = md5($_POST['password']);
        $conditions = [
       'where' => [ 
           'email' => $uname,
           'password' => $password
       ], 
       'return_type' => 'single' 
       ]; 
       $userData = $db->getRows('users',$conditions);  
   
    if($userData)
    {     
        $_SESSION['username'] = $_POST['username'];    
        $_SESSION['password'] = $_POST['password']; 
        $key = key($userData);
        $value = $userData[$key];
        $_SESSION['id'] = $value;
        $redirectURL='./view_profile.php';
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
    } 
    else
    {
        echo "invalid details";
    } 
    
break;
case "addmore":
  
    $id=$_SESSION['id'];
    $postData = $_POST; 
    $user_id=$_SESSION['id'];
    $table='details';    
    $number = $_POST['phone'];
    foreach($number as $value) {
    $tableName = 'user_phone';
    $userDataPhoneNumber = [ 
    'user_id' => $_SESSION['id'], 
    'phone_no' => $value,
    ]; 
    $add_number=$db->insert($tableName,$userDataPhoneNumber);
    } 
    $qual = $_POST['qual'];
    foreach($qual as $value)
    {
        $tableName = 'user_qualification';
        $userDataQualification = [
        'user_id' => $_SESSION['id'], 
        'qualification' => $value,
        ]; 
        $add_qualification=$db->insert($tableName,$userDataQualification);
    }
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];  
    $folder = "./image/".$filename;
    $image=$filename; 
    $uploadOk = 1; 
    $imageFileType = strtolower(pathinfo($folder,PATHINFO_EXTENSION));
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if($uploadOk == 0)
    {
        echo "Sorry";
    
    }
    else{
        move_uploaded_file($tempname,$folder);  
    }
    $address = !empty($_POST['address'])?trim($_POST['address']):''; 
    if(empty($number)){ 
        $valErr .= 'Please enter phone<br/>'; 
    } 
    if(empty($qual)){ 
        $valErr .= 'Please enter your qualification<br/>'; 
    } 
    if(empty($address)) { 
        $valErr .= 'Please enter your address <br/>'; 
    } 
    if(empty($image)){ 
        $valErr .= 'Please upload image<br/>'; 
    } 
    if(empty($valErr)){ 
 
        $userData = [ 
        'user_id' => $user_id, 
        'address' => $address, 
        'image' => $image,
        ];     
        $add_details = $db->insert($table, $userData);  
    }
    if($add_details) { 
        $status = 'success'; 
        $statusMsg = 'User has registered!'; 
        $postData = '';
        $redirectURL = './view_profile.php'; 
    } else { 
        $statusMsg = 'Something went wrong, please try again after some time.'; 
    }     
        $sessData['postData'] = $postData; 
        $sessData['status']['type'] = $status; 
        $sessData['status']['msg'] = $statusMsg; 
        $_SESSION['sessData'] = $sessData;
break;
case "update":   
        $redirectURL = 'update.php?id='.$_SESSION['id'];
        $id=$_SESSION['id'];             
        $postData = $_POST; 
        $name = !empty($_POST['name'])?trim($_POST['name']):''; 
        $dob = !empty($_POST['dob'])?trim($_POST['dob']):''; 
        $email = !empty($_POST['email'])?trim($_POST['email']):''; 
        $address = !empty($_POST['address'])?trim($_POST['address']):''; 

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./image/".$filename;  
        $image=$filename;  
        $uploadOk = 1; 
        if(isset($image))
        {
            $imageFileType =strtolower(pathinfo($folder,PATHINFO_EXTENSION));
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
             {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }
            if($uploadOk == 0)
            {
            echo "Sorry";    
            }
            else
            {
            move_uploaded_file($tempname,$folder);
            }          
        }
        if(empty($image))
        {      
        $value=$db->getdata();
        foreach($value as $values)
        {
            $img =$values['image'];
        }
        $userData = [ 
            'name' => $name, 
            'dob' => $dob,
            'email' => $email,            
            'address' => $address,
            'image' => $img
        ]; 
        }
        else
        {
            $userData = [ 
                'name' => $name, 
                'dob' => $dob,
                'email' => $email,            
                'address' => $address,
                'image' => $image 
            ]; 
        }
        $update=$db->updateProfile($userData,$id);
        $table1='user_phone';  
        $phone=$_POST['phone'];   
        $delete=$db->deletePhone($table1,$id);        
            foreach($phone as $value)
            {
                $userContact = [
                    'user_id' => $id,
                    'phone_no' => $value,
                ];
            $contact=$db->insert($table1,$userContact);
            }        
        $table2 = 'user_qualification';
        $qualification = $_POST['qualification'];
        $delete1 = $db->deleteQual($table2,$id);       
        foreach($qualification as $value)
            {
                $userQual = [
                    'user_id' => $id,
                    'qualification' => $value,
                    ];  
               
            $qual=$db->insert($table2,$userQual);  
            }         
        if(($update == true && $contact == true) && ($qual == true))
        { 
        $redirectURL = './view_profile.php';
        $status = 'success'; 
        $statusMsg = 'User data has been updated successfully!'; 
        $postData = '';           
        }
         else{ 
        $statusMsg = 'Something went wrong, please try again after some time.'; 
        } 
        $sessData['postData'] = $postData; 
        $sessData['status']['type'] = $status; 
        $sessData['status']['msg'] = $statusMsg; 
        $_SESSION['sessData'] = $sessData;     
break;
case "change_pass":

        $id=$_SESSION['id']; 
        $table='users';
        $username= !empty($_POST['email'])?trim($_POST['email']):'';
        $oldpass = !empty($_POST['opas'])?md5(trim($_POST['opas'])):'';
        $newpass = !empty($_POST['npas'])?md5(trim($_POST['npas'])):'';
        $confpass = !empty($_POST['cpass'])?trim($_POST['cpass']):'';
        $conditions = [ 
        'where' => [ 
        'email' => $username,
        'password' => $oldpass,            
        ], 
        'return_type' => 'count' 
        ]; 
    
        $oldpassword = $db->getRows($table,$conditions);  
    if($oldpassword > 0)
    {
        $userData=[
            'password' => $newpass,
        ];
        $updatepassword=$db->changepass($userData,$id);      
    }  
    else
    {
        echo "<script>window.alert('old password wrong');window.location.href='./change_pass.php';</script>";       
        exit;
    } 
    if($updatepassword) { 
        $redirectURL = './index.php'; 
        $status = 'success'; 
        $statusMsg = 'User data has been added successfully!'; 
        $postData = '';          
       
    } else { 
        $statusMsg = 'old password is incorrect or something went wrong'; 
    } 
break;
}
header("Location:$redirectURL");
?>
