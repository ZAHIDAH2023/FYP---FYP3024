<?php include('./config/constant.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Admin Dunia Bestari | Add Tutor </title>
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
            <h2>Add-Tutor</h2>
            <div class="content">
                <div class="input-box">
                    <label for="name">Tutor Name</label>
                    <input type="text" placeholder="Tutor Full Name" name="tutor_name" required>
                </div>
                <div class="input-box">
                    <label for="ic">Identification Number</label>
                    <input type="text" placeholder="IC Tutor" name="ic" required>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Tutor Email" name="email" required>
                </div>
                <div class="input-box">
                    <label for="phone_num">Phone Number</label>
                    <input type="tel" placeholder="Tutor phone Number" name="phone_num" required>
                </div>
                <div class="input-box">
                    <label for="achievement">Achievement</label>
                    <input type="text" placeholder="Tutor Achievement" name="achievement" required>
                </div>
                <div class="input-box">
                    <label for="address">Address</label>
                    <input type="text" placeholder="Tutor Address" name="address" required>
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
        $tutor_name = $_POST['tutor_name'];
        $ic = $_POST['ic'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $achievement = $_POST['achievement'];
        $address = $_POST['address'];

        //2. SQL Query to save the data into Database
        $sql = "INSERT INTO tutor SET
            tutor_name = '$tutor_name',
            ic = '$ic',
            email = '$email',
            phone_num = '$phone_num',
            achievement = '$achievement',
            address = '$address'
        ";

        //3. Execute query and save data in the database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class= 'success'>Tutor Added Successfully </div>";

            //Redirect page to Course page
            header("location:".SITEURL.'teacher_admin.php');
        }
        else
        {
            //Create session variable to display Message
            $_SESSION['add'] = "<div class= 'error'>Failed to Add Tutor </div>";

            //Redirect page
            header("location:".SITEURL.'add_tutor.php');

        }

    }
    
?>