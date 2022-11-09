<?php  
include('config/constants.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   
    $sql = "SELECT * FROM tbl_user WHERE email = '$email'  && password ='$password' ";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count>0){
      $row = mysqli_fetch_array($res);
      if($row['user_type'] == 'admin'){
        $_SESSION['admin_name'] = $row['name'];
        header('location:admin/index.php');

      }elseif($row['user_type'] == 'user'){
        $_SESSION['user_name'] = $row['name'];
        header('location:donator.php');
      }else{
        $error[]= 'incorrect email or password';
      }

   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMDS | Login</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="styles/donation-login.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Login now</h3>
            <?php  

                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                };  
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value= "Login now" class="form-btn">
            <p>don't? have an account? <a href="donation-register.php">Register now</a></p>
        </form>
    </div>
    
</body>
</html>