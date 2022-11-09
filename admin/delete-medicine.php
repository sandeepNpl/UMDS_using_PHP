<?php
include('../config/constants.php');
// //check whether id and image_name value is set or not
if(isset($_GET['id']))
{
   $id = $_GET['id'];
   $image_name = $_GET['image_name'];

// SQL for Delete data
$sql = "DELETE FROM tbl_medicine WHERE id =$id";

//Execute Query
$res = mysqli_query($conn,$sql);
if($res == TRUE){
    $_SESSION['delete'] = "Delete medicine successfully.";
    //redirect to Manage-medicine
    header('location:'.SITEURL.'admin/manage-medicine.php');
}else{
    $_SESSION['delete'] = " Failed to Delete medicine";
    //redirect to Manage-medicine
    header('location:'.SITEURL.'admin/manage-medicine.php');
}


}

else{
    // Redirect to manage category page
    header('location:'.SITEURL.'admin/manage-medicine.php');
}

?>