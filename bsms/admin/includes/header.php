<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dashboard.php" class="nav-link">Home</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php
        $ret1=mysqli_query($con,"select ID,Name from  tblappointment where Status=''");
        $num=mysqli_num_rows($ret1);
        ?>  
        <span class="badge badge-warning navbar-badge" style="font-size: 13px;"><?php echo $num;?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?php echo $num;?> Notifications</span>
        <div class="dropdown-divider"></div>
        <?php 
        $ret=mysqli_query($con,"select ID,Name from  tblappointment where Status='' ORDER BY ID DESC LIMIT 3");
        $num2=mysqli_num_rows($ret);
        if($num2>0){
          while($result=mysqli_fetch_array($ret))
          {
            ?>
            <a href="view-appointment.php?viewid=<?php echo $result['ID'];?>" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Appointment from <?php echo $result['Name'];?>
            </a>
            <div class="dropdown-divider"></div>
            <?php
          }
        } else {?>
          <a class="dropdown-item" href="all_appointments.php">No New Appointment Received</a>
          <?php 
        } ?>


        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Appointment</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="dropdown" href="#"><i class="fas fa-th-large"></i> </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a href="profile.php" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="changepassword.php" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> settings 
        </a>
        <div class="dropdown-divider"></div>
        <a href="logout.php" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> logout 
        </a>
      </div>
    </li>
  </ul>
</nav>
    <!-- /.navbar -->