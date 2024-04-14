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
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }

        
        ?>

    <div class="container">
        <form action="#" method="POST">
            <h2>Update-Student Information</h2>
            <div class="content">
                
                <div class="input-box">
                    <label for="current_password">Current Password</label>
                    <input type="password" placeholder="Current Password" name="current_password" required>
                </div>
                <div class="input-box">
                    <label for="new_password">New Password</label>
                    <input type="password" placeholder="New Password" name="new_password" required>
                </div>
                <div class="input-box">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                </div>

                
            <div class="button-container">
                <input type="hidden" name ="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit">Update Admin</button>
            </div>
        </form>
    </div>
    </body>
</html>

<?php

    //Check whether the submit buttom is clicked or not
    if(isset($_POST['submit']))
    {
        //echo"Clicked";

        //1. Get the data from form 
        $id = $_POST['id'];
        $current_password = ($_POST['current_password']);
        $new_password = ($_POST['new_password']);
        $confirm_password = ($_POST['confirm_password']);

        //2. Check whether the user with current ID and current Password or not
        $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

        //Execute the query 
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            //Check whether data is avalable or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //User exist and Password can be changed 
                //echo "User Found";

                //Check whether the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    // Update the password
                    //echo "password match";
                    $sql2 = "UPDATE admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";
                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        //Dusplay success message
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                        header('location:'.SITEURL.'admin_user.php');
                    }
                    else
                    {
                        //displayy Error message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed change Password.</div>";
                        header('location:'.SITEURL.'admin_user.php');
                    }
                }
                else
                {
                    //redirect to manage admin with error message
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match.</div>";
                    header('location:'.SITEURL.'admin_user.php');
                }
            }
            else
            {
                //User does not exist set message and redirect 
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                header('location:'.SITEURL.'admin_user.php');
            }
        }
        //3. Check whether the new password and confirm passsword match or not

        //4. Change password if all above is true
    }

?>
