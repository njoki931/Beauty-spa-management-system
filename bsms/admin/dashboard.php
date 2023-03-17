<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (!isset($_SESSION['sid'])) {
  header('location:logout.php');
} 
?>
<!DOCTYPE html>
<html>
<?php @include("includes/head.php"); ?>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php @include("includes/header.php"); ?>
    <!-- Main Sidebar Container -->
    <?php @include("includes/sidebar.php"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <?php echo date('d-m-Y h:i:s')?>
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
      $eid=$_SESSION['sidge'];

      $sql="SELECT * from tblusers   where id=:eid ";                                    
      $query = $dbh -> prepare($sql);
      $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      if($query->rowCount() > 0)
      
        foreach($results as $row)
          
          ?>
          <section class="content">
            <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <?php $query1=mysqli_query($con,"Select * from tblcustomers");
                    $totalcust=mysqli_num_rows($query1);
                    ?>
                    <div class="inner">
                      <h3> <?php echo $totalcust;?></h3>
                      <p>Total Customers</p>
                    </div>
                    <a href="customer_list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <?php $query2=mysqli_query($con,"Select * from tblappointment");
                    $totalappointment=mysqli_num_rows($query2);
                    ?>
                    <div class="inner">
                      <h3><?php echo $totalappointment;?></h3>

                      <p>Total Appointments</p>
                    </div>
                    <a href="services.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <?php $query3=mysqli_query($con,"Select * from tblappointment where Status='1'");
                    $totalaccapt=mysqli_num_rows($query3);
                    ?>
                    <div class="inner">
                      <h3><?php echo $totalaccapt;?></h3>

                      <p>Accepted Appointments</p>
                    </div>
                    <a href="accepted_appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <?php $query4=mysqli_query($con,"Select * from tblappointment where Status='2'");
                    $totalrejapt=mysqli_num_rows($query4);
                    ?>
                    <div class="inner">
                      <h3><?php echo $totalrejapt;?></h3>

                      <p>Rejected Appointments</p>
                    </div>
                    <a href="rejected_appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row (main row) -->
              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <?php
                                 //todays sale
                    $query6=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
                     from tblinvoice 
                     join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
                    while($row=mysqli_fetch_array($query6))
                    {
                      $todays_sale=$row['Cost'];
                      $todysale+=$todays_sale;

                    }
                    ?>
                    <div class="inner">
                      <h3>
                        <?php
                        $pop=0;
                        if (strlen($todysale==0)) {
                          echo $pop;
                        } else{ 
                          echo $todysale ; 
                        }
                        ?>

                      </h3>
                      <p>Today Sales</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <?php
                                //Yesterday's sale
                    $query7=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
                     from tblinvoice 
                     join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;");
                    while($row7=mysqli_fetch_array($query7))
                    {
                      $yesterdays_sale=$row7['Cost'];
                      $yesterdaysale+=$yesterdays_sale;

                    }
                    ?>
                    <div class="inner">
                      <h3>
                        <?php
                        $pop1=0;
                        if (strlen($yesterdaysale==0)) {
                          echo $pop1;
                        } else{ 
                          echo $yesterdaysale; 
                        }?>
                      </h3>

                      <p>Yesterday Sales</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <?php
                                 //Last Sevendays Sale
                    $query8=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
                     from tblinvoice 
                     join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 7 DAY);");
                    while($row8=mysqli_fetch_array($query8))
                    {
                      $sevendays_sale=$row8['Cost'];
                      $tseven+=$sevendays_sale;
                    }
                    
                    ?>
                    <div class="inner">
                      <h3>
                        <?php
                        $pop2=0;
                        if (strlen($tseven==0)) 
                        {
                          echo $pop2;
                        } else{ 
                          echo $tseven;
                        }
                        ?> 
                      </h3>

                      <p>Last seven days</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                    <?php
                            //Total Sale
                    $query9=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
                     from tblinvoice 
                     join tblservices  on tblservices.ID=tblinvoice.ServiceId");
                    while($row9=mysqli_fetch_array($query9))
                    {
                      $total_sale=$row9['Cost'];
                      $totalsale+=$total_sale;

                    }
                    ?>
                    <div class="inner">
                      <h3><?php echo htmlentities(number_format($totalsale, 0, '.', ','));?></h3>

                      <p>Total Sales</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <?php 
        
      ?>
    </div>
    <!-- /.content-wrapper -->
    <?php @include("includes/footer.php"); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php @include("includes/foot.php"); ?>
</body>
</html>
