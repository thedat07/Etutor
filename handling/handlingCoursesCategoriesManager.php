

<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Courses_categories'])) {
        //them
    $name_category=$_POST['name_category'];
    $descriptions_Courses_categories=$_POST['descriptions_Courses_categories'];

    $sql="Insert Into courses_categories_manager(name_category, descriptions_Courses_categories) values('".$name_category."','".$descriptions_Courses_categories."')";
    
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Add Failure!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Add Success!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
    } 
} 
elseif (isset($_POST['update_Courses_categories'])) {

    $id=$_GET['id'];    
    $name_category=$_POST['name_category'];
    $descriptions_Courses_categories=$_POST['descriptions_Courses_categories'];


    $sql = "UPDATE courses_categories_manager SET name_category = '".$name_category."', descriptions_Courses_categories = '".$descriptions_Courses_categories."' WHERE id_Courses_categories = $id"; 
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
    } 

}
else{
    $id=$_GET['id'];
    $sql="DELETE FROM courses_categories_manager WHERE id_Courses_categories = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/CoursesCategoriesManager.php";';
        echo '</script>';
    } 
}
?>
