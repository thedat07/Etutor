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
  <title>HomePage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="../js/index.js"></script>
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
          <?php 
          require_once('../config/dbconnector.php');
          $cn = new DBConnector();
          $id=$_GET['id'];
          $sql="Select * from class where id = $id";  
          $rows = $cn->runQuery($sql);                       
          foreach ($rows as $r) 
          {
            ?> 

          <form action="../handling/AddClass.php?id=<?=$r['id']?>" method="post" enctype="MULTIPLE/form-data">
            <div class="form-group">
              <label >Name Class:</label>
              <input type="text" class="form-control" placeholder="Name Class" name="name" value="<?=$r['name']?>" required>
            </div>  
            <div class="form-group">
              <label for="pwd">Courses:</label>
              <td>
                <select class="form-control" id="exampleFormControlSelect1" name="id_Course_manager">

                  <?php 
                  require_once('../config/dbconnector.php');
                  $conn = new DBConnector();
                  $id=$_GET['id'];
                  $sql = "Select class.id_Course_manager, course_manager.name_Courses FROM class INNER JOIN course_manager ON class.id_Course_manager=course_manager.id_Course_manager where id = $id";
                  $rows = $conn -> runQuery($sql);
                  foreach($rows as $r) {
                   ?>
                   <option value="<?=$r['id_Course_manager']?>"><?=$r['name_Courses']?></option>
                 <?php }?>


                 <?php 
                 require_once('../config/dbconnector.php');
                 $conn = new DBConnector();
                 $sql = "Select * from course_manager";
                 $rows = $conn -> runQuery($sql);
                 foreach($rows as $r) {
                   ?>
                   <option value="<?=$r['id_Course_manager']?>"><?=$r['name_Courses']?></option>
                 <?php }?>
               </select>              
             </td>
           </div>
           <div class="form-group">
            <label for="pwd">Trainer:</label>
            <td>
              <select class="form-control" id="exampleFormControlSelect1" name="id_Trainer">
                <?php 
                require_once('../config/dbconnector.php');
                $conn = new DBConnector();
                $id=$_GET['id'];
                $sql = "Select class.id_Trainer, trainer_manager.name_Trainer FROM class INNER JOIN trainer_manager ON class.id_Trainer=trainer_manager.id_Trainer where id = $id";
                $rows = $conn -> runQuery($sql);
                foreach($rows as $r) {
                 ?>
                 <option value="<?=$r['id_Trainer']?>"><?=$r['name_Trainer']?></option>
               <?php }?>

               
               <?php 
               require_once('../config/dbconnector.php');
               $conn = new DBConnector();
               $sql = "Select * from trainer_manager";
               $rows = $conn -> runQuery($sql);
               foreach($rows as $r) {
                 ?>
                 <option value="<?=$r['id_Trainer']?>"><?=$r['name_Trainer']?></option>
               <?php }?>
             </select>              
           </td>
         </div>
         <div class="input-group">
             <input type="submit" class="btn " name="Update_Class" id="Update_Class" value="Update">
         </div>           
      
       </form>


     </div>
   </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
<div class="cube"></div>
</body>
</html>


