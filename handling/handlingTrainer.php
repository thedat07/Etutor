<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Trainer'])) {
        //them
    $name_Trainer=$_POST['name_Trainer'];
    $Working_place_Trainer=$_POST['Working_place_Trainer'];
    $email_Trainer=$_POST['email_Trainer'];
    $telephone_Trainer=$_POST['telephone_Trainer'];

    $sql="Insert Into Trainer_manager(name_Trainer, Working_place_Trainer, email_Trainer, telephone_Trainer) values('".$name_Trainer."','".$Working_place_Trainer."','".$email_Trainer."','".$telephone_Trainer."')";
    
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
    $name_Trainer=$_POST['name_Trainer'];
    $Working_place_Trainer=$_POST['Working_place_Trainer'];
    $email_Trainer=$_POST['email_Trainer'];
    $telephone_Trainer=$_POST['telephone_Trainer'];

    $sql = "UPDATE Trainer_manager SET name_Trainer = '".$name_Trainer."', Working_place_Trainer = '".$Working_place_Trainer."', email_Trainer = '".$email_Trainer."', telephone_Trainer = '".$telephone_Trainer."' WHERE id_Trainer = $id"; 
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
    $sql="DELETE FROM Trainer_manager WHERE id_Trainer = $id";
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
