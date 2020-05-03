<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Trainer'])) {
        //them
    $name_tutor=$_POST['name_tutor'];
    $Working_place_tutor=$_POST['Working_place_tutor'];
    $email_tutor=$_POST['email_tutor'];
    $telephone_tutor=$_POST['telephone_tutor'];

    $sql="Insert Into tutor_manager(name_tutor, Working_place_tutor, email_tutor, telephone_tutor) values('".$name_tutor."','".$Working_place_tutor."','".$email_tutor."','".$telephone_tutor."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
    } 
} 
elseif (isset($_POST['update_Trainer'])) {

    $id=$_GET['id'];    
    $name_tutor=$_POST['name_tutor'];
    $Working_place_tutor=$_POST['Working_place_tutor'];
    $email_tutor=$_POST['email_tutor'];
    $telephone_tutor=$_POST['telephone_tutor'];

    $sql = "UPDATE tutor_manager SET name_tutor = '".$name_tutor."', Working_place_tutor = '".$Working_place_tutor."', email_tutor = '".$email_tutor."', telephone_tutor = '".$telephone_tutor."' WHERE id_tutor = $id"; 
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
    }    

}
else{
    $id=$_GET['id'];
    $sql="DELETE FROM tutor_manager WHERE id_tutor = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);    
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/TrainerManager.php";';
        echo '</script>';
    } 
}
?>
