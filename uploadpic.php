<?php 
$con= mysqli_connect("localhost","root","","userregistration");
$name=$_SESSION['username'];
$query=mysqli_query($con,"select profilepic from usertable where name='$name'");
$row= mysqli_fetch_array($query);
$_SESSION['filename']=$row['profilepic'];
$sql="select * from pimg";
$rslt=mysqli_query($con,$sql);
$files = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
if(isset($_POST['upload']))
{
    
    $name=$_SESSION['username'];
    
 $filename =$_FILES['myfile']['name'];
 $destination ='uploads/' . $filename;

 $extension = pathinfo($filename,PATHINFO_EXTENSION);
 $file =$_FILES['myfile']['tmp_name'];
 $size =$_FILES['myfile']['size'];
 if (!in_array($extension,['jpg','jpeg','png']))
 {
     echo "Your file extension must be .jpg .jpeg or .png";
     }
     elseif($_FILES['myfile']['size']> 5000000)
     {
         echo "file is too large";
     }
    else {
        if(move_uploaded_file($file,$destination))
        {
            $sql ="insert into pimg (name,size,owner) values ('$filename','$size','$name')";
            $rqt = "update usertable set profilepic='$filename' where name='$name'";
            mysqli_query($con,$rqt);
            if(mysqli_query($con,$sql))
            {
                echo"files uploaded";
            }
            else
            {
                echo "error";
            }

        }
    }
}

$sql="select * from pimg where owner='$name'";
$rslt=mysqli_query($con,$sql);
$images = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
$num=mysqli_num_rows($rslt);
$sql="select * from files where owner='$name'";
$rslt=mysqli_query($con,$sql);
$myfiles = mysqli_fetch_all($rslt,MYSQLI_ASSOC);
$num=$num+mysqli_num_rows($rslt);

$result = mysqli_query($con, "SELECT SUM(downloads) AS total FROM files where owner='$name'"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['total'];

?>