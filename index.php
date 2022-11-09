<?php include('partials-front/menu.php');  ?>
<!-- Menu section End -->

    main-search-section start -->
  
    <!-- Slogan Section start -->

     <section class="slogan-content">
        <div class='slogan'>
         <p>Get a reason to be happy</p>
         <p>and be a reason for</p>
         <p> someone's happiness</p>
         <p> by donating Medicine.</p>
         <button class='donate-btn'><a href="donation-register.php">Donate Medicine</a></button>
        </div>
        <div class="slogan-image">
        <img src="./Images/main.png" width="350px" alt="">
        </div>
     </section>
    <!-- Medicine Available-section start -->
    <section class="medicine-menu">
      <div class="container">
        <h2 class="text-center" style="color: rgb(60, 60, 60)">
          Available Medicine
        </h2>
        <?php  
        //getting medicine from datbase

        $sql = "SELECT *  FROM tbl_medicine WHERE  active = 'Yes' Limit 6 ";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //count the rows
        $count = mysqli_num_rows($res);

        // check whether the medicine available or not
        if($count>0){
          //Medicine is available
          while($row=mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $medicine_name = $row['medicine_name'];
            $generic_name = $row['generic_name'];
            $ex_date = $row['ex_date'];
            $image_name = $row['image_name'];
          ?>
          <div class="medicine-menu-box">
          <div class="medicine-menu-img"> 
           <?php 
           if($image_name ==""){
            echo "<div class='error'>Image is not available</div>";
           }else{

           ?> 
            <img src="<?php SITEURL ?>Images/upload/<?php echo $image_name; ?>" alt="" width="80px">
          <?php
           }
           
           ?>
         
          </div>
          <div class="medicine-menu-disc">
            <h4 class=""><?php echo $medicine_name;?></h4>
            <p class="medicine-detail">
              <span style="font-weight:700">Generic Name :</span><?php echo $generic_name; ?>
              <br>
              <span style="font-weight:700">Expiry Date :</span><?php echo $ex_date; ?>
            </p>
            <br />
            <a href="<?php SITEURL?>select.php?medicine_id = <?php echo $id; ?>"class="btn btn-primary">Request</a>
          </div>
        </div>
          <?php 

          }
        }else{
          //medicine is not available
          $_SESSION['medicine-available'] ="<div class='error'>Medicine is not available</div>";
        }

        ?>

        <!-- Medicine-2 -->
       
        <!-- Medicine-3 -->
        
       
        <div class="clear-fix"></div>
      </div>
    </section>
    <!-- Medicine Available Section end -->
<?php include('partials-front/footer.php'); ?>