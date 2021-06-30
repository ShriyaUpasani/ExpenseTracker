<?php

include('includes/dbconnection.php');
session_start();

$userid=$_SESSION['detsuid'];
$fullname=$_POST['fullname'];
$mobno=$_POST['contactnumber'];

 $query=mysqli_query($con, "UPDATE `tbluser` set `FullName` ='$fullname', `MobileNumber`='$mobno' where `ID`='$userid'");
if ($query) {
echo "
         <div class='modal-dialog'>
             <div style='margin-top:40%;width:100%' class='modal-content'>
                     <div class='modal-body'>
                      <div class='container'>
                       <h1 class='text-center' style='text-align: center;'>User profile has been updated</h1>
                    </div>
                    </div>
             </div>
          </div>";
header('Refresh: 4; URL= profile.php');

}
else
{
  echo "
           <div class='modal-dialog'>
               <div style='margin-top:40%;width:100%' class='modal-content'>
                       <div class='modal-body'>
                        <div class='container'>
                         <h1 class='text-center' style='text-align: center;'>Please try again.</h1>
                      </div>
                      </div>
               </div>
            </div>";
  header('Refresh: 4; URL= profile.php');
}
 ?>
