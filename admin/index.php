    <?php include('partials/menu.php'); ?>

    <!-- Main Content Starts -->
    <div class="main-content">
    <div class="wrapper">
           <h2>DASHBOARD</h2>
           <div class="col-4 text-center">

           <?php  
           $sql = "SELECT * FROM tbl_admin";
            //Execute Query
             $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
           ?>


            <h1><?php echo $count; ?></h1>
            <br>
            Total Admin
           </div>

           <div class="col-4 text-center">
           <?php  
           $sql = "SELECT * FROM tbl_medicine";
            //Execute Query
             $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
           ?>

            <h1><?php echo $count; ?></h1>
            <br>
           Total Available Medicine
           </div>

           <div class="col-4 text-center">
           <?php  
           $sql = "SELECT * FROM tbl_request";
            //Execute Query
             $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
           ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Total Request
           </div>

           <div class="col-4 text-center">

           <?php  
           $sql = "SELECT * FROM tbl_donation";
            //Execute Query
             $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
           ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Total  Donation
           </div>
           <div class="clear-fix"></div>
        </div> 
    </div>
    

    <?php include('partials/footer.php') ?>
    