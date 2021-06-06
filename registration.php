<?php 
session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistration');
$email=$_POST['email'];
$name=$_POST['user'];
$pass=$_POST['password'];
$s="select * from usertable where email = '$email'";
$result= mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 1){
    header( "location:index.php?errorMessage=Email Already Used" );
}
else{
    $reg="insert into usertable(name,email,password) values ('$name','$email','$pass')";
    mysqli_query($con,$reg);
    header( "location:index.php?validMessage=Registration successful" );
    
}
?>