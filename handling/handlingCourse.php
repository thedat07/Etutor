<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Courses'])) {
        //them
    $name_Courses=$_POST['name_Courses'];
    $descriptions_Courses=$_POST['descriptions_Courses'];
    $id_Courses_categories=$_POST['id_Courses_categories'];

    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");


    $sql="select * from course_manager where name_Courses='$name_Courses'";
    $kt=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($kt)  > 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Name available!");'; 
        echo 'window.location.href = "../manager/CoursesManager.php";';
        echo '</script>';
        
    } 
    else{

        $sql="Insert Into course_manager(name_Courses, descriptions_Courses, id_Courses_categories) values('".$name_Courses."','".$descriptions_Courses."','".$id_Courses_categories."')";
        $cn = new DBConnector();
        $return = $cn->execStatement($sql);
        if ($return==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Add Failure!");'; 
            echo 'window.location.href = "../view/CoursesManager.php";';
            echo '</script>';

        }else{ 
            echo '<script type="text/javascript">';     
            echo 'alert("Add Success!");'; 
            echo 'window.location.href = "../view/CoursesManager.php";';
            echo '</script>';
        } 
    }





} 
elseif (isset($_POST['update_Courses'])) {

    $id=$_GET['id'];    
    $name_Courses=$_POST['name_Courses'];
    $descriptions_Courses=$_POST['descriptions_Courses'];
    $id_Courses_categories=$_POST['id_Courses_categories'];

    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");


    $sql="select * from course_manager where name_Courses='$name_Courses'";
    $kt=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($kt)  > 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Name available!");'; 
        echo 'window.location.href = "../edit/Edit-CoursesManager.php?id='.$id.'";';
        echo '</script>';
        
    } 
    else{

       $sql = "UPDATE course_manager SET name_Courses = '".$name_Courses."', descriptions_Courses = '".$descriptions_Courses."', id_Courses_categories = '".$id_Courses_categories."' WHERE id_Course_manager = $id"; 
       $cn = new DBConnector();
       $return = $cn->execStatement($sql);
       if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../view/CoursesManager.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/CoursesManager.php";';
        echo '</script>';
    } 
}


}
else{
    $id=$_GET['id'];
    $sql="DELETE FROM course_manager WHERE id_Course_manager = $id";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Cannot Delete!");'; 
        echo 'window.location.href = "../view/CoursesManager.php";';
        echo '</script>';
        
    }else{    
        echo '<script type="text/javascript">';  
        echo 'alert("Delete Success!");'; 
        echo 'window.location.href = "../view/CoursesManager.php";';
        echo '</script>';
    } 
}
?>
