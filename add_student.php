<?php include('./config/constant.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Dunia Bestari | Add Student </title>
</head>
<body>
    <?php 
        if(isset($_SESSION['add'])) //Checking whether the session is set or not
        {
            echo $_SESSION['add']; //Display the session Message if SET
            unset($_SESSION['add']); //Remove session Message
        }
    ?>
    <div class="container">
        <form action="#" method="POST">
            <h2>Add-Student</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Student Name</label>
                    <input type="text" placeholder="Enter Full Name" name="stud_name" required>
                </div>
                <div class="input-box">
                    <label for="ic">Identification Number</label>
                    <input type="text" placeholder="IC Student" name="ic" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Email" name="email" required>
                </div>
                <div class="input-box">
                    <label for="age">Age</label>
                    <input type="text" placeholder="Student Age" name="age" required>
                </div>
                <div class="input-box">
                    <label for="phone_num">Phone Number</label>
                    <input type="tel" placeholder="Student Phone Number" name="phone_num" required>
                </div>
                <div class="input-box">
                    <label for="courseFee">Course Fees</label>
                    <input type="text" placeholder="Student Course Fee" name="course_fee" required>
                </div>
                <div class="input-box">
                    <label for="pendingFee">Pending Fees</label>
                    <input type="text" placeholder="Student Pending Fee" name="pending_fee" required>
                </div>
            </div>
            <div class="button-container">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    //Process the value from form and Save it in the database

    //Check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        
        //1. Get the data from form
        $stud_name = $_POST['stud_name'];
        $ic = $_POST['ic'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phone_num = $_POST['phone_num'];
        $course_fee = $_POST['course_fee'];
        $pending_fee = $_POST['pending_fee'];


        //2. SQL Query to save the data into Database
        $sql = "INSERT INTO student (stud_name, ic, email, age, phone_num, course_fee, pending_fee)
            VALUES ('$stud_name', '$ic', '$email', $age, '$phone_num', $course_fee, $pending_fee)";

        //3. Execute query and save data in the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class= 'success'>Student Added Successfully </div>";

            //Redirect page to Course page
            header("location:".SITEURL.'student_admin.php');
        }
        else
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class = 'error'>Failed to Add Student </div>";

            //Redirect page
            header("location:".SITEURL.'add_student.php');

        }

    }
    
?>