<?php
session_start();
$compid=$_SESSION['compid'];
$serviceprovname = $_POST['sername'];
if($serviceprovname=="")
{
echo "<script language='javascript'>alert('Please Provide Service Provider Name');
window.location.href='assignservice.html';
</script>";
return false;
}
$con=mysqli_connect("localhost","root","","sm1");
if(!$con){
echo "Not connect successfully";
}
else{
  $sql1="select serviceprovidername,serviceprovidernumber,serviceproviderstatus from service where serviceprovidername='$serviceprovname';";
  $result1=mysqli_query($con,$sql1);
  $row1=mysqli_fetch_row($result1);
  $servicenum=$row1[1];
  echo "$servicenum";
  if(mysqli_num_rows($result1)!=1){
    echo "<script>alert('Service Provider Name is Incorrect');
    window.location.href='assignservice.html';
    </script>";  }
    elseif(mysqli_num_rows($result1)==1 && $row1[2]!="Not assigned"){
      echo "<script>alert('Service Provider is Already assigned to some other work');
      window.location.href='assignservice.html';
      </script>";  }
    elseif(mysqli_num_rows($result1)==1 && $row1[2]=="Not assigned"){

      /*Fetching city of complaint*/
      $sql2="select username from complaint where compid='$compid';";
      $result2=mysqli_query($con,$sql2);
      $row2=mysqli_fetch_row($result2);
      $username=$row2[0];
      $sql3="select city from users where userid='$username';";
      $result3=mysqli_query($con,$sql3);
      $row3=mysqli_fetch_row($result3);
      $city=$row3[0];

      /*Fetching City of the Service Provider*/
      $sql4="select serviceproviderlocation from service where serviceprovidername='$serviceprovname';";
      $result4=mysqli_query($con,$sql4);
      $row4=mysqli_fetch_row($result4);
      $cityofservice=$row4[0];

      /*Comparing cities*/
      if($cityofservice == $city)
      {
        $sql5="update complaint set serviceprovider='$serviceprovname' where compid='$compid';";
        $result5=mysqli_query($con,$sql5);
        $sql6="update complaint set servicemobile='$servicenum' where compid='$compid';";
        $result6=mysqli_query($con,$sql6);
		$sql7="update service set serviceproviderstatus='Assigned' where serviceprovidername='$serviceprovname';";
		$result7=mysqli_query($con,$sql7);
        if($result5 && $result6 && $result7){
          echo "<script>alert('Service provider is assigned Succesfully');
          window.location.href='update.html';
          </script>";
        }
        else{
          echo "<script>alert('Error in Assigning')</script>";
        }
      }
      else{
        echo "<script>alert('Please Select Service Provider who are in that City');
        window.location.href='assignservice.html';
        </script>";
      }
    }
    }


 ?>
