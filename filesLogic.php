<?php 


$con = mysqli_connect("localhost","root","","userregistration");
$name=$_SESSION['username'];
$sql="select * from files";
$rslt=mysqli_query($con,$sql);
$files = mysqli_fetch_all($rslt,MYSQLI_ASSOC);

if(isset($_POST['save']))
{
    
    $name=$_SESSION['username'];
    
 $filename =$_FILES['myfile']['name'];
 $destination ='uploads/' . $filename;

 $extension = pathinfo($filename,PATHINFO_EXTENSION);
 $file =$_FILES['myfile']['tmp_name'];
 $size =$_FILES['myfile']['size'];
 if (!in_array($extension,['pdf','txt']))
 {
     echo "Your file extension must be .pdf or .txt";
     }
     elseif($_FILES['myfile']['size']> 5000000)
     {
         echo "file is too large";
     }
    else {
        if(move_uploaded_file($file,$destination))
        {
            $sql ="insert into files (name,size,downloads,owner) values ('$filename','$size','0','$name')";
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
if (isset($_GET['file_id']))
{
    $id = $_GET['file_id'];
    $sql="select * from files where id=$id";
    $result=mysqli_query($con,$sql);
    $file=mysqli_fetch_assoc($result);
    $filepath='uploads/' . $file['name'];
    $name= $file['name'];
    if(file_exists($filepath))
    {
        header('Content-Type: application/pdf');      
        header('Content-Disposition:attachment;filename="' .$file['name'] . '"');
  
        readfile('uploads/' .$file['name']);
        $Count=$file['downloads'] +1 ;
        $updateQuery = "Update files set downloads=$Count where id=$id";
        mysqli_query($con,$updateQuery);
        exit;
    }
}


?>