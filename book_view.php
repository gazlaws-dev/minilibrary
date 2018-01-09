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

                $course=$_GET['id'];


                $book_join = "SELECT * FROM book WHERE course_course_id = '$course'";
                $name = "SELECT course_name FROM course WHERE course_id =  '$course'";
                $book_res = mysqli_query($conn, $book_join);
                $name_res = mysqli_query($conn, $name);
                $name = mysqli_fetch_array($name_res);

                if ($book_res && $name_res) {
                    echo "<h1> Reference Books for Course " . $name[0]. "</h1>";

                } else {
                    echo "Error: " . $book_join . "<br>" . mysqli_error($conn);
                }

                if($book_res){
                       if(mysqli_num_rows($book_res) > 0){
                        echo "<table class='table table-bordered'>";
                            echo "<tr>";
                                echo "<th>Book Name</th>";
                                echo "<th>Author</th>";
                                echo "<th>EBook</th>";
                                echo "<th>Library Link</th>";
                            echo "</tr>";
                        while($row = mysqli_fetch_array($book_res)){
                            echo "<tr>";
                                echo "<td>" . $row['book_title'] . "</td>";
                                echo "<td>" . $row['author'] ."</td>";
                                
                                if($row['ebook'] == NULL){
                               		 echo "<td>No PDF available</td>";
                                }
                                else{
		                            echo "<td>" . "<a href='".$row['ebook'] . "' target='_blank'>" .
		                             "Open PDF".     
		                            "</a><br>"."</td>";
                                }
                                
                                 if($row['library_book'] == NULL){
                                 //use book title
                                 $newstr = preg_replace('/[^a-zA-Z0-9\']/', '+', $row['book_title']);
								 $newstr = str_replace("'", ' ', $newstr);
                               	 $library_link = "http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=" . $newstr;
                                 } else {
                                 $library_link = $row['library_book'];
                                 }
                                 
		                         $html = file_get_contents($library_link);
								 $regex = '/<span class="ItemSummary">Library \((.+?)\)./';
								 preg_match_all($regex,$html,$match);
								// var_dump($match);
								$sum = 0;
								foreach ($match[1] as $val){
									$sum = $sum + $val;
								}
								 
		                         echo "<td>" . "<a href='".$library_link . "' target='_blank'>" .
		                             "Search availabilaty in NITC Library - $sum for loan" ;
                                 
		                           
								echo "</a><br></td>";
                                                                
                            echo "</tr>"; 
                        }
                        echo "</table>";
                        mysqli_free_result($book_res);
                    } else	{
                        echo "No records matching your query were found.";
                    }
                }


                CloseCon($conn);

                ?>
        </div>
    </div>
</body>

</html>
