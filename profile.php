<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
};
ob_start();
include 'uploadpic.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="home.php" class="nav-item nav-link ">Home</a>
                <a href="profile.php" class="nav-item nav-link active ">Profile</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-3">
                <h1><?php echo  $_SESSION['username']; ?></h1>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="col-sm-3">
                <!--left col-->

                <form action="profile.php" method="post" enctype="multipart/form-data">
                    <div class="text-center">
                        <img id="myImg" src="uploads/<?php echo $_SESSION['filename']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>

                        <input type="file" class="text-center center-block file-upload" name="myfile">
                        <button type="submit" name="upload">UPLOAD</button>

                    </div>
                </form>
                </hr><br>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> <?php echo $num ?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Downloads</strong></span> <?php echo $sum ?> </li>
                </ul>

            </div>

            <!--/col-3-->
            <div class="col-sm-9 row">
                <?php foreach ($images  as $file) { ?>
                    <div class="col-lg-3 col-md-4 mb-2">
                        <div class="card h-50">
                            <div class="embed-responsive embed-responsive-1by1">
                                <iframe class="embed-responsive-item" src="uploads/<?php echo $file['name']; ?>"></iframe>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $file['name']; ?></p>
                                <h4 class="card-title"><a href="#!"><?php echo $file['owner']; ?></a></h4>
                                </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($myfiles as $file) { ?>
            <div class="col-lg-3 col-md-4 mb-2">
              <div class="card h-70">
                <img src="https://archivengines.files.wordpress.com/2018/08/pdf-logo-telechargement.png" alt="connection problem">
                <div class="card-body">
                  <p class="card-text"><?php echo $file['name']; ?></p>
                  <h4 class="card-title"><a  href="<?php echo $file['owner']; ?>.html"><?php echo $file['owner']; ?></a></h4>
                  <a href="profile.php?file_id=<?php echo $file['id'] ?>"><button style=" background-color: DodgerBlue" class="btn"><i class="fa fa-download" action="post"></i> Download</button></a>
                </div>
                <div class="card-footer"><small class="text-muted">Donwloaded <?php echo $file['downloads']; ?> times </small></div>
              </div>
            </div>
          <?php } ?>



            </div>
        </div>

</body>

</html>
<?php 
file_put_contents($_SESSION['username'].'.html', ob_get_contents());
?>