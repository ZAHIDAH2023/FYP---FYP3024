<?php include('./config/constant.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Dunia Bestari | Update Tutor </title>
</head>
<body>
<?php 
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                //Get all the details based on the id
                //SQL query to get the student details
                $sql2 = "SELECT * FROM tutor WHERE id=$id";
                //Execute query
                $res2 = mysqli_query($conn, $sql2);
                //Count rows
                $count2 = mysqli_num_rows($res2);

                if ($count2==1)
                {
                    //Details Available
                    $row2 = mysqli_fetch_assoc($res2);

                    $tutor_name = $row2['tutor_name'];
                    $ic = $row2['ic'];
                    $email = $row2['email'];
                    $phone_num = $row2['phone_num'];
                    $achievement = $row2['achievement'];
                    $address = $row2['address'];
    

                }
                else
                {
                    //Details Available
                    //Redirect to Manage student Page
                    header('location:'.SITEURL.'teacher_admin.php');
                }
            }
            else
            {
                //Redirect to Manage student Page
                header('location:'.SITEURL.'teacher_admin.php');
            }
        
        ?>

    <div class="container">
        <form action="#" method="POST">
            <h2>Update-Tutor Information</h2>
            <div class="content">
            <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Tutor Email" name="email" value = "<?php echo $email; ?>" required>
                </div>
                <div class="input-box">
                    <label for="phone_num">Phone Number</label>
                    <input type="text" placeholder="Tutor phone Number" name="phone_num" value = "<?php echo $phone_num; ?>" required>
                </div>
                <div class="input-box">
                    <label for="achievement">Achievement</label>
                    <input type="text" placeholder="Tutor Achievement" name="achievement" value = "<?php echo $achievement; ?>" required>
                </div>
                <div class="input-box">
                    <label for="address">Address</label>
                    <input type="text" placeholder="Tutor Address" name="address" value = "<?php echo $address; ?>" required>
                </div>
                
            <div class="button-container">
                <input type="hidden" name ="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit">Update Tutor</button>
            </div>
        </form>
    </div>
    </body>
</html>

<?php 
    // Check whether the submit button click or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the values from form to update 
        $id = $_POST['id'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $achievement = $_POST['achievement'];
        $address = $_POST['address'];

        //Create a SQL query to update admin
        $sql3 = "UPDATE tutor SET 
            email = '$email',
            phone_num = '$phone_num', 
            achievement = '$achievement', 
            address= '$address'
            WHERE id='$id'
            ";

        //Execute the query 
        $res3 = mysqli_query($conn, $sql3);

        //Check whether the query executed succesfully or not
        if($res3==true)
        {
            //Query excuted and admin updated
            $_SESSION['update'] = "<div class='success'>Tutor Update Successfully.</div>";
            //Redirect to manage admin Page
            header('location:'.SITEURL.'teacher_admin.php');
        }
        else
        {
            //Failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Tutor .</div>";
            
            //Redirect to Mangae Admin Page
            header('location:'.SITEURL.'teacher_admin.php');
        }
    }
    


?>