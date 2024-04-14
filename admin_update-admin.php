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
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Auery to get the Details
            $sql="SELECT * FROM admin WHERE id=$id";

            //Execute the query
            $res=mysqli_query($conn, $sql);

            //Chech whether the query executed or not
            if($res==true)
            {
                // Check whether the data is avaiable or not 
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    //Get the details 
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row ['username'];
                }
                else{
                    //Redirect to manage admin Page
                    header('location'.SITEURL.'admin_user.php');
                }
            }
        ?>

    <div class="container">
        <form action="#" method="POST">
            <h2>Update-Student Information</h2>
            <div class="content">
                
                <div class="input-box">
                    <label for="full_name">Full Name</label>
                    <input type="text" placeholder="full_name" name="full_name" value = "<?php echo $full_name; ?> " required>
                </div>
                <div class="input-box">
                    <label for="username">Username</label>
                    <input type="text" placeholder="username" name="username" value = "<?php echo $username; ?>" required>
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
    // Check whether the submit button click or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the values from form to update 
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //Create a SQL query to update admin
        $sql = "UPDATE admin SET 
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

        //Execute the query 
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed succesfully or not
        if($res==true)
        {
            //Query excuted and admin updated
            $_SESSION['update'] = "<div class='success'>Admin Update Successfully.</div>";
            //Redirect to manage admin Page
            header('location:'.SITEURL.'admin_user.php');
        }
        else
        {
            //Failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin .</div>";
            
            //Redirect to Mangae Admin Page
            header('location:'.SITEURL.'admin_user.php');
        }
    }
    


?>
