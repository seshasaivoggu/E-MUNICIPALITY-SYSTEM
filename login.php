<?php
session_start();
$username = $_POST['userid'];
$password = $_POST['password'];
//session_start(); // starts PHP session!
//$_SESSION['user'] = $username;
if($username==""||$password=="")
{
echo "<script language='javascript'>alert('All Fields must be filled');
window.location.href='main.html';
</script>";
return false;
}
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else{
$sql="select userid,password,designation from users where userid ='$username';";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_row($result);
if(($row[0]=="$username")&&($row[1]=="$password"))
{
  if($row[2]=="admin")
    {
      echo "<script>
        window.location.href='adminpage.html';
      </script>";
      return false;
    }
    else {
      echo "<script>
       window.location.href='homepage.html';
       </script>";
    }




   $_SESSION["userid"]=$username;
}
else
{
    if($row[0]!= "$username")
    {
      echo "<script>
      alert('username is invalid');
      window.location.href='main.html';
      </script>";
    }
    else
    {
        echo "<script>
        alert('password is incorrect');
        window.location.href='main.html';
        </script>";
    }
}

}
?>
