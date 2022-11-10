    <!--  Link for the Menu Section -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Request</h2>
            <br><br>
            <!-- Button to add Admin  -->
            <a href="" class="btn-primary">Send Response</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Email Id</th>
                    <th>Address</th>
                    <th>Mobile No</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Medicine Type</th>
                    <th>Actions</th>
                </tr>
                <!-- Select the data from the datbase  to the frontend part -->
            <?php  
                // error_reporting(0);
                  //Query for Select Data
                  $sql = "SELECT * FROM tbl_request" ;
                  // Execute Query
                  $res = mysqli_query($conn,$sql);
                  
              // Check whether the query is execute of not.
                if($res == TRUE){
                    //Query is executes
                    $sn = 1;
                    $count = mysqli_num_rows($res);
                    if($count>0){
                        while($row=mysqli_fetch_assoc($res)){
                            $id = $row['id'];
                            $full_name =$row['full_name']; 
                            $email_id = $row['email_id'];
                            $address = $row['address'];
                            $mobile_no = $row['mobile_no'];
                            $brand_name = $row['brand_name'];
                            $generic_name = $row['generic_name'];
                            $type = $row['type'];
            ?>
                        <tr>
                            <td><?php echo $sn++;  ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $email_id;  ?></td>
                            <td><?php  echo $address;  ?></td>
                            <td><?php  echo $mobile_no;  ?></td>
                            <td><?php  echo $brand_name;  ?></td>
                            <td><?php echo $generic_name;?></td>
                            <td><?php  echo $type?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>/admin/delete-request.php?id=<?php echo $id;?>" class="btn-secondary">Delete</a>
                            </td>
                        </tr>
                        
            <?php
                        }
                    }
                }
                else{
                    // query is not executed.

                }
        
            ?>  
            </table>

            <br><br><br>


            <table class="tbl-full">
                <h3 style="border-bottom:2px solid black; width:28%;">Request From Available section</h3>
                <br>
            <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Email Id</th>
                    <th>Address</th>
                    <th>Mobile No</th>
                    <th>Brand Name</th>
                    <th>Generic Name</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                    
            </tr>

            <!-- Code for vailable medicine -->
            <?php  
                // error_reporting(0);
                  //Query for Select Data
                  $sql1 = "SELECT * FROM tbl_select_available";
                  // Execute Query
                  $res1 = mysqli_query($conn,$sql1);
                  
              // Check whether the query is execute of not.
                if($res1 == TRUE){
                    //Query is executes
                    $sn1 = 1;
                    $count1 = mysqli_num_rows($res1);
                    if($count1>0){
                        while($row=mysqli_fetch_assoc($res1)){
                            $id1 = $row['id1'];
                            $full_name =$row['full_name']; 
                            $email_id = $row['email_id'];
                            $address = $row['address'];
                            $mobile_no = $row['mobile_no'];
                            $brand_name = $row['brand_name'];
                            $generic_name = $row['generic_name'];
                            $ex_date = $row['ex_date'];
                        ?>
                        <tr>
                            <td><?php echo $sn1++;  ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $email_id;  ?></td>
                            <td><?php  echo $address;  ?></td>
                            <td><?php  echo $mobile_no;  ?></td>
                            <td><?php  echo $brand_name;  ?></td>
                            <td><?php echo $generic_name;?></td>
                            <td><?php  echo $ex_date?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>/admin/delete-request-available.php?id=<?php echo $id1;?>" class="btn-secondary">Delete</a>
                            </td>
                        </tr>    


                        <?php
                        }
                    }
                }
                else{
                    // query is not executed.
                }
        
                ?>      
            </table>

        </div>
    </div>    
    <!-- Main content ends -->

    <!-- Link for the footer section -->
    
    <?php include('partials/footer.php'); ?>