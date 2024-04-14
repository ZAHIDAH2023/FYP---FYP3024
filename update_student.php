<?php include('./config/constant.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Dunia Bestari | Update Student </title>
</head>
<body>
<?php 
            //Check whether id is set or not
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                //Get all the details based on the id
                //SQL query to get the student details
                $sql = "SELECT * FROM student WHERE id=$id";
                //Execute query
                $res = mysqli_query($conn, $sql);
                //Count rows
                $count = mysqli_num_rows($res);

                if ($count==1)
                {
                    //Details Available
                    $row = mysqli_fetch_assoc($res);

                    $stud_name = $row['stud_name'];
                    $ic = $row['ic'];
                    $email = $row['email'];
                    $age = $row['age'];
                    $phone_num = $row['phone_num'];
                    $course_fee = $row['course_fee'];
                    $pending_fee = $row['pending_fee'];
    

                }
                else
                {
                    //Details Available
                    //Redirect to Manage student Page
                    header('location:'.SITEURL.'student_admin.php');
                }
            }
            else
            {
                //Redirect to Manage student Page
                header('location:'.SITEURL.'student_admin.php');
            }
        
        ?>

    <div class="container">
        <form action="#" method="POST">
            <h2>Update-Student Information</h2>
            <div class="content">
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Email" name="email" value = "<?php echo $email; ?>"required>
                </div>
                <div class="input-box">
                    <label for="phone_num">Phone Number</label>
                    <input type="text" placeholder="Valid Phone Number" name="phone_num" value = "<?php echo $phone_num; ?>" required>
                </div>
                <div class="input-box">
                    <label for="course_fee">Course Fee</label>
                    <input type="text" placeholder="Course Fee" name="course_fee" value = "<?php echo $course_fee; ?>" required>
                </div>
                <div class="input-box">
                    <label for="pending_fee">Pending Fee</label>
                    <input type="text" placeholder="Pending Fee" name="pending_fee" value = "<?php echo $pending_fee; ?>" required>
                </div>
                
            <div class="button-container">
                <input type="hidden" name ="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit">Update Student</button>
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
        $course_fee = $_POST['course_fee'];
        $pending_fee = $_POST['pending_fee'];

        //Create a SQL query to update admin
        $sql2 = "UPDATE student SET 
            email = '$email',
            phone_num = '$phone_num', 
            course_fee = $course_fee, 
            pending_fee = $pending_fee
            WHERE id='$id'
            ";

        //Execute the query 
        $res2 = mysqli_query($conn, $sql2);

        //Check whether the query executed succesfully or not
        if($res2==true)
        {
            //Query excuted and admin updated
            $_SESSION['update'] = "<div class='success'>Course Update Successfully.</div>";
            //Redirect to manage admin Page
            header('location:'.SITEURL.'student_admin.php');
        }
        else
        {
            //Failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin .</div>";
            
            //Redirect to Mangae Admin Page
            header('location:'.SITEURL.'student_admin.php');
        }
    }
    


?>