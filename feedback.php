<?php
session_start();
$username=$_SESSION["userid"];
$feedback1=$_POST['feedbackbox'];
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else{
  $sql1="insert into feedbackarea values('$username','$feedback1');";
  $result=mysqli_query($con,$sql1);
  if($result)
  {
    echo"<script>alert('your feedback is submitted successfully');
window.location.href='homepage.html';
    </script>";
  }
  else {
    echo"<script>alert('your feedback is not submitted successfully');
window.location.href='homepage.html';
    </script>";
  }
}
  ?>
