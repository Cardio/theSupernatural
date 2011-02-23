<?php

include('db_connect.php');

if(isset($_COOKIE['pw']))
{
$query="select * from users WHERE password='$_COOKIE[pw]' ";
$result=mysqli_query($db, $query)
or die("Error Querying Database");
while($row = mysqli_fetch_array($result))
{
$_SESSION['username']=$row['username'];
$_SESSION['pw']=$row['password'];
}
}

mysqli_close($db);
?>