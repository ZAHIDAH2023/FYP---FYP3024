<link rel="stylesheet" href="./css/admin.css">
<link rel="stylesheet" href="./css/added.css">
<?php  
    //Include constant.php file here
    include('./config/constant.php');

    //1. get the ID Course to be delected
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Course
    $sql = "DELETE FROM course WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);
    
    //Check whether the query executed sucessfully or not
    if($res==true)
    {
        //Query Executed Sucessfully and Course Deleted
        //echo"Course deleted";
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class= 'success'>Course Deleted Sucessfully.</div>";
        //Redirect to manage Course Page
        header('location:'.SITEURL.'courses_admin.php');
    }
    else
    {
        //Failed to delete Course
        //echo" Failed to deleted";
        $_SESSION['delete'] = "<div class = 'error'>Failed to  Delete Course.Try again later</div>";
        header('location:'.SITEURL.'courses_admin.php');

    }

    //3. Redirect to Manage Course page with message


?>