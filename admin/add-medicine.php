<?php include( 'partials/menu.php' );
?>

<div class = 'main-content'>
<div class = 'wrapper'>
<h1>Add Medicine</h1>
<br><br>
<?php

if ( isset( $_SESSION[ 'add' ] ) ) {
    echo $_SESSION[ 'add' ];
    unset( $_SESSION[ 'add' ] );
}
if ( isset( $_SESSION[ 'upload' ] ) ) {
    echo $_SESSION[ 'upload' ];
    unset( $_SESSION[ 'upload' ] );
}
?>
<table class ='tbl-30'>
<form action = '' method = 'POST' enctype = 'multipart/form-data'>

<tr>
<td>Medicine Name(Brand Name):</td>
<td><input type = 'text' name = 'medicine_name' placeholder = 'Brand name of Medicine'></td>
</tr>

<tr>
<td>Generic Name:</td>
<td><input type = 'text' name = 'generic_name' placeholder = 'Generic name of Medicine'></td>
</tr>

<tr>
<td>Select Image:</td>
<td>
<input type = 'file' name = 'image'>
</td>

</tr>

<tr>
<td>Expiry Date:</td>
<td><input type = 'date' name = 'ex_date'></td>
</tr>
<tr>
<td>Active:</td>
<td>
<input type = 'radio' name = 'active' value = 'Yes'>yes
<input type = 'radio' name = 'active'  value = 'No'>No
</td>
</tr>
<tr>
<td colspan = '2'>
<input type = 'submit' value = 'Submit' name = 'submit' class = 'btn-primary' class = 'submit-btn'>
</td>
</tr>
</form>
</table>
</div>
</div>

<?php include( 'partials/footer.php' );
?>

<?php

if ( isset( $_POST[ 'submit' ] ) ) {
    // echo 'Button is clicked';
    // get the value from form
    $medicine_name = $_POST[ 'medicine_name' ];
    // $image_name = $_POST[ 'image_name' ];
    $generic_name = $_POST['generic_name'];
    $ex_date = date( 'Y-m-d', strtotime( $_POST[ 'ex_date' ] ) );

    //For radio input, we need to check  whether the button is selected or not
    if ( isset( $_POST[ 'active' ] ) ) {
        //get the value from FORM
        $active = $_POST[ 'active' ];

    } else {
        //set the default value
        $active = 'No';
    }
    //check whether the image is selected or not
    

    // die();

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

    //SQL query
    $sql = "INSERT INTO tbl_medicine SET
    medicine_name ='$medicine_name',
    generic_name = '$generic_name',
    image_name ='$image_name',
    ex_date = '$ex_date',
    active = '$active'  
    ";

    //execute the query and save in database
    $res = mysqli_query( $conn, $sql );
    if ( $res == True ) {
        //Query is executed successfully
        $_SESSION[ 'add' ] = "<div class'success'>Medicine added Successfully</div>";
        header( 'location:'.SITEURL.'admin/manage-medicine.php' );
    } else {
        //Failed
        $_SESSION[ 'add' ] = "<div class'success'>Failed to add medicine</div>";
        header( 'location:'.SITEURL.'admin/manage-medicine.php' );
    }

} else {
    // echo 'Button is not clicked';
    echo"button is not clicked."
}

?>