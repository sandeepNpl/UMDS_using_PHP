<?php  include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h2>Update Medicine</h2>
        <br><br>

        <?php  

        if(isset($_GET['id'])){

            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_medicine WHERE id =$id";

            $res =mysqli_query($conn,$sql);

            // Count the rows to check whether the id is valid or not 
            $count = mysqli_num_rows($res);

            if($count ==1 ){
                // Get all the data
                $row = mysqli_fetch_assoc($res);
                $medicine_name = $row['medicine_name'];
                // $current_image = $row['image-name'];
                $ex_date = $row['ex_date'];
                $active = $row['active'];
            }else{
                // Redirect to the manage-medicine
                $_SESSION['no-medicine-found'] = "<div class='error'>Medicine Not Found.</div>";
                header('location:'.SITEURL.'admin/manage-medicine.php');
            }

        }else{
            header('location:'.SITEURL.'admin/manage-medicine.php');
        }
        
        
        ?>
        <table class="tbl-30">
            <form action="" method="POST" enctype="multipart/form-data" >
            <tr>
                <td>Medicine Name:</td>
                <td><input type="text" name="medicine_name" placeholder="Enter name of Medicine" value="<?php echo $medicine_name; ?>"></td>
            </tr>

            <tr>
               <td> Image:</td>
               <td>
                <input type="file" name="image">  
               </td>

            </tr>

            <tr>
                <td>Expiry Date:</td>
                <td><input type="date" name="ex_date" value="<?php $ex_date ?>"></td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if($active == "Yes"){echo"checked";} ?> type="radio" name="active" value="Yes">yes
                    <input <?php if($active == "No"){echo"checked";} ?> type="radio" name="active"  value="No">No
                </td>
            </tr>
            <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Submit" name="submit" class="btn-primary" class="submit-btn">
            </td>
            </tr>     
        </table>
            </form>
            <?php
            if(isset($_POST['submit'])){
                //Get all the values from Form

                 $medicine_name = $_POST['medicine_name'];
                 $ex_date = date( 'Y-m-d', strtotime( $_POST[ 'ex_date' ] ) );
                 $active = $_POST['active'];

                $sql2 = "UPDATE  tbl_medicine SET 
                      medicine_name = '$medicine_name',
                      ex_date = '$ex_date',                      
                      active =  '$active'
                      WHERE id = $id
                      ";
                      $res2 = mysqli_query($conn,$sql2);

                      if($res2 == true){
                        $_SESSION['update'] ="Updated successfully";
                        header('location:'.SITEURL.'admin/manage-medicine.php');

                      }else{
                        $_SESSION['update'] =" Failed to Updated ";
                        header('location:'.SITEURL.'admin/manage-medicine.php');

                      }
            }    

            ?>
    </div>
</div>

<?php include('partials/footer.php'); ?>