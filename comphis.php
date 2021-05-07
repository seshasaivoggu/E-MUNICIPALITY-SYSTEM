<?php
session_start();
$username=$_SESSION["userid"];
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
return false;
}
//$compid=$_POST['compidtrack'];
$sql1="select compid,complaint,compstatus from complaint where username='$username';";
$result1 = mysqli_query($con,$sql1);
//$row1=mysqli_fetch_row($result1);
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
.w3-half img{margin-bottom:-6px;margin-top:50px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<script>
function gobackfunc(){
  window.location.href='homepage.html';
}
</script>
</head>
<body style='background-color:skyblue'>
<div class='w3-container' style='margin-top:200px' id='track' align='center'>
<table class='w3-container' border='2' cellpadding='7px' cellspacing='7px'>
<tr>
  <td><b><i>Compid</i></b></td>
  <td><b><i>Complaint</i></b></td>
  <td><b><i>Complaint status</i></b></td>
</tr>

";
while ($row1=mysqli_fetch_row($result1))
    {
    echo "<tr><td>$row1[0]</td><td>$row1[1]</td><td>$row1[2]<br></td></tr>";
    }
echo "</table>
<br><br>
<form>
<input type='button' name='goback' value='Go Back' onclick='gobackfunc()'>
</form>
</div>
</body>
</html>"

?>
