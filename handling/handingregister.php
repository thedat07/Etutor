<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Register'])) {
        //them
    $username=$_POST['username'];
    $password=md5($_POST['password']); 
    $permision=$_POST['permision'];
    $email=$_POST['email'];
    $name=$_POST['name'];

    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");


    $sql="select * from users where username='$username'";
    $kt=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($kt)  > 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Username available!");'; 
        echo 'window.location.href = "../manager/register.php";';
        echo '</script>';
        
    } 
    else{

        $sql="Insert Into users(username, password, permision, name, email) values('".$username."','".$password."','".$permision."','".$name."','".$email."')";
        $cn = new DBConnector();
        $return = $cn->execStatement($sql);
        if ($return==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Add Failure!");'; 
            echo 'window.location.href = "../view/register.php";';
            echo '</script>';

        }else{ 
            echo '<script type="text/javascript">';     
            echo 'alert("Add Success!");'; 
            echo 'window.location.href = "../view/register.php";';
            echo '</script>';
        } 
    }

}

elseif (isset($_POST['update_Register'])) {

    $id=$_GET['id'];    
    $password=md5($_POST['password']); 
    $permision=$_POST['permision'];
    $email=$_POST['email'];
    $name=$_POST['name'];





         $sql = "UPDATE users SET  password = '".$password."', permision = '".$permision."', name = '".$name."', email = '".$email."' WHERE id = $id"; 
        $cn = new DBConnector();
        $return = $cn->execStatement($sql);
        if ($return==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Update Failure!");'; 
            echo 'window.location.href = "../view/register.php";';
            echo '</script>';

        }else{ 
            echo '<script type="text/javascript">';     
            echo 'alert("Update Success!");'; 
            echo 'window.location.href = "../view/register.php";';
            echo '</script>';
        } 
    }


else{
    $id=$_GET['id'];
    $sql="DELETE FROM users WHERE id = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/register.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/register.php";';
        echo '</script>';
    } 
}
?>
