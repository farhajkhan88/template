<?php

require 'config.php';







if(isset($_POST['Registration'])){

    $name           =   mysqli_real_escape_string($db,$_POST['name']);
    $email          =   mysqli_real_escape_string($db,$_POST['email']);
    $companyname    =   mysqli_real_escape_string($db,$_POST['companyname']);
    $companytype    =   mysqli_real_escape_string($db,$_POST['companytype']);
    $password       =   mysqli_real_escape_string($db,$_POST['password']);
    $phone          =   mysqli_real_escape_string($db,$_POST['phone']);
    $country        =   mysqli_real_escape_string($db,$_POST['country']);
    $city           =   mysqli_real_escape_string($db,$_POST['city']);
    $state          =   mysqli_real_escape_string($db,$_POST['state']);
    $zipcode        =   mysqli_real_escape_string($db,$_POST['zipcode']);
    $address        =   mysqli_real_escape_string($db,$_POST['address']);
    
    if(!empty($name)|!empty($email)|!empty($companyname)|!empty($companytype)|!empty($password)|!empty($phone)|!empty($country)|!empty($city)|!empty($state)|!empty($zipcode)|!empty($address)){
       
        $fetch= "SELECT email FROM user WHERE email = '$email'";
        $query1 = $db->query($fetch);
        if($query1->fetch_row() > 0){
            echo "Email Already Exists Please try Another";
        }
        else {
        
        
        $btcryp = password_hash($password,PASSWORD_BCRYPT);
    
        
        $insert ="INSERT INTO  `user`(`name`, `email`, `password`, `company_name`, `company_type`, `phone`, `country`, `city`, `state`, `zip_code`, `address`, `role`) VALUES('$name','$email','$btcryp','$companyname','$companytype','$phone','$country','$city','$state','$zipcode','$address','user')";
        $query = $db->query($insert);
        if($query >0){
            echo "Insert The Records";
            header("location:login_form.php");
        }
        else{
            echo "Fields Are Required";
        }
    }
        
    }
    else{
            echo "";
    }
}
?>