<?php
require 'config.php';


if(isset($_POST['check_email_btn'])){
 $email = $_POST['email'];



$fetch= "SELECT email FROM user WHERE email = '$email'";
$query = $db->query($fetch);

if($query->fetch_row() > 0) {
    echo "Email Already Exists Please try Another";
}else{

}


}

?>