<?php
$showalert = false;
$showerror= false;
$enterterror=false;
 
  if(!isset($_POST['submited'])){
    $enterterror=true;
  }else{
if($_SERVER["REQUEST_METHOD"] = "post"){
  include 'htmlpartials/dbconnect.php';

  if(strlen($_POST["username"]!=0)||(strlen($_POST["password"]!=0))||(strlen($_POST["cpassword"]!=0))){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

  if($password == $cpassword){  
 $sql = "INSERT INTO `usertable` (`username`, `password`, `date`) VALUES ('$username', '$password',  CURRENT_TIMESTAMP)";
$result = mysqli_query($conn , $sql);
if($result){
    $showalert = true;
}
else{
  $showerror = true;
  echo "error";
}
}
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

    <title>signup</title>
  </head>
  <body>
  <?php 
  require 'htmlpartials/nav.php';
  ?>
  <?php
  if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> Your account is created go to log in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
?>

<?php
  if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>error</strong> Your account is not created
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
  <h2>sign up to websibte</h2>
    <form action="/login/signup.php" method="post">
  <div class="form-group col-md-6">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group col-md-6">
    <label for="cpassword">confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">make shore password is same</small>
  </div>
 
  <button type="submited" name="submited" class="btn btn-primary">Sign up</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>