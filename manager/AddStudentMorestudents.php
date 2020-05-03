<?php
session_start();

if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
  $permission = $_SESSION['permision'];
  $txt1 = "Admin";
  if ($permission != $txt1) {
      echo '<script type="text/javascript">'; 
      echo 'alert("You do not have permission to use this feature! !");'; 
      echo 'window.location.href = "../manager/index.php";';
      echo '</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".hamburger").click(function(){
         $(".sidebar").toggleClass("collapse");
      });
    });
  </script>  

</head>
<style type="">
</style>
<body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Etutor</div>
      <ul>
        <li>
          <div class="w3-dropdown-hover">
        <div class="user_Profile">
          <i class="fa fa-user"></i>
        </div>
            <div class="w3-dropdown-content w3-bar-block w3-border">
              <div class=" w3-col s12 User_Postition">
                <div class="w3-col s4">
                  <img src="../img/User_Avatar_2.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s6 w3-bar">
                  <span>Welcome: <strong><?php echo strtoupper(htmlentities($_SESSION['username']));?></strong></span><br>
                  <span><?php echo(htmlentities($_SESSION['permision']));?></span><br>
                </div>              
              </div>
              <div class="<?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>"><a class="w3-bar-item w3-button" href="../view/DashbordOfPersonal.php"><i class="fa fa-bar-chart-o"></i> Dashbord</a></div>
              <div class="<?php echo $_SESSION['permision'] == "Student" ? 'show' : 'hidden';?>"><a class="w3-bar-item w3-button" href="../view/DashbordOfStudent.php "><i class="fa fa-bar-chart-o"></i> Dashbord</a></div>
              
              <a class="w3-bar-item w3-button" href="../manager/Account.php"><i class="fa fa-user"></i> View Proflie</a>
              <a class="w3-bar-item w3-button" href="../manager/Logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <?php include('../left/leftbar.php')?>
  <div class="main_container">
        
    <div class="item">
      <div class="panel panel-default">
        <div class="panel-heading">Class Add</div>
          <div class="panel-body">
            <form action="../handling/AddStudentMorestudents.php" method="post" enctype="MULTIPLE/form-data"> 
              <div class="form-group">
                <label for="pwd">Class:</label>
                <td>
                  <select class="form-control" id="exampleFormControlSelect1" name="class_id">
                    <?php 
                    require_once('../config/dbconnector.php');
                    $conn = new DBConnector();
                    $id=$_GET['id'];
                    $sql = "Select * from class WHERE id = $id ";
                    $rows = $conn -> runQuery($sql);
                    foreach($rows as $r) {
                     ?>
                     <option value="<?=$r['id']?>"><?=$r['name']?></option>
                   <?php }?>
                 </select>              
               </td>
             </div>
                <div class="form-group">
                  <label >ID Student 1:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id1" >
                  <label >ID Student 2:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id2" >
                  <label >ID Student 3:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id3" >
                  <label >ID Student 4:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id4" >
                  <label >ID Student 5:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id5" >
                  <label >ID Student 6:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id6" >
                  <label >ID Student 7:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id7" >
                  <label >ID Student 8:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id8" >
                  <label >ID Student 9:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id9" >
                  <label >ID Student 10:</label>
                  <input type="text" class="form-control" placeholder="ID student" name="student_id10" >
                </div>
                <div class="input-group">              
                  <input type="submit" class="btn btn-success" name="add_student" id="add_student" value="Add">
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
</body>
</html>


