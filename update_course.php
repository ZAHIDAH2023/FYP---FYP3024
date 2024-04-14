<?php include('./config/constant.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Dunia Bestari | Update Course </title>
</head>
<body>
    <?php 
        //1. Get the ID of selected course
        $id = $_GET['id'];

        //2.Create SQL query to get the details
        $sql = "SELECT * FROM course WHERE id=$id";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if($res==true)
        {
            //Check whether the data is avaiable or not
            $count = mysqli_num_rows($res);

            //Check whther have course data or not
            if($count==1)
            {
                //Get the details
                $row = mysqli_fetch_assoc($res);

                $amount = $row['amount'];
                $remark = $row['remark'];
            }
            else{
                //Redirect to course page
                header('location:'.SITEURL.'courses_admin.php');
            }
        }
    ?>
    <div class="container">
        <form action="#" method="POST">
            <h2>Update-Course</h2>
            <div class="content">
                <div class="input-box">
                    <label for="amount">Amount</label>
                    <input type="text" placeholder="Amount(RM)" name="amount" value = "<?php echo $amount; ?>"required>
                </div>
                <div class="input-box">
                    <label for="remark">Remark</label>
                    <input type="text" placeholder="Enter Remark" name="remark" value = "<?php echo $remark; ?>" required>
                </div>
            <div class="button-container">
                <input type="hidden" name ="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit">Update Course</button>
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
        $amount = $_POST['amount'];
        $remark = $_POST['remark'];

        //Create a SQL query to update admin
        $sql = "UPDATE course SET 
        amount = '$amount',
        remark = '$remark' 
        WHERE id='$id'
        ";

        //Execute the query 
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed succesfully or not
        if($res==true)
        {
            //Query excuted and admin updated
            $_SESSION['update'] = "<div class='success'>Course Update Successfully.</div>";
            //Redirect to manage admin Page
            header('location:'.SITEURL.'courses_admin.php');
        }
        else
        {
            //Failed to update Admin
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin .</div>";
            
            //Redirect to Mangae Admin Page
            header('location:'.SITEURL.'courses_admin.php');
        }
    }
    


?>