<?php
session_start();
//echo $_SESSION["userid"];
$username=$_POST['uname'];
//$complaint=$_POST['Complaintvalue'];
if($_POST['Complaintvalue']==1){
  $complaint="Street Lights";
}
else if($_POST['Complaintvalue']==2){
  $complaint="Water Supply";
}
else if($_POST['Complaintvalue']==3){
  $complaint="Roads and Bridges";
}
else if($_POST['Complaintvalue']==4){
  $complaint="Sanitation";
}
$description=$_POST['complaintboxdescription'];
$Othercomplaint=$_POST['complaintbox'];
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else {
  if($username!=$_SESSION["userid"]){
    echo "<script>alert('Check your Username');
    window.location.href='homepage.html';
    </script>";
  }
  $sql2="select count(*) from complaint";
  $result2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_row($result2);
  $compid=12140+$row2[0];

  $sql1="insert into complaint values('$username','$complaint','$description','$Othercomplaint','','','','$compid');";
  $result=mysqli_query($con,$sql1);
  if(!$result)
  {
    echo "<script>
          alert('please check the details');
          window.location.href='homepage.html';
          </script>";
  }
  else {

          echo "<script>
          alert('complaint is registered successfully.Your complaint id is $compid');
          window.location.href='homepage.html';
          </script>";
  }
}
?>
