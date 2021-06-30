<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:index.php');
  } else{

  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\add.css">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700;900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Source+Sans+Pro:wght@400;600&display=swap"
    rel="stylesheet">
</head>
<body>
  <nav style="background-color:  #150e56;  " class="navbar navbar-expand-xl navbar-light sticky-top">
    <div class="container-fluid">
      <button style="color: white;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span  class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a style="color: white;font-size: larger;" class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a style="color: white;" style="padding-right: 130px;font-size: large;" class="nav-link" href="#"><b style="font-size: larger;">Manage Expense</b></a>
          </li>
        </ul>

  <div style="margin-right: 10px;">
    <ul class="navbar-nav ">
        <li class="nav-item">
        <li style="margin-top: 7%;" class="nav-item">
           <div class="dropdown">
             <?php
             $userid=$_SESSION['detsuid'];
             $sql2 = "SELECT `FullName` from `tbluser` where `ID`='$userid'";
             $ret=mysqli_query($con,$sql2);
             $row=mysqli_fetch_array($ret);
             $name=$row['FullName'];
             ?>
              <button class='dropbtn'><p> <?php echo $name ?> <i class="fa fa-caret-down"></i></p> </button>

            <div class="dropdown-content">
              <a href="profile.php"><img style="height: 15px;width: 15px;margin-top: -2px;color: white;" src="icons/user.svg" alt="">&nbsp Profile</a>
              <a href="changepassword.php"><img style="height: 15px;width: 15px;margin-top: -2px;color: white;" src="icons/key.svg" alt=""> Change password</a>
              <a href="index.php"><img style="height: 15px;width: 15px;margin-top: -2px;color: white;" src="icons/sign-out-alt.svg" alt="">&nbsp Logout </a>
            </div>
          </div>
          </li>
         </li>
      </ul>
  </div>
      </div>
    </div>
  </nav>

  <div class="container">
      <div style="border: 1px solid black;padding: 2%;margin-top: 2%;" class="container-fluid">

      <?php
      $fdate=$_POST['fromdate'];
       $tdate=$_POST['todate'];
      $rtype=$_POST['requesttype'];
      ?>

<h5 align="center" style="color:blue">Expense Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr/>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
    <tr>
        <tr>
              <th>S.NO</th>
              <th>Date</th>
              <th>Expense Amount</th>
                </tr>
        </tr>
    </thead>
 <?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"SELECT ExpenseDate,SUM(ExpenseCost) as totaldaily FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$tdate') && (UserId='$userid') group by ExpenseDate");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>

    <tr>
      <td><?php echo $cnt;?></td>
      <td><?php  echo $row['ExpenseDate'];?></td>
      <td><?php  echo $ttlsl=$row['totaldaily'];?></td>
    </tr>
    <?php
    $totalsexp+=$ttlsl;
    $cnt=$cnt+1;
    }?>

   <tr>
    <th colspan="2" style="text-align:center">Grand Total</th>
    <td><?php echo $totalsexp;?></td>
   </tr>
</table>

						</div>
					</div>

</body>
</html>
<?php } ?>
