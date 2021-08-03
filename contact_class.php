<?php

require 'config.php';
session_start();


if(isset($_POST['contact_us'])){

    $name           =   mysqli_real_escape_string($db,$_POST['c_name']);
    $email          =   mysqli_real_escape_string($db,$_POST['c_email']);
    $phone          =   mysqli_real_escape_string($db,$_POST['c_phone']);
    $companyname    =   mysqli_real_escape_string($db,$_POST['c_companyname']);
    $subject        =   mysqli_real_escape_string($db,$_POST['c_subject']);
    $message        =   mysqli_real_escape_string($db,$_POST['c_message']);
    
    if(!empty($name)|!empty($email)|!empty($phone)|!empty($companyname)|!empty($subject)|!empty($message)){
        
        
        $insert ="INSERT INTO  `contact_us`(`name`,`email`,`phone`,`company_name`,`subject`,`message`) VALUES('$name','$email','$phone','$companyname','$subject','$message')";
        $query = $db->query($insert);
        if($query >0){
          $_SESSION['msg'] = "Thanks For Contact Us";
          $_SESSION['icon'] = "success";
          echo $_SESSION['msg'];
               header("Location:contact.php");    
        }
        else{           

            $_SESSION['msg'] = "Your Message not Successfully Submit";
            $_SESSION['icon'] = "error";
            header("Location:contact.php");
        }
        
    }
    else{
        $_SESSION['msg'] = "Fields Are Required";
        $_SESSION['icon'] = "warning";
        header("Location:contact.php");
    }
}
else{
    $_SESSION['msg'] = "Some Thing Wrong";
    $_SESSION['icon'] = "error";
    header("Location:contact.php");
}
?>