<?php
include( '../config/constants.php' );
?>
<html>
<head>
<title>Login - UMDS</title>
<link rel = 'stylesheet' href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
<link rel = 'stylesheet' href = '../styles/admin.css'>
</head>
<body>
<div class = 'login text-center'>
<h3>Login</h3>
<br><br>

<?php  
   if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
    unset($_SESSION['login']);
  }

?>
<!-- Login form  -->

<form action = '' method = 'POST'>
Username:
<input type = 'text' name = 'username' placeholder = ' Enter Username'>
<br><br>
Password:
<input type = 'password' name = 'password' placeholder = 'Enter the Password'>
<br><br><br>
<input type = 'submit' name = 'submit' value = 'Login' class = 'btn-primary'>
</form>
</div>
</body>
</html>

<?php

//  check whether the submit button is checked or not
if ( isset( $_POST[ 'submit' ] ) ) {
    //Button is cicked
    //Get the data from Form

    $username = $_POST[ 'username' ];
    $password = md5($_POST[ 'password' ]); 

    // sql query
    $sql = "SELECT * FROM tbl_admin WHERE username= '$username' AND password='$password'";
    $res = mysqli_query( $conn, $sql );
    $count  = mysqli_num_rows( $res );

    if ( $count == 1 ) {
        // User Available and login success
        $_SESSION[ 'login' ] = "<div class='success'>Login Successful</div>";
        header( 'location:'.SITEURL.'admin/index.php' );

    } else {
        //user not available
        $_SESSION[ 'login' ] = "<div class='error'>Failed to login</div>";
        header( 'location:'.SITEURL.'admin/login.php' );

    }

} else {
    //Button is not clicked
}

?>