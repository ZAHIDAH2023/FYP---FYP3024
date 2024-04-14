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
                <li>
                    <a href="message.php">
                        <i class="uil uil-message"></i>
                        <span>Message</span>
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
        <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

            ?>
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboard</h2>
            </div>
                    <div class="user--info">
                        <div class="search--box">
                        <i class="uil uil-search"></i>
                        <input type="text" placeholder="Search">
                    </div>
                    <img src="./images/man.png" >
                </div>
        </div>
        <div class="card--container">
            <h1 class="main--title">Our Dashboard <i class="uil uil-comparison"></i></h1>
            <div class="card--wrapper">

                <div class="payment--card light-red">
                    <div class="card--header">
                        <div class="amount">
                        <?php  
                        //SQL query
                        $sql3 = "SELECT * FROM student";
                        //Execute query      
                        $res3 = mysqli_query($conn, $sql3);
                        //Count rows
                        $count3 = mysqli_num_rows($res3);              
                    
                    ?>
                            <span class="title">
                                Total Student</span>
                                <span class="amount--value">
                                <?php echo $count3; ?>
                                </span>
                        </div>
                        <i class="uil uil-user-plus icon dark-red"></i>
                    </div>
                    <span class="card-detail">Total Student Register</span>
                </div>

                <div class="payment--card light-purple">
                    <div class="card--header">
                        <div class="amount">
                        <?php  
                        //SQL query
                        $sql = "SELECT * FROM admin";
                        //Execute query      
                        $res = mysqli_query($conn, $sql);
                        //Count rows
                        $count = mysqli_num_rows($res);              
                    
                    ?>
                            <span class="title">
                                Admin Access</span>
                                
                                <span class="amount--value">
                                <?php echo $count; ?>
                                </span>
                        </div>
                        <i class="uil uil-dollar-sign-alt icon dark-purple"></i>
                    </div>
                    <span class="card-detail">Total Fees Collected</span>
                </div>
                
                <div class="payment--card light-green">
                    <div class="card--header">
                        <div class="amount">
                        <?php  
                            //SQL query
                            $sql4 = "SELECT SUM(pending_fee) AS total_pending_fee FROM student";
                            //Execute query      
                            $res4 = mysqli_query($conn, $sql4);
                            //Fetch the result
                            $row4 = mysqli_fetch_assoc($res4);
                            //Get the sum of pending fees
                            $count4 = $row4['total_pending_fee'];              
                        ?>
                            <span class="title">
                                Pending Fees</span>
                                <span class="amount--value">
                                RM<?php echo $count4; ?>
                                </span>
                        </div>
                        <i class="uil uil-spinner-alt icon dark-green"></i>
                    </div>
                    <span class="card-detail">Pending Fees Not Collected</span>
                </div>

                <div class="payment--card light-blue">
                    <div class="card--header">
                        <div class="amount">
                        <?php  
                        //SQL query
                        $sql2 = "SELECT * FROM course";
                        //Execute query      
                        $res = mysqli_query($conn, $sql2);
                        //Count rows
                        $count2 = mysqli_num_rows($res);              
                    ?>
                            <span class="title">
                                Courses</span>
                                <span class="amount--value">
                                    <?php echo $count2; ?>
                                </span>
                        </div>
                        <i class="uil uil-books icon dark-blue"></i>
                    </div>
                    <span class="card-detail">Courses Offered</span>
                </div>

            </div>
        </div>

        <div class="tabular--wrapper">
            <h1 class="main--title">Latest Activity  <i class="uil uil-clock"></i></h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NO.</th>
                            <th>STUDENT NAME</th>
                            <th>PAID FEE</th>
                            <th>REMARK</th>
                            <th>DATE</th>

                        </tr>
                        
                        <tbody>
                        <?php 
                                    //Query to get all Student 
                                    $sql = "SELECT * FROM transaction ORDER BY id DESC";

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
                                                $stud_name=$rows['stud_name'];
                                                $fees=$rows['fees'];
                                                $fees_remark=$rows['fees_remark'];
                                                $date=$rows['date'];

                                                //Display the values in the table
                                                ?>
                                                    <tr>
                                                        <td><?php echo $sn++; ?>.</td>
                                                        <td><?php echo $stud_name; ?></td>
                                                        <td>RM<?php echo $fees; ?></td>
                                                        <td><?php echo $fees_remark; ?></td>
                                                        <td><?php echo $date; ?></td>

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
</body>
</html>