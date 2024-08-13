<?php
$con=mysqli_connect('localhost','root');
if($con){
	echo "connection successfully";
}else{
	echo "connection error";

}

mysqli_select_db($con,'userform');
$Username=$_POST['Username'];
$Email=$_POST["Email"];
$Mobile=$_POST['Mobile'];
$comment=$_POST["comment"];

$query="INSERT INTO enquire( `username`, `email`, `mobile`, `comment`) VALUES ('$Username','$Email','$Mobile','$comment')";
mysqli_query($con,$query);

echo "$query";
mysqli_query($con,$query);
header("location:index.php");
?>