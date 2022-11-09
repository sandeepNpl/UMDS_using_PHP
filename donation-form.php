<?php   include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMDS | Donation palnel</title>
    <link rel="stylesheet" href="styles/donation-form.css">
<body>

<section class="main-content-section">
<form action="" method="POST" for="name" class="form-container" enctype = 'multipart/form-data'>
  <br> 
  <div class="table-section">

    <table>
        <tr> 
            <td><input type="text" name="full_name" required placeholder="Enter your Fullname"><span class="need">*</span></td>
        </tr>

        <tr>
          <td><input type="email" name="email_id" required placeholder="Enter your email id"><span class="need">*</span></td>
         </tr>
      <tr>
        <td><input type="text" name="address" placeholder="Enter your Address"><span class="need">*</span></td>
      </tr>

       <tr>
        <td><input type="text" name="mobile_no" placeholder="eg.98xxxxxxxx"><span class="need">*</span></td>
      </tr>

      <tr>
        <td><input type="text" name="brand_name" placeholder="Enter Brand Name"><span class="need">*</span></td>
      </tr>

      <tr>
        <td><input type="text" name="generic_name" placeholder="Enter Generic Name"><span class="need">*</span></td>
      </tr>
      <tr>
        <td><input type="number"  name="qty" placeholder="Quantity" ><span class="need">*</span></td>
      </tr>
      <tr>
      <td><input type = 'text' name ="ex_date" placeholder="Expiry Date"><span class="need">*</span></td>
      </tr>
      <tr>
      <td>
      <input type = 'file' name ="image" class="file_upload">
      </td>
      </tr>
      <tr>
            <td>
               <select name="type" class="med_type">
              <option  placeholder="Type">Tablet</option>
              <option >Liquid</option>
              <option >Capsule</option>
            </select>
            <span class="need">*</span>
          </td>
      </tr> 
     
        <td colspan="2"><input type="submit" name="submit" value="Submit" class="press-btn"><input type="reset" value="Reset" class="press-btn"></td>
      </tr>
    </table>
  </div>
</form>

</section>
<!-- main section end -->  
</body>
</html>

<?php  
if(isset($_POST['submit']))
{
  $full_name = $_POST['full_name'];
  $email_id = $_POST['email_id'];
  $address = $_POST['address'];
  $mobile_no = $_POST['mobile_no'];
  $brand_name = $_POST['brand_name'];
  $generic_name = $_POST['generic_name'];
  $qty = $_POST['qty'];
  $ex_date = $_POST['ex_date'];
  
  //Set the image is upload or not.
  if ( isset( $_FILES[ 'image' ][ 'name' ] ) ) {
    //to upload image we need image name, source path and destination path
    $image_name = $_FILES[ 'image' ][ 'name' ];

    if ( $image_name!='') {

        $source_path = $_FILES[ 'image' ][ 'tmp_name' ];

        $destination_path =  '../Images/upload/'.$image_name;

        //upload the image
        $upload = move_uploaded_file( $source_path, $destination_path );

        //check whether the image is uploaded or not
        //if image is not uploaded the stop the process and redirected to the add-medicine page

        if ( $upload == false ) {
            $_SESSION[ 'upload' ] = "<div class='error'>Failed to Upload Image</div>";
            //redirect to add add-medicine
            header( 'location:'.SITEURL.'admin/add-medicine.php' );
            //Stop the process
            die();
        }
    }
} else {
    $image_name = '';
}
  $type= $_POST['type'];

   //Sql to Insert the data to the database
   $sql = "INSERT INTO tbl_donation SET 
   full_name ='$full_name',
   email_id = '$email_id',
   address = '$address',
   mobile_no = '$mobile_no',
   brand_name = '$brand_name',
   generic_name = '$generic_name',
   qty = '$qty',
   ex_date = '$ex_date',
   image_name ='$image_name',
   type = '$type'
  ";
$res = mysqli_query($conn,$sql);
if($res == TRUE){
 //data inserted 
 $_SESSION['donate'] = "<div class='success'>Thank you !!!</div>";
 header('location:thank_you.php');
 
}
else{
 //failed to inset data;
 // echo "data is not Inserted";
 $_SESSION['request']="Failed to request";
 //Redirect page 
}
}



?>