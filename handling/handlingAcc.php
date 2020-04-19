<?php 
require_once('../config/dbconnector.php');
if (isset($_POST['update_user'])) {

    $username=$_GET['username'];  
    $password=$_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];

    $sql = "UPDATE users SET username = '".$username."', password = '".$password."', name = '".$name."', email = '".$email."' WHERE username = '$username'"; 

    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../manager/Account.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../manager/Account.php";';
        echo '</script>';
    }   

}

?>