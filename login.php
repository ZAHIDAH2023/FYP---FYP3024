<?php include('config/constant.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <title>Login Page | Dunia Bestari Admin</title>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <form action="" method="POST">
                <h1>Login</h1><br>
                <span>Use Registered Username and Password</span>
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Admin!</h1>
                    <p>Enter your details to use all of site features!</p>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
<?php 
    //Check whether submit button function or not
    if(isset($_POST['submit']))
    {
        //Process for login
        //1. Get the data from login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //2. SQL to check whether the user with username and password exist or not
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

        //3. Exxecute the query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whther user exist or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and Login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not will unset it
            //Redirect to Home page /dashboard
            header('location:'.SITEURL.'admin.php');
        }
        else
        {
            //User not Available and login failed
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to Home page /dashboard
            header('location:'.SITEURL.'login.php');
        }
    }

?>