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
            
            <form action="course_view.php" method="post">
                Search Courses:
                <input type="search"  name="csearch">
                <input type="submit" class="btn btn-default" value="Search">
            </form>
            <br>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
            <p>Choose your semester to view your courses:</p>

            <fieldset>
                <form class="sem_btn form-group" action="course_view.php" method="post" enctype="multipart/form-data">

                        <input type="radio" value="1" name="sem" required>   Sem1
                        <br>
                        <input type="radio" value="2" name="sem">   Sem2
                        <br>
                        <input type="radio" value="3" name="sem">   Sem3
                        <br>
                        <input type="radio" value="4" name="sem">   Sem4
                        <br>
                        <input type="radio" value="5" name="sem">   Sem5
                        <br>
                        <input type="radio" value="6" name="sem">   Sem6
                        <br>
                        <input type="radio" value="7" name="sem">   Sem7
                        <br>
                        <input type="radio" value="8" name="sem">   Sem8
                        <br><br>
                    <input class="btn btn-info" type="submit" value="View Courses">
                    <input class="btn btn-default" type="reset">
                </form>
            </fieldset>
                
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
</body>

</html>
