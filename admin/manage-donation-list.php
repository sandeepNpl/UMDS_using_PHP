    <!--  Link for the Menu Section -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Donation List</h2>
            <br><br>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Email id </th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                     <th>Quantity</th>
                     <th>Expiry Date</th>
                     <th>type</th>
                     <th>Action</th>
                </tr>

                <?php  
                  //Query for Select Data
                  $sql1 = "SELECT * FROM tbl_donation";
                  // Execute Query
                  $res1 = mysqli_query($conn,$sql1);
                  
              // Check whether the query is execute of not.
                if($res1 == TRUE){
                    //Query is executes
                    $sn = 1;
                    $count1 = mysqli_num_rows($res1);
                    if($count1>0){
                        while($row=mysqli_fetch_assoc($res1)){
                            $id = $row['id'];
                            $full_name =$row['full_name']; 
                            $email_id = $row['email_id'];
                            $address = $row['address'];
                            $mobile_no = $row['mobile_no'];
                            $brand_name = $row['brand_name'];
                            $generic_name = $row['generic_name'];
                            $qty = $row['qty'];
                            $ex_date = $row['ex_date'];
                            $type = $row['type'];
                            // $ex_date = $row['ex_date'];
                        ?>
                        <tr>
                            <td><?php echo $sn++;  ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $email_id;  ?></td>
                            <td><?php  echo $address;  ?></td>
                            <td><?php  echo $mobile_no;  ?></td>
                            <td><?php  echo $brand_name;  ?></td>
                            <td><?php echo $generic_name;?></td>
                            <td><?php  echo $qty; ?></td>
                            <td><?php  echo$ex_date; ?></td>
                            <td><?php  echo $type; ?></td>
                            <td>
                            <a href="<?php echo SITEURL ?>/admin/delete-donate.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>
                    </td>
                        </tr>
                        
                        <?php
                        }
                    }
                }
                else{
                    // query is not executed.
                    // echo"query is not executes"
                    echo"failed to load data";
                }
        
                ?>      
            </table>
        </div>
    </div>    
    <!-- Main content ends -->
    <!-- Link for the footer section -->
    
    <?php include('partials/footer.php'); ?>