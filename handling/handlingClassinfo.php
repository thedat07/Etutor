<?php
require_once('../config/dbconnector.php');
$student_id=$_GET['student_id'];
$id=$_GET['id'];

$conn1 = new DBConnector();
$sql1 = "Select * from users WHERE id_student='$student_id' ";
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
    $mail ->Body = "You have been delete to the class id $id";
    $mail ->AddAddress($r['email']);
    $mail->Send();

}

$sql="DELETE FROM class_student WHERE student_id = $student_id";
$cn = new DBConnector();
$return = $cn->execStatement($sql);
if ($return==0){
    echo '<script type="text/javascript">'; 
    echo 'alert("Cannot Delete!");'; 
    echo 'window.location.href = "../view/Classinfo.php?id='.$id.'";';
    echo '</script>';

}else{    
    echo '<script type="text/javascript">';  
    echo 'alert("Delete Success!");'; 
    echo 'window.location.href = "../view/Classinfo.php?id='.$id.'";';
    echo '</script>';
} 



?>