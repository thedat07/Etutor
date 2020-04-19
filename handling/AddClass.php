<?php
require_once('../config/dbconnector.php');
if (isset($_POST['add_Class'])) {
        //them
	$name=$_POST['name'];
	$id_Trainer=$_POST['id_Trainer'];
	$id_Course_manager=$_POST['id_Course_manager'];

    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'id9817382_fpt';    

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
    $conn1 = new DBConnector();
    $sql1 = "Select * from users WHERE id_Trainer='$id_Trainer' ";
    $rows1 = $conn1 -> runQuery($sql1);
    foreach($rows1 as $r) {
        require '../PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail ->IsSmtp();
        $mail ->SMTPDebug = 0;
        $mail ->SMTPAuth = true;
        $mail ->SMTPSecure = 'ssl';
        $mail ->Host = "smtp.gmail.com";
        $mail ->Port = 465;
        $mail ->IsHTML(true);
        $mail ->Username = "demotestdat07@gmail.com";
        $mail ->Password = "demotestdat0712";
        $mail ->SetFrom("yourmail@gmail.com");
        $mail ->Subject = "Notification";
        $mail ->Body = "You have been add to the class name $name";
        $mail ->AddAddress($r['email']);
        $mail->Send();

    }

    $sql="select * from class where name='$name'";
    $kt=mysqli_query($conn, $sql);


    if(mysqli_num_rows($kt)  > 0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Name available!");'; 
        echo 'window.location.href = "../manager/AddClass.php";';
        echo '</script>';
        
    } 
    else{

        $sql = "Insert Into class(name, id_Trainer, id_Course_manager) values('".$name."','".$id_Trainer."','".$id_Course_manager."')";
        $cn = new DBConnector();
        $return = $cn->execStatement($sql);
        if ($return==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Add Failure!");'; 
            echo 'window.location.href = "../manager/AddClass.php";';
            echo '</script>';

        }else{ 
            echo '<script type="text/javascript">';     
            echo 'alert("Add Success!");'; 
            echo 'window.location.href = "../view/Class.php";';
            echo '</script>';
        } 
    }

}

elseif (isset($_POST['Update_Class'])) {

    $id=$_GET['id'];    
    $id_Course_manager=$_POST['id_Course_manager'];
    $name=$_POST['name'];

    $sql = "UPDATE class SET id_Course_manager = '".$id_Course_manager."', name = '".$name."' WHERE id = $id"; 
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);

    if ($return==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("Update Failure!");'; 
        echo 'window.location.href = "../edit/Edit-AddClass.php";';
        echo '</script>';
        
    }else{ 
        echo '<script type="text/javascript">';     
        echo 'alert("Update Success!");'; 
        echo 'window.location.href = "../view/Class.php";';
        echo '</script>';
    } 

}
?>


