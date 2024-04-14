<?php 
    include('./config/constant.php');


    // Check whether id is set or not
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch student details based on the id
        $sql = "SELECT * FROM student WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if ($res && mysqli_num_rows($res) == 1) {
            // Student details found
            $row = mysqli_fetch_assoc($res);

            $stud_name = $row['stud_name'];
            $email = $row['email'];
            $course_fee = $row['course_fee'];
            $pending_fee = $row['pending_fee'];
            // Other details can be fetched similarly

        } else {
            // No or multiple records found, redirect to manage student page
            header('location:'.SITEURL.'fee_admin.php');
            exit; // Terminate script execution
        }
    } else {
        // No id provided, redirect to manage student page
        header('location:'.SITEURL.'fee_admin.php');
        exit; // Terminate script execution
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/added.css">
    <title>Admin Dunia Bestari | Collect Fees </title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h2>Collect - Fee</h2>
            <div class="content">
                <!-- Display student details -->
                <div class="input-box">
                    <label for="name">Student Name</label>
                    <input type="text" placeholder="Enter name" name="name" value="<?php echo $stud_name; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="courseFee">Total Fees</label>
                    <input type="text" placeholder="Student Course Fee" name="course_fee" value="<?php echo $course_fee; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="pending_fee">Pending Fees</label>
                    <input type="text" placeholder="Student Pending Fee" name="pending_fee" value="<?php echo $pending_fee; ?>" readonly>
                </div>
                <div class="input-box">
                    <label for="amount">Amount Fee</label>
                    <input type="text" placeholder="Enter Amount" name="amountFee" required>
                </div>
                <div class="input-box">
                <label for="remark">Remark</label>
                    <select type="text" placeholder="Enter Remark" name="remark" required>
                        <option value="">Select remark</option>
                        <option value="Monthly Fee">Monthly Fee</option>
                        <option value="Registration Fee">Registration Fee</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
            <div class="button-container">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="collect">Collect Fee</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
if(isset($_POST['collect'])) {
    $amountFee = $_POST['amountFee'];
    $remark = $_POST['remark'];
    $id = $_POST['id'];

    $sql = "SELECT pending_fee FROM student WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    
    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $pending_fee = $row['pending_fee'];
        $updated_pending_fee = $pending_fee - $amountFee;

        $sql2 = "UPDATE student SET pending_fee = '$updated_pending_fee' WHERE id = '$id'";
        $res2 = mysqli_query($conn, $sql2);

        // Insert transaction
        $date = date("Y-m-d");
        $sql3 = "INSERT INTO transaction (id, stud_name, fees, fees_remark, date) VALUES ('$id', '$stud_name', '$amountFee', '$remark', '$date')";
        $res3 = mysqli_query($conn, $sql3);

        if($res2 && $res3) {
            $_SESSION['update'] = "<div class='success'>Fee collected successfully.</div>";
            header('location:'.SITEURL.'fee_admin.php');
            exit;
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to collect fee.</div>";
            header('location:'.SITEURL.'fee_admin.php');
            exit;
        }
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to fetch pending fee.</div>";
        header('location:'.SITEURL.'fee_admin.php');
        exit;
    }
}
?>