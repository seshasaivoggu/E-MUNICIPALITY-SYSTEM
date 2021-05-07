<?php

$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
return false;
}
$compid=$_POST['compidtrack'];
$sql1="select complaint,serviceprovider,servicemobile,compstatus from complaint where compid='$compid';";
$result1 = mysqli_query($con,$sql1);
$row1=mysqli_fetch_row($result1);
if(mysqli_num_rows($result1)==0){
echo "<script>alert('Check the Complaint Id');
window.location.href='homepage.html';
</script>";
}
$complaint=$row1[0];
$serviceprovider=$row1[1];
$servicemobile=(int)$row1[2];
$compstatus = $row1[3];

echo "
<html>
<head>
<title>E-Muncipal System</title>
<meta charset='UTF-8'>
<link rel='stylesheet' href='style3.css'>
<link rel='stylesheet' href='style4.css'>
<style>
body,h1,h2,h3,h4,h5 {font-family: 'Poppins', sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<script>
function gobackfunc(){
  window.location.href='homepage.html';
}
</script>
</head>
<body style='background-color:skyblue'>
<div class='w3-container' style='margin-top:20px' id='track' align='center'>
<h3 class='w3-padding-64' style='color:black;'><b>Complaint Status</b></h3>
<table class='w3-container' border='2' cellpadding='5px' cellspacing='5px'>
<tr>
  <td>Compalint Id:</td>
  <td>$compid</td>
</tr>
<tr>
  <td>Complaint:</td><td>$complaint</td>
</tr>
<tr>
  <td>Service Provider Name:</td><td>$serviceprovider</td>
</tr><tr>
  <td>Mobile Number:</td><td>$servicemobile</td>
</tr><tr>
  <td>Status:</td><td>$compstatus</td>
</tr>
</table>
<br><br>
<form>
<input type='button' name='goback' value='Go Back' onclick='gobackfunc()'>
</form>
</div>
</body>
</html>
";
?>
