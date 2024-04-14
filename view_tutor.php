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
                <label for="tutor_name">Tutor Name</label>
                <input type="text" placeholder="Tutor Name" name="tutor_name" value = "<?php echo $tutor_name; ?>" readonly>
            </div>
            <div class="input-box">
                <label for="ic">Identification Number</label>
                <input type="text" placeholder="ic" name="ic" value = "<?php echo $ic; ?>" readonly>
            </div>
            <div class="input-box">
                    <label for="email">Email</label>
                    <input type="text" placeholder="Tutor Email" name="email" value = "<?php echo $email; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="phone_num">Phone Number</label>
                    <input type="text" placeholder="Tutor phone Number" name="phone_num" value = "<?php echo $phone_num; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="achievement">Achievement</label>
                    <input type="text" placeholder="Tutor Achievement" name="achievement" value = "<?php echo $achievement; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="address">Address</label>
                    <input type="text" placeholder="Tutor Address" name="address" value = "<?php echo $address; ?>" readonly>
                </div>
                
            <div class="button-container">
                <input type="hidden" name ="id" value="<?php echo $id; ?>">
                <button type="submit" name="submit">Back</button>
            </div>
        </form>
    </div>
    </body>
</html>

<?php 
    // Check whether the submit button click or not
    if(isset($_POST['submit']))
    {
        header('location:'.SITEURL.'student_admin.php');
    }
    
?>