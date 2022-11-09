    <!--  Link for the Menu Section -->
    <?php include('partials/menu.php');
    ?>

    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Medicine</h2>
            <br><br>
            <?php

            if(isset($_SESSION['add'])){
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
              }
              if(isset($_SESSION['no-medicine-found'])){
                echo $_SESSION['no-medicine-found'];
                unset($_SESSION['no-medicine-found']);
              }
              if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
              }
            ?>

            <br><br>
            <!-- Button to add Admin  -->
            <a href="add-medicine.php" class="btn-primary">Add Medicine</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Brand_Name</th>
                    <th>Generic Name</th>
                    <th>Image</th>
                    <th>Expiry Date</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

            <?php 
                //Query to get all medicine detail from the database 

                $sn =1;
                $sql = "SELECT * FROM tbl_medicine";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count>0){

                    //get the data and display

                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $medicine_name = $row['medicine_name'];
                        $generic_name =$row['generic_name'];
                        $image_name = $row['image_name'];
                        $ex_date = $row['ex_date'];
                        $active = $row['active'];

            ?>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $medicine_name; ?></td>
                    <td><?php  echo $generic_name;?></td>

                    <td>
            <?php 
                        if($image_name!=""){
                        ?>    
                           <img src="<?php echo SITEURL;?>Images/upload/<?php echo $image_name;?>" width="100px">
                        <?php     

                        }else {
                            echo "Image not Added";
                        }                        
            ?>
                    
                    </td>

                    <td><?php  echo $ex_date;?></td>
                    <td><?php echo $active;?></td>
                    <td>
                        <a href="<?php echo SITEURL ?>/admin/update-medicine.php?id=<?php echo $id; ?>&image_name =<?php echo $image_name; ?>" class="btn-primary">Update Medicine</a>
                        <a href="<?php echo SITEURL ?>/admin/delete-medicine.php?id=<?php echo $id; ?>&image_name =<?php echo $image_name; ?>" class="btn-secondary">Delete Medicine</a>
                    </td>
                </tr>
                    <?php
                    }

                }else {
                    //we do not have data 
                 ?>

                 <tr>
                    <td>No medicine Added
                    </td>
                 </tr>
                 <?php

                }
                ?>
            </table>
        </div>
    </div>    
    <!-- Main content ends -->

    <!-- Link for the footer section -->
    <?php include('partials/footer.php'); ?>