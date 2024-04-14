<?php include('config/constant.php') ?>
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
                <span>Registered</span>
                <h2>Admin User</h2>
            </div>
                <a href="add_admin.php" class="btn-primary"><i class="uil uil-plus"></i>Add Admin</a>
                </div>
                <div class="tabular--wrapper">
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//Displaying Session Message
                        unset($_SESSION['add']);//Removing Session Message 
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset ($_SESSION['delete']);
                    }
 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset ($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset ($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset ($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset ($_SESSION['change-pwd']);
                    }

                
                ?>
                    <h1 class="main--title">Student Registered </h1>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                                <tbody>
                                <?php 
                                        //Query to get all admin 
                                        $sql = "SELECT * FROM admin";
                                        //Execute the Query
                                        $res = mysqli_query($conn, $sql);

                                        //Check whether the query is executed or not
                                        if($res==TRUE)
                                        {
                                            //Count Rows to check whether we have data in database or not
                                            $count = mysqli_num_rows($res); //Function to get all the rows in database
                                            
                                            $sn=1; //create a variable and assign the value

                                            //Check the num of rows
                                            if($count>0)
                                            {
                                                //we have data in database
                                                while($rows=mysqli_fetch_assoc($res))
                                                {
                                                    //Using while loop to get all the data from database.
                                                    //and while loop will run as long as we have data in database

                                                    //Get individual data
                                                    $id = $rows['id'];
                                                    $full_name = $rows['full_name'];
                                                    $username= $rows['username'];

                                                    //Display the values in our table
                                                    ?>

                                                    <tr>
                                                            <td><?php echo $sn++ ?></td>
                                                            <td><?php echo $full_name; ?></td>
                                                            <td><?php echo $username; ?></td>
                                                            <td>
                                                                <a href="<?php echo SITEURL; ?>admin_update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                                <a href="<?php echo SITEURL; ?>admin_update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                                <a href="<?php echo SITEURL; ?>admin_delete-admin.php?id=<?php echo $id; ?>" class="btn-tertier">Delete Admin</a>
                                                            </td>
                                                        </tr>

                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                //We do not have data in database
                                            }
                                        }
                                    ?>
                                
                                </tbody>
                               
                            </thead>
                        </table>
                    </div>
                </div>
        </div>
        
</body>