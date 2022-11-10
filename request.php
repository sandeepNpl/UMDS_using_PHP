   <?php include('partials-front/menu.php'); ?>
   <?php   
   //check whether medicine-id is set or not
  //  if(isset($_GET['medicine_id'])){

  //   $medicine_id = $_GET['medicine_id'];

  //   $sql = "SELECT * FROM tbl_request WHERE id = $medicine_id";

  //   $res = mysqli_query($conn,$sql);

  //   $count = mysqli_num_rows($res);

  //   if($count ==1){

  //     $row = mysqli_fetch_assoc($res);
  //     $full_name =$row['full_name']; 
  //     $email_id = $row['email_id'];
  //     $address = $row['address'];
  //     $mobile_no = $row['mobile_no'];
  //     $brand_name = $row['brand_name'];
  //     $generic_name = $row['generic_name'];
  //     $type = $row['type'];
  //   }else{
  //     header('location:'.SITEURL);
  //   }

  //  }
  //  else{
  // //   // Redirect to the homepage
  // //   header('location:'.SITEURL);
  //  }
  
   ?>


    <!-- main section start -->
    <section class="main-content-section">

        <form action="" method="POST" for="name">
          <br>
          <?php 
           if(isset($_SESSION['request'])){
            echo $_SESSION['request'];
            unset($_SESSION['request']);
          }
          ?>
            <table>
                <tr> 
                    <td><input type="text" name="full_name" required placeholder="Enter your Fullname"></td>
                </tr>

                <tr>
                  <td><input type="email" name="email_id" required placeholder="Enter your email id"></td>
                 </tr>
              <tr>
                <td><input type="text" name="address" placeholder="Enter your Address"></td>
              </tr>

               <tr>
                <td><input type="text" name="mobile_no" placeholder="eg.98xxxxxxxx"></td>
              </tr>

              <tr>
                <td><input type="text" name="brand_name" placeholder="Enter Brand Name"></td>
              </tr>
      
              <tr>
                <td><input type="text" name="generic_name" placeholder="Enter Generic Name"></td>
              </tr>
              <tr>
                <td>
                   <select name="type">
                  <option value="tablet">Tablet</option>
                  <option value="liquid">Liquid</option>
                  <option value="capsule">Capsule</option>
                </select>
              </td>
              </tr> 
              <tr>
                <td colspan="2"><input type="submit" name="submit" value="Submit" class="press-btn"><input type="reset" value="Reset" class="press-btn"></td>
              </tr>
            </table>
        </form>

    </section>
    <!-- main section end -->

   <!-- Contact Section -->
   <section class="contact text-center">
    <div class="text-center space styles">Contact Us</div>
    <div>
     <div class="information">
      <p>Email Id: unusedmedicine123@gmail.com
        <br>
        Contact No:986375245
      </p>
      <br>
     </div>
    </div>
  </section>
  <!-- End contact Section -->

  <!-- Footer-section start -->
  <section class="footer">
    <p class=" text-center">
      Copyright © 2022 Unused Medicine Donation System. All rights reserved.
    </p>
  </section>
  <!-- Footer-section-End -->
</body>
</html>

<?php   
//check whetjer the submit button is clicked or not 
//if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['confirmpassword'])) {

if(isset($_POST['submit'])){
  // echo "clicked";
    // Get the data from Form database
    $full_name = $_POST['full_name'];
    $email_id = $_POST['email_id'];
    $address = $_POST['address'];
    $mobile_no = $_POST['mobile_no'];
    $brand_name = $_POST['brand_name'];
    $generic_name = $_POST['generic_name'];
    $type= $_POST['type'];
    

    //Sql to Insert the data to the database
    $sql1 = "INSERT INTO tbl_request SET 
    full_name ='$full_name',
    email_id = '$email_id',
    address = '$address',
    mobile_no = '$mobile_no',
    brand_name = '$brand_name',
    generic_name = '$generic_name',
    type = '$type'
   ";
   //execute the query
   $res1 = mysqli_query($conn,$sql1);
   if($res1 == TRUE){
    //data inserted 
    // echo "Data is inserted";
    $_SESSION['request'] = "<div class='success'>Request is Succsssfully</div>";
    //Redirect page 
 }
 else{
    //failed to inset data;
    // echo "data is not Inserted";
    $_SESSION['request']="Failed to request";
    //Redirect page 
    header('locatoin:'.SITEURL.'request.php');
 }

}
else{
  // echo "not clicked";
  // echo"Sorrr! you hav not clicked Button";
}

?>
