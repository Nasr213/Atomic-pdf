<?php 
session_start();

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistration');
$email=$_POST['email'];
$pass=$_POST['password'];
$s="select * from usertable where email = '$email' && password ='$pass'";
$result= mysqli_query($con,$s);
$num=mysqli_num_rows($result);
$query=mysqli_query($con,"select name from usertable where email = '$email' && password ='$pass'");
$row= mysqli_fetch_array($query);
$name = $row['name'];
if($num == 1){
    $_SESSION['username']=$name;
    header('location:home.php');}
else{
    header( "location:index.php?loginError=You need to register first" );
 }
?>