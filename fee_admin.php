<?php 
    include('config/constant.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dunia Bestari</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/added.css">
    <!---ICONSCOUT CON-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
<style>
    .status-success {
        color: green;
    }
    .status-pending {
        color: red;
    }
</style>
    <div class="sidebar">
    <div class="logo"></div>
            <ul class="menu">
                <li class="active">
                    <a href="admin.php">
                        <i class="uil uil-tachometer-fast"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="courses_admin.php">
                        <i class="uil uil-book-alt"></i>
                        <span>Courses</span>
                    </a>
                </li>
                <li>
                    <a href="student_admin.php">
                        <i class="uil uil-users-alt"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li>
                    <a href="teacher_admin.php">
                        <i class="uil uil-house-user"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                <li>
                    <a href="fee_admin.php">
                        <i class="uil uil-bill"></i>
                        <span>Fees</span>
                    </a>
                </li>
                <li>
                    <a href="report.php">
                        <i class="uil uil-file-graph"></i>
                        <span>Report</span>
                    </a>
                </li>
                <li>
                    <a href="admin_user.php">
                        <i class="uil uil-user-plus"></i>
                        <span>Admin User</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="logout.php">
                        <i class="uil uil-signout"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
    </div>
    
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Student Fees </span>
                <h2>Fees</h2>
            </div>
            <div class="user--info">
                        <div class="search--box">
                        <i class="uil uil-search"></i>
                        <form action="" method="GET">
                        <input type="text" placeholder="Search" required name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                    </div>
                    <button type="submit" class="btn btn-tertier">Search</button>
                    </form>
                    <img src="./images/man.png" >
                </div>
        </div>
        <div class="tabular--wrapper">
            <!-- PHP code to display session messages -->
            <?php 
                // Display session messages if available
                if(isset($_SESSION['submit'])) {
                    echo $_SESSION['submit'];
                    unset($_SESSION['submit']);
                }
                if(isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['errmsg'])) {
                    echo $_SESSION['errmsg'];
                    unset($_SESSION['errmsg']);
                }
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                $searchQuery = "";
                if(isset($_GET['search']) && !empty($_GET['search'])) {
                    // Sanitize the input to prevent SQL injection
                    $search = mysqli_real_escape_string($conn, $_GET['search']);
                    // Construct the search query
                    $searchQuery = "WHERE stud_name LIKE '%$search%'";
                }
            ?>
            <h1 class="main--title">Fee Collection</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>STUDENT NAME</th>
                            <th>STUDENT EMAIL</th>
                            <th>TOTAL FEES</th>
                            <th>PENDING FEES</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            // Fetch students from the database
                            $sql = "SELECT * FROM student $searchQuery ORDER BY pending_fee DESC";
                            $res = mysqli_query($conn, $sql);
                            $sn = 1; // Serial number counter
                            // Loop through fetched students
                            while($row=mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $stud_name = $row['stud_name'];
                                $email = $row['email'];
                                $course_fee = $row['course_fee'];
                                $pending_fee = $row['pending_fee'];
                                // Calculate status based on pending fees
                                $status = ($pending_fee == 0) ? "Successfully" : "Pending";

                               
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $stud_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>RM<?php echo $course_fee; ?></td>
                            <td>RM<?php echo $pending_fee; ?></td>
                            <td class="<?php echo ($pending_fee == 0) ? 'status-success' : 'status-pending'; ?>">
                                 <?php echo $status; ?>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>collect_fee.php?id=<?php echo $id; ?>"><i class="uil uil-money-withdraw"></i>Collect Fee</a>
                            </td>
                        </tr>
                        <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>