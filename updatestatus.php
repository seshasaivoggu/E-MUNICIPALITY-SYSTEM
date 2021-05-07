<?php
session_start();
$compid=$_SESSION['compid'];
$status=$_POST['updatestatus'];
if($status==''){
echo "<script>alert('Status should not be Empty');
window.location.href='updatecompstat.html';
</script>";
return false;
}
//echo "$compid<br>$status";/*
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else{
  $sql1="update complaint set compstatus='$status' where compid='$compid';";
  $result=mysqli_query($con,$sql1);
if($result)
{
  echo"<script>alert('status is updated successfully');
window.location.href='update.html';
  </script>";
}
else {
  echo"<script>alert('Not updated');
window.location.href='updatecompstat.html';
  </script>";
}
}

?>
