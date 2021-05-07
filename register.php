<?php
//$username = $_POST['username'];
//$password = $_POST['password'];
//session_start(); // starts PHP session!
//$_SESSION['user'] = $username;
$Name = $_POST['Name'];
$Email = $_POST['Email'];
//$City = $_POST['City'];
if(isset($_POST['City']) && $_POST['CityValue'] == '0') {
  echo "Please select a City.";
  return false;
}
if($_POST['CityValue'] == '1'){
  $City="Vijayawada";
}
else if($_POST['CityValue'] == '2'){
  $City="Guntur";
}
if($_POST['CityValue'] == '3'){
  $City="Kurnool";
}
$Area = $_POST['AreaValue'];
$Username = $_POST['userid'];
$Password = $_POST['password'];
//echo "$Name <br> $Email <br> $City <br> $Area <br> $Username <br> $Password<br>";

/*Connecting to Database*/
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else{

/*Checking Whether user already avilable or not*/
$sql1 = "select email from users where email='$Email';";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_row($result1);
if($row1[0]!=""){
  echo "<script language='javascript'>alert('User is already registered Please Login to Continue');
  window.location.href='main.html';
  </script>";
}
/*if user is new updating the database*/
else{

$sql="insert into users values('$Name','$Email','$City','$Area','$Username','$Password','')";
$result=mysqli_query($con,$sql);
//$row=mysqli_fetch_row($result);
if($result){
echo "<script language='javascript'>alert('Registration Successfull Please Login');
window.location.href='main.html';
</script>";
}
else{
  echo "Error in updating into Database";
}

}



}


?>
