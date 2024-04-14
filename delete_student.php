<link rel="stylesheet" href="./css/admin.css">
<link rel="stylesheet" href="./css/added.css">
<?php  
    //Include constant.php file here
    include('./config/constant.php');

    //1. get the ID Student to be delected
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Student
    $sql = "DELETE FROM student WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);
    
    //Check whether the query executed sucessfully or not
    if($res==true)
    {
        //Query Executed Sucessfully and Student Deleted
        //echo"Course deleted";
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class= 'success'>Student Deleted Sucessfully.</div>";
        //Redirect to manage Course Page
        header('location:'.SITEURL.'student_admin.php');
    }
    else
    {
        //Failed to delete Course
        //echo" Failed to deleted";
        $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Student.Try again later</div>";
        header('location:'.SITEURL.'student_admin.php');

    }

    //3. Redirect to Manage Student page with message


?>