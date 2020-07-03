<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>Login - Admin</title>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body style="background-color:rgb(58, 41, 58);">
 <?php 
  include 'db.php';
  
  if(!empty($_POST)){

 $email=$_POST['email'];
 $password=$_POST['password'];
 var_dump($email);
 if(empty($email) || empty($password))
 {
     header('Location:../admission/login.php?error=emptyFields');
     exit();
 }
 else
 {
    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "admission";
    session_start();
    // Create connection
    $conn = new mysqli($servername, $username, $pwd, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql="select * from user"; 
    $match=false;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $uname = $row['email'];
            $upassword = $row['password'];
            
            
               if(($uname==$email ) && ($upassword==$password) ){
                    
                   $match='true';
                   
                   break;
               }
        
          
          }
  
     
    }
    if($match==true)
    {
        session_start();
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        header('Location:../admission/admin_home.php');
        exit();
    }
    else{
        header('Location:../admission/login.php?error=incorrect');
     exit();
    }
  
}
}
 ?>

    <div class='container' >

        <div class="card" style="margin-top:100px;">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center;font-size:18px">Sign In</h5>
                <h6 class="card-subtitle mb-2 text-muted" style="text-align: center;font-size:14px">Please enter your credential information.</h6>
                <p class="card-text" style="text-align: center;">
                        <form action='login.php' method='POST'>
                            <div class='form-group'>
                                <div class='form-row'>
                                    <div class='col-4'></div>
                                    <div class='col-sm-1 col-md-2'> 
                                        <label for='name'>Email:</label>
                                    </div>
                                    <div class='col-2'>
                                        <input type='text' name='email' class='form-control' id='email'>
                                    </div>
                                    <div class='col-4'></div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <div class='form-row'>
                                    <div class='col-4'></div>
                                    <div class='col-sm-1 col-md-2'>
                                        <label for='password'>Password:</label>
                                    </div>
                                    <div class='col-2'>
                                        <input type='password' name='password' class='form-control' id='password'>
                                    </div>
                                    <div class='col-4'></div>
                                </div>
                            </div>
                            <div class="button">
                                <div class='row'>
                                    <div class='col-4'></div>
                                    <div class='col-4' id="loginError"></div>
                                    <div class='col-4'></div>
                                </div>
                                <div class='row'>
                                    <div class='col-4'></div>
                                    <div class='col-sm-1 col-md-1'>
                                        <button type='submit' class='btn btn-md' name='login'>Log In</button>
                                    </div>
                                    <div class='col-sm-1 col-md-1'>
                                        <button type='reset' class='btn btn-md' name='cancel'>Cancel</button>
                                    </div>
                                    <div class='col-4'></div>
                                </div>
                            </div>  
                        </form>  
                    </p>
            </div>   
        </div>
    </div>

       
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <?php
    if(isset($_GET['error']))
                  {
                      if($_GET['error']=='emptyFields')
                      echo '<script>
                      document.getElementById("loginError").style.color="red";
                      document.getElementById("loginError").innerHTML="Please fill Email and Password";</script>';
                      else if($_GET['error']=='incorrect')
                      echo '<script>
                      document.getElementById("loginError").style.color="red";
                      document.getElementById("loginError").innerHTML="Incorrect Email or Password";</script>';
                      
                  }                 
                  
                  ?>
</body>

</html>