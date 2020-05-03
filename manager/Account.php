<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location:../manager/login.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <title>Profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $username=$_SESSION['username'];
            $sql="Select * from users where username = '$username'";  
            $rows = $cn->runQuery($sql);                       
            foreach ($rows as $r) 
          {
          ?> 
            <form action="../handling/handlingAcc.php?username=<?=$r['username']?>" method="post" enctype="MULTIPLE/form-data">
              <div class="card">
                <div class="imgbox"><img src="../img/User_Avatar_2.png"></div>
                  <div class="detail">
                  <p class="title">Name: <?=$r['name']?></p>
                  <p class="title">Email: <?=$r['email']?></p>
                  <p class="title">Role: <?php echo(htmlentities($_SESSION['permision']));?></p>
                </div>

              </div>
            </form>
          <?php } ?>
               
        </div>
    <div class="item">
        <?php 
          require_once('../config/dbconnector.php');
          $cn = new DBConnector();
          $username=$_SESSION['username'];
          $sql="Select * from users where username = '$username'";  
          $rows = $cn->runQuery($sql);                       
          foreach ($rows as $r) 
          {
            ?> 

            <form action="../handling/handlingAcc.php?username=<?=$r['username']?>" method="post" enctype="MULTIPLE/form-data">
              <label >Username:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control"  name="username"  value="<?=$r['username']?>" disabled>
              </div>

              <label >Password:</label>
              <div class=" input-group" >
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="password" class="form-control"  name="password"  id="myInput" value="<?=$r['password']?>" required>
                <div class="input-group-btn" >
                  <button class="form-control" type="button" class="btn" onclick="myFunction()" id="display_advance">
                    <span class="fa fa-eye"></span>
                  </button>
                </div>
              </div>

              <label >Name:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control"  name="name"  value="<?=$r['name']?>" >
              </div>

              <label >Email:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control"  name="email"  value="<?=$r['email']?>" >
              </div>

              <label></label>
              <div class="input-group">
                <input type="submit" class="btn btn-success" name="update_user" id="update_user" value="Update">  
              </div>        
            </form>
          <?php } ?>
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


