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
            if(isset($_SESSION['add'])) //Checking whether the session is set of not
            {
                echo $_SESSION['add'];//Display the session message if set
                unset ($_SESSION['add']);//Remove session message
            }
         ?>
    <div class="container">
        <form action="#" method="POST">
            <h2>Add-Student</h2>
            <div class="content">
                <div class="input-box">
                    <label for="full_name">Full Name</label>
                    <input type="text" placeholder="full_name" name="full_name" required>
                </div>
                <div class="input-box">
                    <label for="Username">Username</label>
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="input-box">
                    <label for="password">Password</label>
                    <input type="password" placeholder="password" name="password" required>
                </div>
            <div class="button-container">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    //Process the value from Form and save it in Database

    //Check whether the button is clicked or not

    if(isset($_POST['submit']))
    {
        //Button Clicked
        //echo"Button Clicked";

        //1. Get the data from the form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = ($_POST['password']); //Password Encryption with md5

        //2. SQL Query to save the data to the Database
        $sql = "INSERT INTO admin SET 
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        //3. Execute query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query isExecuted) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo("Data Inserted");
            //Create a session Variable to display a message 
            $_SESSION['add'] = "<div class= 'success'>Admin Added Succesfully </div>";
            //Redirect Page to manage Admin
            header("location:".SITEURL.'admin_user.php');
        }
        else
        {
            //Failed to insert the data
            //echo ("Failed to insert data");
            //Create a session Variable to display a message 
            $_SESSION['add'] = "<div class = 'error'>Failed to Add Admin </div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'add_admin.php');
        }

    }




?>