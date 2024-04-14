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
                <span>Primary</span>
                <h2>Courses</h2>
            </div>
                <a href="add_course.php" class="btn-primary"><i class="uil uil-plus"></i>Add Courses</a>
                </div>
                <div class="tabular--wrapper">
                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];//Displayi Session Message
                            unset($_SESSION['add']); //Removing Session Message
                        }

                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];//Displayi Session Message
                            unset($_SESSION['delete']); //Removing Session Message
                        }

                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update'];//Displayi Session Message
                            unset($_SESSION['update']); //Removing Session Message
                        }
                    ?>
                    <br>
                    <h1 class="main--title">Course Offered </h1>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>SUBJECT NAME</th>
                                    <th>AMOUNT</th>
                                    <th>REMARKS</th>
                                    <th>ACTION</th>
                                </tr>
                                
                                <tbody>
                                <?php 
                                    //Query to get all Course 
                                    $sql = "SELECT * FROM course";

                                    //Execute the query
                                    $res = mysqli_query($conn, $sql);

                                    //Check whether the query is executed or not
                                    if($res==TRUE)
                                    {
                                        //Count Row to check we have data in database or not
                                        $count = mysqli_num_rows($res); //Function to get all the rows in database

                                        $sn = 1; //Create variable and assign the value of index

                                        //Check the number of rows 
                                        if($count>0)
                                        {
                                            //Have data in database
                                            while($rows= mysqli_fetch_assoc($res))
                                            {
                                                //Using while loop to get all the data from the database
                                                //while loop will run all the data we have

                                                //Get individual data
                                                $id=$rows['id'];
                                                $subject=$rows['subject'];
                                                $amount=$rows['amount'];
                                                $remark=$rows['remark'];

                                                //Display the values in the table
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sn++; ?>.</td>
                                                        <td><?php echo $subject; ?></td>
                                                        <td>RM<?php echo $amount; ?>.00</td>
                                                        <td><?php echo $remark; ?></td>
                                                        <td>
                                                            <a href="<?php echo SITEURL; ?>update_course.php?id=<?php echo $id; ?>"><i class="uil uil-edit"></i> </a>
                                                            <a href="<?php echo SITEURL; ?>delete_course.php?id=<?php echo $id; ?>"><i class="uil uil-trash-alt"></i> </a>
                                                        </td>
                                                    </tr>

                                                <?php
                                            }
                                        }
                                        else{
                                            //do not have in database
                                        }
                                    }
                                ?>
                                    
                                </tbody>
                               
                            </thead>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
    