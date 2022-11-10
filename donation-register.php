<?php   

include('config/constants.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $sql = "SELECT * FROM tbl_user WHERE email = '$email'  && password ='$password' ";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count>0){

        $error[] = 'user already exists';

    }else{
        if($password != $cpassword){
            $error[] = 'password not matched!';
        }else{
            $sql2 = "INSERT INTO tbl_user SET 
             name ='$name',
             email = '$email',
             password = '$password',
             user_type = '$user_type'
             ";
         $res2 = mysqli_query($conn,$sql2);    
         header('location:donation-login.php');  

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
    <title>UMDS | register</title>
    <!-- CSS Link -->
    <link rel="stylesheet" href="styles/donation-login.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Register now</h3>
            <?php  

            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };  
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your name">
            <select name="user_type" id="">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value= "register now" class="form-btn">
            <p>already have an account? <a href="donation-login.php">login now</a>  </p>
        </form>
    </div>
</body>
</html>