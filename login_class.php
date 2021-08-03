<?php
require 'config.php';
session_start();

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($db,$_POST['email']);
    $paassword = mysqli_real_escape_string($db,$_POST['password']);
        echo $email;
        echo $paassword;
     $result ="select * from user where  `email` ='$email'";
    $login =$db->query($result);
    
    if($login->num_rows > 0){
        $data   = $login->fetch_assoc();
        $check  = $data['password'];
       $checked = password_verify($paassword,$check);
       if($checked){
           echo "Welcome";
         $_SESSION['logged_in']    =  true;
         $_SESSION['u_id']         =  $data['id'];
         $_SESSION['name']         =  $data['name'];
         $_SESSION['email']        =  $data['email'];
         $_SESSION['company_name'] =  $data['company_name'];
         $_SESSION['company_type'] =  $data['company_type'];
         $_SESSION['phone']        =  $data['phone'];
         $_SESSION['country']      =  $data['country'];
         $_SESSION['city']         =  $data['city'];
         $_SESSION['state']        =  $data['state'];
         $_SESSION['zip_code']     =  $data['zip_code'];
         $_SESSION['address']      =  $data['address'];
         $_SESSION['role']         =  $data['role'];
         header('Location:..\Admin\index.php');
         ob_end_flush();
        
       }else{
           echo "failed to login";
       }
       
    }

    else{
        Echo "Error";
    }
}

?>