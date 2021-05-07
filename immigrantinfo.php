<?php
session_start();
//echo $_SESSION["userid"];
$username=$_POST['uname'];
$anum=$_POST['anum'];
$num=$_POST['num'];
$loc=$_POST['loc'];
$occ=$_POST['occ'];
$ename=$_POST['ename'];
$enum=$_POST['enum'];
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
  $sql2="select count(*) from complaint1";
  $result2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_row($result2);
  $compid=12140+$row2[0];

  $sql1="insert into complaint1 values('$username','$anum','num','$loc','$occ','ename','enum','$compid');";
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
          alert('Data is registered successfully.Your id is $compid');
          window.location.href='homepage.html';
          </script>";
  }
}
?>
