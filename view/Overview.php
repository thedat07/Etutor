<<<<<<< HEAD
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
   <title>Overview</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
  <script src="../js/index.js"></script>


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
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Student'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>

            <h4>Account Student</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Personal'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account Personal Tutor</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-teal w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Admin'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account Admin</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-orange w3-text-white w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users ";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account </h4>
          </div>
        </div>
      </div>

            <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id_student) AS Number FROM student_manager";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>

            <h4>Student</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id_tutor) AS Number FROM tutor_manager";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Personal Tutor</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="item">
      <div class="w3-panel">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-twothird">
          <h5><b>Students with no interaction for 7 days</b></h5>
          <table 
          class="w3-table w3-striped w3-white "
          data-toggle="table" 
          data-pagination="true"
          >
          <thead>
            <tr>
              <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
              <th >Name</th>
              <th >Report</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $sql="SELECT student_manager.id_student, student_manager.name_student from student_manager WHERE id_student NOT IN (SELECT log.id_student FROM log WHERE log.Time >= ( CURDATE() - INTERVAL 7 DAY )) ";
            $rows = $cn->runQuery($sql);
            foreach ($rows as $r) {
              ?>
              <tr id="tr-id-2" class="tr-class-2">
                <td><?=$r['id_student']?></td>
                <td><?=$r['name_student']?></td>
                <td>Students with no interaction for 7 days</td>
              </tr>
            <?php } ?>
          </tbody>    
        </table>
      </div>
    </div>
  </div>
    </div>

    <div class="item">
      <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-twothird">
            <h5><b>Students with no interaction for 28 days</b></h5>
              <table 
              class="w3-table w3-striped w3-white "
              data-toggle="table" 
              data-pagination="true"
              >
              <thead>
                <tr>
                  <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
                  <th >Name</th>
                  <th >Report</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                require_once('../config/dbconnector.php');
                $cn = new DBConnector();
                $sql="SELECT student_manager.id_student, student_manager.name_student from student_manager WHERE id_student NOT IN (SELECT log.id_student FROM log WHERE log.Time >= ( CURDATE() - INTERVAL 28 DAY )) ";
                $rows = $cn->runQuery($sql);
                foreach ($rows as $r) {
                  ?>
                  <tr id="tr-id-2" class="tr-class-2">
                    <td><?=$r['id_student']?></td>
                    <td><?=$r['name_student']?></td>
                    <td>Students with no interaction for 28 days</td>
                  </tr>
                <?php } ?>
              </tbody>    
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="item">
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5><b>Students without a personal tutor</b></h5>
          <table 
          class="w3-table w3-striped w3-white "
          data-toggle="table" 
          data-pagination="true"
          >
          <thead>
            <tr>
              <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
              <th >Name</th>
              <th >Report</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $sql="SELECT student_manager.id_student, student_manager.name_student FROM student_manager WHERE id_student not IN (SELECT class_student.student_id from class_student) ";
            $rows = $cn->runQuery($sql);
            foreach ($rows as $r) {
              ?>
              <tr id="tr-id-2" class="tr-class-2">
              <td><?=$r['id_student']?></td>
              <td><?=$r['name_student']?></td>
              <td><i>Students without a personal tutor</i></td>
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


=======
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
   <title>Overview</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
  <script src="../js/index.js"></script>


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
      <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Student'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>

            <h4>Account Student</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Personal'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account Personal</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-teal w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users WHERE permision = 'Admin'";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account Admin</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-orange w3-text-white w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id) AS Number FROM users ";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Account </h4>
          </div>
        </div>
      </div>

            <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id_Trainee) AS Number FROM trainee_manager";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>

            <h4>Student</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <?php 
              require_once('../config/dbconnector.php');
              $cn = new DBConnector();
              $sql="SELECT COUNT(id_Trainer) AS Number FROM trainer_manager";
              $rows = $cn->runQuery($sql);
              foreach ($rows as $r) {
                ?>
                <h3><?=$r['Number']?></h3>
              <?php } ?>
            </div>
            <div class="w3-clear"></div>
            <h4>Personal</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="item">
      <div class="w3-panel">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-twothird">
          <h5><b>Students with no interaction for 7 days</b></h5>
          <table 
          class="w3-table w3-striped w3-white "
          data-toggle="table" 
          data-pagination="true"
          >
          <thead>
            <tr>
              <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
              <th >Name</th>
              <th >Report</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $sql="SELECT trainee_manager.id_Trainee, trainee_manager.name_Trainee from trainee_manager WHERE id_Trainee NOT IN (SELECT log.id_Trainee FROM log WHERE log.Time >= ( CURDATE() - INTERVAL 7 DAY )) ";
            $rows = $cn->runQuery($sql);
            foreach ($rows as $r) {
              ?>
              <tr id="tr-id-2" class="tr-class-2">
                <td><?=$r['id_Trainee']?></td>
                <td><?=$r['name_Trainee']?></td>
                <td>Students with no interaction for 7 days</td>
              </tr>
            <?php } ?>
          </tbody>    
        </table>
      </div>
    </div>
  </div>
    </div>

    <div class="item">
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5><b>Students with no interaction for 28 days</b></h5>
          <table 
          class="w3-table w3-striped w3-white "
          data-toggle="table" 
          data-pagination="true"
          >
          <thead>
            <tr>
              <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
              <th >Name</th>
              <th >Report</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $sql="SELECT trainee_manager.id_Trainee, trainee_manager.name_Trainee from trainee_manager WHERE id_Trainee NOT IN (SELECT log.id_Trainee FROM log WHERE log.Time >= ( CURDATE() - INTERVAL 28 DAY )) ";
            $rows = $cn->runQuery($sql);
            foreach ($rows as $r) {
              ?>
              <tr id="tr-id-2" class="tr-class-2">
                <td><?=$r['id_Trainee']?></td>
                <td><?=$r['name_Trainee']?></td>
                <td>Students with no interaction for 28 days</td>
              </tr>
            <?php } ?>
          </tbody>    
        </table>
      </div>
    </div>
  </div>
    </div>

    <div class="item">
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-twothird">
        <h5><b>Students without a personal tutor</b></h5>
          <table 
          class="w3-table w3-striped w3-white "
          data-toggle="table" 
          data-pagination="true"
          >
          <thead>
            <tr>
              <th ><i class="fa fa-user w3-text-blue w3-large"></i></th>
              <th >Name</th>
              <th >Report</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            require_once('../config/dbconnector.php');
            $cn = new DBConnector();
            $sql="SELECT trainee_manager.id_Trainee, trainee_manager.name_Trainee FROM trainee_manager WHERE id_Trainee not IN (SELECT class_student.student_id from class_student) ";
            $rows = $cn->runQuery($sql);
            foreach ($rows as $r) {
              ?>
              <tr id="tr-id-2" class="tr-class-2">
              <td><?=$r['id_Trainee']?></td>
              <td><?=$r['name_Trainee']?></td>
              <td><i>Students without a personal tutor</i></td>
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


>>>>>>> e7b2a89174ac1f9877d8d2c70ea3763e1cbd42a7
