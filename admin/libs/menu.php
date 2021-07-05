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
              <img src="../images/<?php echo admin_detail('upl'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo ucfirst(admin_detail('username')); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../images/<?php echo admin_detail('upl'); ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo ucfirst(admin_detail('username')); ?>
                  <small>Member since <?php echo admin_detail('join_date'); ?></small>
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
          <img src="../images/a.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst(admin_detail('username')); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Student's Profile</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li>
              <a href="all_applicant.php"><i class="fa fa-circle-o"></i>All New Applicant<!-- <i class="fa fa-angle-left pull-right"> --></i></a>
             </li> 
            <li>
              <a href="All_admission.php"><i class="fa fa-circle-o"></i>All Department<!--   --></i></a>
              <!-- <ul class="treeview-menu">
                <li><a href="all_applicant.php"><i class="fa fa-circle-o"></i> ND1 Full Time</a></li>
                <li>
                  <a href="All_admission.php"><i class="fa fa-circle-o"></i> ND2 Full Time </a>
                </li>
              </ul> -->
            </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Result Uploading</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="test_result.php"><i class="fa fa-circle-o"></i>Test Result</a></li>
                <li>
                  <a href="exam_result.php"><i class="fa fa-circle-o"></i> Exam Result </a>
                </li>
              </ul>
            </li>
        
        </li>
        <li><a href="logout.php"><i class="fa fa-sign-out red"></i><span> Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
