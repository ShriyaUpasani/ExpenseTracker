<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$try = $_SESSION['detsuid'];
// echo "$try";
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expense Tracker - Dashboard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css\dash.css">
  <link rel="stylesheet" href="css\bootstrap.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">

<script src="jqyery-3.5.1.js" charset="utf-8"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Source+Sans+Pro:wght@400;600&display=swap"
    rel="stylesheet">
</head>


<body style=" font-family: 'Source Sans Pro', sans-serif;">
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
            <a style="color: white;" style="padding-right: 130px;font-size: large;" class="nav-link" href="#"><b style="font-size: larger;">Dashboard</b></a>
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


 <div id="dashcontainer" class=" dashcontainer">
  <div style="padding-top: 40px;" class="">
    <div class="row" style="font-size: large;margin-left: 10rem;">
      <div class="col-md-2 ">

        <div class="col-md">
       <form action="addexpense.php" method="POST">
        <button type="submit" name="submit_btn" style="font-size: large;font-weight: 600;border: 0.5px solid #150e56;background:white;width: 240px;height:50px;box-shadow: 5px 8px #150e56;"
        class="btn"><img style="height: 15px;width: 15px;margin-top: -5px;" src="icons\plus.svg" alt="">&nbsp Add expense</button>
       </form>
       </div>

      <div class="col-md">
        <form action="manageexpense.php" method="POST">
        <button id="myBtn"  style="font-size: large;font-weight: 600;border: 0.5px solid #150e56;background:white;width: 240px;height:50px;box-shadow: 5px 8px #150e56;" class="btn"><img
            style="height: 15px;width: 15px;margin-top: -5px;" src="icons\edit.svg" alt="">&nbsp Manage expense</button>
        </form>
      </div>

      <div class="col-md">
        <form action="reports.php" method="POST">
        <button id="myBtn1" style="font-size: large;font-weight: 600;border: 0.5px solid #150e56;background:white;width: 240px;height:50px;box-shadow: 5px 8px #150e56;" class="btn"><img
            style="font-size:1rem;height: 15px;width: 15px;margin-top: -5px;" src="icons\envelope-open-text.svg" alt="">&nbsp Expense Report</button>
        </form>
      </div>
      </div>

      <div style="margin-left:0px;" class="col-md-10 text-center">
        <div style="padding-left: 10%;padding-top: 2%;" class="row">

          <div class="col-md-6 text-center">
            <div class="card" style="width: 24rem;height: 5.1rem;border: 1px solid #150e56;box-shadow: 5px 8px #150e56;">
              <div class="card-body">
                  <button type="button" class="btn"> <h2 style="font-weight: 600;"  class="card-title">Yesterday's expense: <span style="font-size: 25px;">
           <?php
           $userid=$_SESSION['detsuid'];
           $ydate=date('Y-m-d',strtotime("-1 days"));
           $query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
           $result1=mysqli_fetch_array($query1);
           $sum_yesterday_expense=$result1['yesterdayexpense'];
           echo $sum_yesterday_expense;
             ?>
          </h2>
                    </button>
              </div>
            </div>
          </div>

         <div class="col-md-4 text-center">
           <div class="card" style="width: 24rem;height: 5.1rem;border: 1px solid #150e56;box-shadow: 5px 8px #150e56;">
             <div class="card-body">
                 <button type="button" class="btn"> <h2 style="font-weight: 600;"  class="card-title">Today's expense : <span style="font-size: 25px;">
		<?php
    $userid=$_SESSION['detsuid'];
    $tdate=date('Y-m-d');
    $sql4 = "SELECT sum(`ExpenseCost`) as todaysexpense from `tblexpense` where `ExpenseDate`='$tdate' && `UserId`='$userid'";
    $query=mysqli_query($con,$sql4);
    $result=mysqli_fetch_array($query);
    $sum_today_expense=$result['todaysexpense'];
    // echo "string";
    echo "$sum_today_expense";
     ?>
		</h2>
    </button>

             </div>
           </div>
             </div>


                 <div class="col-md-6 text-center">
                  <div class="card" style="width: 24rem;height: 5.1rem;border: 1px solid #150e56;box-shadow: 5px 8px #150e56;">
             <div class="card-body">
                 <button type="button" class="btn"> <h2 style="font-weight: 600;"  class="card-title">Last 7days expense: <span style="font-size: 25px;">
                   <?php
                   $userid=$_SESSION['detsuid'];
                  $pastdate=  date("Y-m-d", strtotime("-1 week"));
                  $crrntdte=date("Y-m-d");
                  $query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
                  $result2=mysqli_fetch_array($query2);
                  $sum_weekly_expense=$result2['weeklyexpense'];
                   echo $sum_weekly_expense;
                    ?>
                 </h2  >
                   </button>

               </form>
             </div>
           </div>
                 </div>

                 <div class="col-md-6 text-center">
                  <div class="card" style="width: 24rem;height: 5.1rem;border: 1px solid #150e56;box-shadow: 5px 8px #150e56;">
             <div class="card-body">
                 <button type="button" class="btn"> <h2 style="font-weight: 600;"  class="card-title">Current Yr expense:<span style="font-size: 25px;">
                   <?php
                   $userid=$_SESSION['detsuid'];
                    $cyear= date("Y");
                    $query4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
                    $result4=mysqli_fetch_array($query4);
                    $sum_yearly_expense=$result4['yearlyexpense'];
                    echo "$sum_yearly_expense";
                    ?>
                 </h2  >
                   </button>
               </form>
             </div>
           </div>
                 </div>
        </div>

        </div>
       </div>
    </div>
  </div>
 </div>
</body>
</html>
