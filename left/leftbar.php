
<style type="">
  .show {
    display: block;
  }
  .hidden {
    display: none;
  }
  <?php
  session_start();

  if (!isset($_SESSION['username'])) {
    header('Location:../manager/login.php');
  } 

  ?>

</style>
  <div class="sidebar">
      <ul>

        <li>
          <a href="../manager/index.php">
            <span class="icon"><i class="fa fa-home"></i></span>
            <span class="title" >Home</span>
          </a>

        </li>


        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-users"></i></span>
            <span class="title" >Student Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/TraineeManager.php" >
                <span class="icon"><i class="fa fa-file-text"></i></span>
                <span class="title"><i class="fa fa-file-text"> Views</i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-users"></i></span>
            <span class="title">Tutor Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/TrainerManager.php" >
                <span class="icon"><i class="fa fa-file-text"></i></span>
                <span class="title"><i class="fa fa-file-text"> Views</i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-folder"></i></span>
            <span class="title" >Courses Categories Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/CoursesCategoriesManager.php" >
                <span class="icon"><i class="fa fa-folder-open"></i></span>
                <span class="title"><i class="fa fa-folder-open"> Views</i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-folder"></i></span>
            <span class="title" >Course manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/CoursesManager.php" >
                <span class="icon"><i class="fa fa-folder-open"></i></span>
                <span class="title"><i class="fa fa-folder-open"> Views</i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-folder"></i></span>
            <span class="title" >Account Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/Register_students.php" >
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title"><i class="fa fa-user"> Views Student</i></span>
              </a>
            </li>
            <li>
              <a href="../view/Register_personal.php" >
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title"><i class="fa fa-user"> Views Personal</i></span>
              </a>
            </li>
            <li>
              <a href="../view/register.php" >
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title"><i class="fa fa-user"> Views Admin</i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-folder"></i></span>
            <span class="title" >Class Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/Class.php">
                <span class="icon"><i class="fa fa-folder-open"></i></span>
                <span class="title"><i class="fa fa-folder-open"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Admin" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-list"></i></span>
            <span class="title" >Overview</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/Overview.php">
                <span class="icon"><i class="fa fa-eye fa-fw"></i></span>
                <span class="title"><i class="fa fa-eye fa-fw"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Student" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-graduation-cap"></i></span>
            <span class="title" >Classes of student</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/ClassesOfStudent.php">
                <span class="icon"><i class="fa fa-eye fa-fw"></i></span>
                <span class="title"><i class="fa fa-eye fa-fw"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Student" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-bar-chart-o"></i></span>
            <span class="title" >Dashbord  of student</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/DashbordOfStudent.php">
                <span class="icon"><i class="fa fa-eye fa-fw"></i></span>
                <span class="title"><i class="fa fa-eye fa-fw"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>

        <li class="<?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-graduation-cap"></i></span>
            <span class="title" >Classes of Tutor</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/ClassesOfPermision.php">
                <span class="icon"><i class="fa fa-eye fa-fw"></i></span>
                <span class="title"><i class="fa fa-eye fa-fw"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>


        <li class="<?php echo $_SESSION['permision'] == "Personal" ? 'show' : 'hidden';?>">
          <a href="#" data-toggle="dropdown" class="dropdown">
            <span class="icon"><i class="fa fa-bar-chart-o"></i></span>
            <span class="title" >Dashbord  of Tutor</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="../view/DashbordOfPersonal.php">
                <span class="icon"><i class="fa fa-eye fa-fw"></i></span>
                <span class="title"><i class="fa fa-eye fa-fw"> Views </i></span>
              </a>
            </li>
          </ul>
        </li>


    </ul>
  </div>











