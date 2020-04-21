<?php
session_start();

if (!isset($_SESSION['username'])) {
 header('Location:../manager/login.php');
} else
{
  $permission = $_SESSION['permision'];
  $txt1 = "Personal";
  $txt2 = "Admin";
  if ($permission != $txt1 && $permission != $txt2) {
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
  <title>DashBoard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  

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

  <script>
  function queryParams() {
    return {
      type: 'owner',
      sort: 'updated',
      direction: 'desc',
      per_page: 100,
      page: 1
    };
  }
</script> 

   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
  <script src="../js/index.js"></script>
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

                <div class="item <?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
           $id=$_GET['id'];
            $sql="Select * from users where id_Trainer = '$id'";  
            $rows = $cn->runQuery($sql);                       
            foreach ($rows as $r) 
          {
          ?> 
            <form>
              <div class="card">
                <div class="imgbox"><img src="../img/User_Avatar_2.png"></div>
                  <div class="detail">
                  <p class="title">Name: <?=$r['name']?></p>
                  <p class="title">Email: <?=$r['email']?></p>
                  <p class="title">Role: <?=$r['permision']?></p>
                 
                </div>

              </div>
            </form>
          <?php } ?>
               
        </div>
  

         <div class="item <?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>">
      <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-twothird">
            <h5><b>Recently accessed class</b></h5>
              <table 
              class="w3-table w3-striped w3-white "
              data-toggle="table" 
              data-pagination="true"
              >
              <thead>
                <tr>
                  <th ><i class="fa fa-users w3-text-yellow w3-large"></i></th>
                  <th >Time</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $id_Trainer = $_SESSION['id_Trainer'];
                require_once('../config/dbconnector.php');
                $cn = new DBConnector();
                $sql="SELECT class.name, log.Time from log, trainer_manager, class WHERE log.id_Trainer = trainer_manager.id_Trainer AND trainer_manager.id_Trainer = ".$id_Trainer." AND class.id = log.id_Class ORDER BY log.Time DESC";
                $rows = $cn->runQuery($sql);
                foreach ($rows as $r) {
                  ?>
                  <tr id="tr-id-2" class="tr-class-2">
                    <td><?=$r['name']?></td>
                    <td><i><?=$r['Time']?></i></td>
                  </tr>
                <?php } ?>
              </tbody>    
            </table>
          </div>
        </div>
      </div>
    </div>

         <div class="item <?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>">      <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-twothird">
            <h5><b>Recently accessed chatbox</b></h5>
              <table 
              class="w3-table w3-striped w3-white "
              data-toggle="table" 
              data-pagination="true"
              >
              <thead>
                <tr>
                  <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
                  <th >Time</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $id_Trainer = $_SESSION['id_Trainer'];
                require_once('../config/dbconnector.php');
                $cn = new DBConnector();
                 $sql="SELECT trainee_manager.name_Trainee,logchatbox.Time FROM logchatbox, trainee_manager WHERE id_Trainer =  ".$id_Trainer." and logchatbox.id_Trainee = trainee_manager.id_Trainee and logchatbox.checkP='0' ORDER BY logchatbox.Time DESC LIMIT 5";
                $rows = $cn->runQuery($sql);
                foreach ($rows as $r) {
                  ?>
                  <tr id="tr-id-2" class="tr-class-2">
                    <td><?=$r['name_Trainee']?></td>
                    <td><i><?=$r['Time']?></i></td>
                  </tr>
                <?php } ?>
              </tbody>    
            </table>
          </div>
        </div>
      </div>
    </div>

         <div class="item <?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
      <div class="w3-panel">
            <div class="w3-row-padding" style="margin:0 -16px">
              <div class="w3-twothird">
                <h5><b>Recently accessed chatbox</b></h5>
                <table 
                class="w3-table w3-striped w3-white "
                data-toggle="table" 
                data-pagination="true"
                >
                <thead>
                  <tr>
                    <th >ID Student</i></th>
                    <th >Time</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $id=$_GET['id'];
            $sql="Select * from logchatbox where id_Trainer = $id";  
            $rows = $cn->runQuery($sql);                       
            foreach ($rows as $r) 
            {
            ?> 
                    <tr id="tr-id-2" class="tr-class-2">
                      <td><?=$r['id_Trainee']?></td>
                      <td><i><?=$r['Time']?></i></td>
                    </tr>
                  <?php } ?>
                </tbody>    
              </table>
            </div>
          </div>
        </div>
    </div>
      <div class="item <?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
        <div class="w3-panel">
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-twothird">
              <h5><b>Recently accessed class</b></h5>
              <table 
              class="w3-table w3-striped w3-white "
              data-toggle="table" 
              data-pagination="true"
              >
              <thead>
                <tr>
                  <th >ID Class</i></th>
                  <th >Time</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                require_once('../config/dbconnector.php');
                $cn = new DBConnector();
                $id=$_GET['id'];
                $sql="Select * from log where id_Trainer = $id";  
                $rows = $cn->runQuery($sql);                       
                foreach ($rows as $r) 
                {
                ?> 
                  <tr id="tr-id-2" class="tr-class-2">
                    <td><?=$r['id_Class']?></td>
                    <td><i><?=$r['Time']?></i></td>
                  </tr>
                <?php } ?>
              </tbody>    
            </table>
          </div>
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


