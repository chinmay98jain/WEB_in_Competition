<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <!-- Optional JavaScript -->    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<nav class="navbar navbar-expand-md navbar-light" style="background-color:wheat;color:white;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="icfc.php">ICFC</a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="admin.php">Admin</a>
      <a class="nav-item nav-link" href="login.php">Sign In</a>
      <a class="nav-item nav-link current" href="signup.php">Sign Up</a>
    </div>
  </div>
</nav>  
<br>

<div class="container">
<h2 style="text-align:center;" class="display-3">SignUp</h2>
<br><hr>
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="signup.php" method="POST">
        <label>Full Name</label>
    <input type="text" class="form-control" name="fname" placeholder="Name" required>
<br>
    <label>Email address/Username</label>
    <input type="email/text" class="form-control" name="uname" placeholder="E-mail/Username" required>
<br>
    <label>Password</label>
    <input type="password" class="form-control" name="pwd" placeholder="Password" required>

    <br>
    <label>Mobile No.</label>
    <input type="number" class="form-control" name="num" placeholder="Number" required>
  

  <br>
  <button type="submit" name="btn2" class="btn btn-primary">Submit</button>

  <a href="login.php  " class="btn btn-warning">Already a User? Sign In</a>
</form>
    </div>
  </div>
</div>
  </body>
</html>

<?php
	if(isset($_POST['btn2']))
	{
			if(isset($_POST['uname'])&&!empty($_POST['uname'])&&isset($_POST['pwd'])&&!empty($_POST['pwd'])&&isset($_POST['fname'])&&!empty($_POST['fname'])&&isset($_POST['num'])&&!empty($_POST['num']))
			{
				$u=$_POST['uname'];
				$p=$_POST['pwd'];
         $u1=$_POST['fname'];
        $p1=$_POST['num'];
        $str="\n".$u.":".$p;
				$f=1;
				$str1="\n".$u1.":".$p1;
				
			$handle=fopen("user_crs.txt","a+");
       $handle1=fopen("user_crs1.txt","a+");

			while(!feof($handle))
			{
					$s=fgets($handle);
					$a=explode(':',$s);
				if(($u==trim($a[0])))
				{
					$f=0;
					echo "<br><div class='container'><div class='alert alert-danger'>Username Already Taken..Try Again</div></div>";
					break;
				}
			}
			if($f==1)
			{
				fwrite($handle,$str);
        fwrite($handle1,$str1);
				header("Location:login.php");
			}
		

		}

  
}
?>