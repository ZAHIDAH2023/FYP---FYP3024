<?php include('./config/constant.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Dunia Bestari | Add Course </title>
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
            <h2>Add-Course</h2>
            <div class="content">
                <div class="input-box">
                    <label for="subject">Subject Name</label>
                    <input type="text" placeholder="Enter Subject Name" name="subject" required>
                </div>
                <div class="input-box">
                    <label for="amount">Amount</label>
                    <input type="text" placeholder="Amount(RM)" name="amount" required>
                </div>
                <div class="input-box">
                    <label for="remark">Remark</label>
                    <input type="text" placeholder="Enter Remark" name="remark" required>
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
        $subject = $_POST['subject'];
        $amount = $_POST['amount'];
        $remark = $_POST['remark'];

        //2. SQL Query to save the data into Database
        $sql = "INSERT INTO course SET
            subject = '$subject',
            amount = '$amount',
            remark = '$remark'
        ";

        //3. Execute query and save data in the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class= 'success'>Subject Added Successfully </div>";

            //Redirect page to Course page
            header("location:".SITEURL.'courses_admin.php');
        }
        else
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class = 'error'>Failed to Add Subject </div>";

            //Redirect page
            header("location:".SITEURL.'add_course.php');

        }

    }
    
?>