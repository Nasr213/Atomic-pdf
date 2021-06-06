<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
if (empty($_SESSION['count'])) {
  $_SESSION['count'] = 1;
} else {
  $_SESSION['count']++;
}
include 'uploadpic.php';

include 'filesLogic.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/ea65c02c18.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Home</title>
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>
  <script src="home.js"> </script>
  <nav class="navbar navbar-expand-md" id="navbar">
    <div class="collapse navbar-collapse" id="navbar">
      <div class="navbar-nav">
        <a href="profile.php" class="nav-item nav-link"><img class="rounded-circle" id="img" src="uploads/<?php echo $_SESSION['filename'] ?>" alt="..." /></a>
        <a href="home.php" class="nav-item nav-link active">Home</a>
        <a href="profile.php" class="nav-item nav-link">Profile</a>
      </div>
      <div class="navbar-nav ml-auto">
        <a href="logout.php" class="nav-item nav-link">Logout</a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
    <div class="w-25 p-3 h-50 border-circle" style="background-color: #eee;border-radius: 30px;">
        <div class="col-lg-2">
          <form action="home.php" method="post" enctype="multipart/form-data">
            <div>
            <h6>Upload a PDF...</h6>
              <input type="file" class="text-center center-block file-upload" name="myfile">
              <button type="submit" class="btn btn-primary" name="save">UPLOAD</button>

            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <?php foreach ($files as $file) { ?>
            <div class="col-lg-3 col-md-4 mb-2">
              <div class="card h-100">
                <img src="https://archivengines.files.wordpress.com/2018/08/pdf-logo-telechargement.png" alt="connection problem">
                <div class="card-body">
                  <p class="card-text"><?php echo $file['name']; ?></p>
                  <h4 class="card-title"><a  href="<?php echo $file['owner']; ?>.html"><?php echo $file['owner']; ?></a></h4>
                  <a href="home.php?file_id=<?php echo $file['id'] ?>"><button style=" background-color: DodgerBlue" class="btn"><i class="fa fa-download" action="post"></i> Download</button></a>
                </div>
                <div class="card-footer"><small class="text-muted">Donwloaded <?php echo $file['downloads']; ?> times </small></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>>
</body>

</html>