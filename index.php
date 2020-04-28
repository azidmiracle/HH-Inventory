<?php
include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <title>Diaz-Loria Household Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <script src="js/ShowPassword.js"></script>

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>



</head>
<body class="text-center" data-gr-c-s-loaded="true">

<form method="post" action="" class="form-signin">
<h3>Welcome to our Household Inventory</h3>   
<img class="mb-4" src="images/Diaz-loria.jpg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
   <!--<label for="uname" class="sr-only">User Name</label>-->
  <input type="text"  name="uname" class="form-control" placeholder="User Name" required="" autofocus=""><br>
  <!--<label for="pwd" class="sr-only">Password:</label><br>-->
  <input type="password"  name="pwd"  id="pwd_txtBox" class="form-control" placeholder="Password" required=""> 
  <div class="checkbox mb-3">
  <label>
  <input type="checkbox" id="chkBoxShwPWD" onclick='showPassword("pwd_txtBox")' >Show Password
  </label>
  </div>

<input type="submit" value="Log-in"  class="btn btn-lg btn-primary btn-block" >
<p>&copy; 2020 &middot; <a>CMSC 207 Project: Web Design</a> </p>
</form> 

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  /* CHANGE PASSWORD MANUAL
  $password_hash = password_hash("Eliamex", PASSWORD_DEFAULT);     
  $updatePwd = "UPDATE users SET password = '$password_hash' WHERE userName ='auggy_emmy'";

  if ($conn->query($updatePwd) === TRUE) {     
      echo '<script>if(confirm("Update password successfully!Do you want to log-in?")) {
              }</script>'; 
               
  } else {
      echo '<script>alert("Error updating record: ")</script>' . $conn->error;
  } */             

  
    $uname = trim($_POST["uname"]);//save the username to variable
    $pwd = trim($_POST["pwd"]);//save the password to variable

    echo $uname;
    
	
    echo "<br>";

    $sql = "SELECT * FROM users where username='$uname'";//select from users table where the value of username is equals to the variable $uname
    //echo $sql;
    $result = $conn->query($sql);//connect to database and save the query result to $result variable
    if ($result->num_rows > 0) {//if the results is greater than 0
      //verify the password
      while($row=mysqli_fetch_array($result)){
        if(password_verify($pwd,$row['Password'])){   
           
          //save the session of the username and email for later use
          session_start();
          $_SESSION['logged_in']="1";
           //redirect to homepage
           // on login screen, redirect to dashboard if already logged in
          if(isset($_SESSION['logged_in'])){
            header("location:home.php");
            }
           
        }
        else{
            echo '<script>alert("password does not match")</script>';
        }
      }
    }
   else{
    echo '<script>alert("username or password cannot be found.")</script>';
   } 
}
$conn->close();
?>


