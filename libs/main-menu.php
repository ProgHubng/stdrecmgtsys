<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../images/log.png" style="width: 30px; height: 30px;"></span>
      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><img src="../images/lautechnav1.png" style="width: 100%; height: 40px;"> <span style="font-size: 15px;"></span></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../images/<?php echo student_details('upl'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo ucfirst(student_details('fname')); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../images/<?php echo student_details('upl'); ?>" class="img-circle" alt="User Image">
                <p>
                 <?php echo ucfirst(student_details('fname')); ?>
                  <small>Member since <?php echo student_details('add_date'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Update Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/<?php echo student_details('upl'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst(student_details('fname')); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="tmp.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-user"></i> <span>Registration</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="profile.php"> <span>Student Profile</span></a></li>
            <li><a href="biodata.php"> <span>Biodata Reg.</span></a></li>
            <li><a href="course.php"><span>Course Form Reg.</span></a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-download"></i> <span>Printing/Downloading</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="../print/print_biodata.php" target="_blank"><i class="fa fa-circle-o"></i> <span>Biodata Form</span></a></li>
              <li><a href="../print/print_library.php" target="_blank"><i class="fa fa-circle-o"></i> <span> Library Access Form </span></a></li>
              <li><a href="print.php" target="_blank"><i class="fa fa-circle-o"></i> <span>Semester Course Form</span></a></li>
              <li><a href="check_result.php"><i class="fa fa-circle-o"></i>  <span>    Semester Result</span></a></li>
            </ul>
        </li>
        <li><a href="logout.php"><i class="fa fa-sign-out red"></i> <span>Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
