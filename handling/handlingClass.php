<?php
session_start();

if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
    require_once('../config/dbconnector.php');

    $id=$_GET['id'];
    $sql="DELETE FROM class WHERE id = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
      echo '<script type="text/javascript">'; 
      echo 'alert("Cannot Delete!");'; 
      echo 'window.location.href = "../view/Class.php";';
      echo '</script>';
      
    }else{    
      echo '<script type="text/javascript">';  
      echo 'alert("Delete Success!");'; 
      echo 'window.location.href = "../view/Class.php";';
      echo '</script>';
    } 

  
}



?>