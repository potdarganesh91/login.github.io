<?php

$showerror=false;
$showalert = false;
$enterterror=false;
// if(!($_POST['username']) || !($_POST['password'])){
//   echo "please enter the values";
if(!isset($_POST['submited'])){
  $enterterror=true;
}else{
if($_SERVER["REQUEST_METHOD"] ="post"){
  include 'htmlpartials/dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "Select * from usertable where username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num===1){
    $showalert = true;
    session_start();
    $_SESSION["loggedin"]=true;
    $_SESSION["username"] = $username;
    header("location: welcome.php");
  }
  else{
    $showerror = true;
  }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
  <?php 
  require 'htmlpartials/nav.php';
  ?>
  <?php
  if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> You are logged in
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>error</strong> invalid data
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
?>
<?php
 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 <strong>error</strong> enter password and username
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>';
?>
  <h2>loign to websibte</h2>
    <form action="/login/login.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
 
  <button type="submit" name="submited" class="btn btn-primary">login</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>