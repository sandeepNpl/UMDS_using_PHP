<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Add Admin</h2>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
            </tr>
            
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter Your Username"></td>

            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter Password"></td>
            </tr>
            <br> 
        </table>
        <br>
        <tr>
            <td colspan="2">
                <input type="submit" value="Submit" name="submit" class="btn-primary" class="submit-btn">
            </td>
        </tr>     
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php   

//  Process  for the value of the submit form 

if(isset($_POST['submit'])){

    // Button is clicked

    // Get the data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // SQL query
    $sql = "INSERT INTO tbl_admin SET 
      full_name ='$full_name',
      username = '$username',
      password = '$password'     
     ";

     //execute Query
     $res = mysqli_query($conn,$sql);
     //check whether the query is executed or not 
     if($res==TRUE){
        //data inserted 
        // echo "Data is inserted";
        $_SESSION['add'] = "<div class='success'>Admin Added sussessfully</div>";

        //Redirect page 
        header('location:'.SITEURL.'admin/manage-admin.php');
     }
     else{
        //failed to inset data;
        // echo "data is not Inserted";
        $_SESSION['add'] = "Failed to add Admin";
        //Redirect page 
        header('locatoin:'.SITEURL.'admin/add-admin.php');
     }
}
else{
    // bUtoon  is not clicked.
}


?>

<!--  -->



