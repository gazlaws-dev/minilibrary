<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Library</title>
    <link rel="shortcut icon" href="img/ICON.png" />
    <meta name="description" content="Mini Library">
    <!-- Latest compiled and minified CSS for Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/main.css">
    <!--    Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
        <div>
        <nav class="navbar navbar-color">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">MiniLibrary</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                   <?php
                    session_start();
                    if($_SESSION['sid'] != session_id()){
                        echo "<li><a href='login_view.php'>Login</a></li>";
                    } else {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                         echo "<li><a href='admin_view.php'>Admin View</a></li>";
                    }
                    ?>
                    
                    
                     <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-1">
            </div>

            <?php
        include 'db_connection.php';
        $conn = OpenCon();
        //for debugging
        //var_dump($_POST);


        if(isset($_POST['sem'])){	
            $sem=$_POST['sem'];
            $course_join = "SELECT * FROM semester_course JOIN course ON semester_course.course_course_id = course.course_id WHERE semester_no=$sem ORDER BY isCore DESC;";
        } else if(isset($_POST['csearch'])){
            $search=$_POST['csearch'];
            $course_join = "SELECT * FROM course WHERE course_name like \"%$search%\" OR course_id like \"%$search%\";";
        }

        $course_res = mysqli_query($conn, $course_join);

        if ($course_res) {
            if(isset($_POST['sem'])){	
                echo " <h1> Courses for Semester " . $sem . "</h1>";
            } else if(isset($_POST['csearch'])){
                echo " <h1> Search result of all courses: " . $search . "</h1>";
            }
        } else {
            echo "Error: " . $book_join . "<br>" . mysqli_error($conn);
        }


        if($course_res){
               if(mysqli_num_rows($course_res)> 0){
                echo "<table class='table table-hover'>";
                    echo "<tr>";
                        echo "<th>Course ID</th>";
                        echo "<th>Course Name</th>";
                        echo "<th>No. of credits</th>";
                        echo "<th>Type</th>";
                        echo "<th>Prequisites</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($course_res)){
                    echo "<tr>";
                        echo "<td>" . $row['course_id'] . "</td>";
                       echo "<td>" . "<a href='book_view.php?id=" . $row['course_id']. "'>" .
                       $row['course_name'].               
                       "</a><br>"."</td>";
                        //echo "<td>" . $row['course_name'] ."</td>";
                        echo "<td>" . $row['credits'] ."</td>";
                        if( $row['isCore'] == 1 ){
                            echo "<td> Core</td>";}
                        else 
                            {echo "<td>Elective</td>";}
                        echo "<td>" . $row['prereq'] ."</td>";

                    echo "</tr>"; 

                }
                echo "</table>";
                mysqli_free_result($course_res);
            } else	{
                echo "No records matching your query were found.";
            }
        }
        CloseCon($conn);

?>
                <div class="col-sm-1">
                </div>
        </div>
    </div>

</body>

</html>
