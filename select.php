<?php 
include('partials-front/menu.php');
?>

   <?php   

   //check whether medicine-id is set or not
   if(isset($_GET['medicine_id'])){ 

   $medicine_id = $_GET['medicine_id'];
   
   }
   
   else{

     echo "medicine id is not set";
   }
     
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
                    <td><input type="text" name="full_name" required placeholder="Your Full Name"></td>
                </tr>

                <tr>
                  <td><input type="text" name="email_id" required placeholder="Your Email id"></td>
                 </tr>
              <tr>
                <td><input type="text" name="address"   required placeholder=" Your Address"></td>
              </tr>

               <tr>
                <td><input type="text" name="mobile_no" required placeholder="Your Mobile NO"></td>
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

if(isset($_POST['submit'])){
  // echo "clicked";
    // Get the data from Form database
    $full_name = $_POST['full_name'];
    $email_id = $_POST['email_id'];
    $address = $_POST['address'];
    $mobile_no = $_POST['mobile_no'];
    
    //Sql to Insert the data to the database
    $sql = "INSERT INTO tbl_select_available SET 
    full_name ='$full_name',
    email_id = '$email_id',
    address = '$address',
    mobile_no = '$mobile_no'
   ";
   //execute the query
   $res = mysqli_query($conn,$sql);
   if($res==TRUE){
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
