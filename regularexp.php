<?php
$my_url = "neerajponnada08gmail.com";
//$format = "/[A-Za-z0-9]+@[A-Za-z0-9]/.com/";
if (preg_match("/[A-Za-z0-9]+@[A-Za-z0-9]/", $my_url))
{
	echo "the url $my_url contains guru";
}
else
{
	echo "the url $my_url does not contain guru";
}
?>