    <!--  Link for the Menu Section -->
    <?php include('partials/menu.php'); ?>

    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Admin</h2>
            <br>
            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>
            <br><br>

            <!-- Button to add Admin  -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br><br>
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <!-- code for Datbase -->
                <?php 
                //Query for Select Data
                $sql = "SELECT * FROM tbl_admin" ;
                // Execute Query
                $res = mysqli_query($conn,$sql);
                
                // Check whether the query is execute of not.
                if($res == TRUE){

                    $sn =1;
                    
                    $count = mysqli_num_rows($res);

                    if($count>0){
                        while($rows=mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                            ?>

                            <!-- Create Table to show the data  of  the Database  -->
                            <tr>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username;?></td>
                                <td>
                                <a href="#" class="btn-primary">Update Admin</a>
                                <a href="<?php echo SITEURL ?>/admin/delete-admin.php?id=<?php echo $id;?>" class="btn-secondary">Delete Admin</a>
                                </td>
                            </tr>
                            <?php 
                        }
                    }
                }
                
                ?>
                </tr>
            </table>
        </div>
    </div>    
    <!-- Main content ends -->


    <!-- Link for the footer section -->
    
    <?php include('partials/footer.php'); ?>