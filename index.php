<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Atomic pdf</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/ea65c02c18.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel='icon' href='favicon.ico' type='image/x-icon' />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
</head>
<body>
<script src="main.js"> </script>


  <div class="container p-2 mt-5 mb-sm-5 d-flex justify-content-center">
    <div class="row">
      <div id="lg" class="login position-relative ">
        <h2>Login</h2>
        <form action="validation.php" method="post">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control border border-success" required />
            <label>Password</label>
            <input type="password" name="password" class="form-control border border-success" required />
          </div>
          <button type="submit" class="btn btn-primary ">Login</button>
          <button type="submit" href="" onclick="show();">Dont have an account ?</button>
          <?php if (isset($_GET['loginError'])) { ?>
          <div id="me" class="alert alert-danger"> <?= $_GET['loginError']  ?> </div> <?php }  ?>
        </form>
        <div class="position-relative mess ">
    <?php if (isset($_GET['errorMessage'])) { ?>
          <div id="me" class="alert alert-danger"> <?= $_GET['errorMessage']  ?> </div> <?php }  ?>
        <?php if (isset($_GET['validMessage'])) { ?>
          <div id="me" class="alert alert-success"> <?= $_GET['validMessage'] ?> </div> <?php }  ?>
    </div>
      </div>
      <div id="reg"   class="position-relative register">
        <h2>Register Here</h2> <button type="submit" onclick="hide();" href=""><i class="fas fa-times"></i></button>
        <form id="fm" action="registration.php" method="post">
          <div class="form-group">
            <label>Username</label>
            <input pattern="[A-Za-z]+" type="text" name="user" class="form-control border border-primary" required />
            
            </div>
            <label>Email</label>
            <input type="email" name="email" class="form-control border border-primary" required />
            <label>Password</label>
            <input type="password" name="password" id="password" onchange="check_pass();" class="form-control border border-primary" required />
            <label>Confirm Password</label>
            <input type="password" name="pw1" id="pw1" onchange="check_pass();" class="form-control border border-primary" required />
          <span id="error-message" style=" width: -moz-fit-content;" disabled></span> <br>
          <button type="submit" id="submit" class="btn btn-primary " disabled>Register</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>

</body>

</html>