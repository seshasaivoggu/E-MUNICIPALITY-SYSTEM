<?php
session_start();
$compid=$_POST['compid'];
if($compid==''){
echo "<script>alert('Compalint id should not be Empty');
window.location.href='update.html';
</script>";
return false;
}
$_SESSION["compid"]=$_POST['compid'];
if(isset($_POST['assignservice'])){
  echo "<script>window.location.href='assignservice.html'</script>";
  return false;
}
if(isset($_POST['compstatus'])){
  echo "<script>window.location.href='updatecompstat.html'</script>";
  return false;
}
 ?>
