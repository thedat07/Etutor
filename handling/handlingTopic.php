<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Topic'])) {
        //them
    $name_topic_manager=$_POST['name_topic_manager'];
    $descriptions_topic_manager =$_POST['descriptions_topic_manager'];
    $id_Course_manager=$_POST['id_Course_manager'];

    $sql="Insert Into topic_manager(name_topic_manager, descriptions_topic_manager, id_Course_manager) values('".$name_topic_manager."','".$descriptions_topic_manager."','".$id_Course_manager."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
    } 
} 
elseif (isset($_POST['update_Topic'])) {

    $id=$_GET['id'];    
    $name_topic_manager=$_POST['name_topic_manager'];
    $descriptions_topic_manager =$_POST['descriptions_topic_manager'];
    $id_Course_manager=$_POST['id_Course_manager'];

    $sql = "UPDATE topic_manager SET name_topic_manager = '".$name_topic_manager."', descriptions_topic_manager = '".$descriptions_topic_manager ."', id_Course_manager = '".$id_Course_manager."' WHERE id_topic_manager = $id"; 
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
    }  

}
else{
    $id=$_GET['id'];
    $sql="DELETE FROM topic_manager WHERE id_topic_manager = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/TopicManager.php";';
        echo '</script>';
    } 
} 

?>
