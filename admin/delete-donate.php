<?php  

include('../config/constants.php');
// //check whether id and image_name value is set or not 
if(isset($_GET['id']))
{
   $id = $_GET['id'];
// SQL for Delete data
$sql = "DELETE FROM tbl_donation WHERE id =$id";

//Execute Query
$res = mysqli_query($conn,$sql);
if($res == TRUE){
    $_SESSION['delete'] = "Delete admin successfully.";
    //redirect to Manage-medicine
    header('location:'.SITEURL.'admin/manage-donation-list.php');
}else{
    $_SESSION['delete'] = " Failed to Delete Admin";
    //redirect to Manage-medicine
    header('location:'.SITEURL.'admin/manage-donation-list.php');
}

}
else{
    // Redirect to manage category page
    header('location:'.SITEURL.'admin/manage-donation-list.php');
}

?> 