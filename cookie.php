<?php

include('db_connect.php');

if(isset($_COOKIE['id']))
{
$query="select * from users WHERE id='$_COOKIE[id]' ";
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