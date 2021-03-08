<?php 
 
       require ('connection.php');

       $sql = "select * from post";
       $op = mysqli_query($con,$sql);   // object 
      

?>




<!DOCTYPE HTML>
<html>

<head>
    <title>Your Posts</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        
        .m-b-1em {
            margin-bottom: 1em;
        }
        
        .m-l-1em {
            margin-left: 1em;
        }
        
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read Posts || <a href="post.php">add</a></h1>

        </div>

        <!-- PHP code to read records will be here -->





        <table class='table table-hover table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Post</th>
                <th>Action</th>
            </tr>



            <!-- table body will be here -->

<?php 
             while($data = mysqli_fetch_assoc($op)){

                //  echo .'<br>'.$data['name'];
              
                echo '<tr>';
            
                echo '<td>'.$data["id"].'</td>';
                echo '<td>'.$data["title"].'</td>';
                echo '<td>'.$data["content"].'</td>';
                echo "<td>";
                echo "<a href='delete data.php?id=".$data['id']."' class='btn btn-danger m-r-1em'>Delete</a>";
                echo "<a href='edit data.php?id=".$data['id']."' class='btn btn-primary m-r-1em'>Edit</a> ";
                echo "</td>";

                echo '</tr>';

              }

//


?>







            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>








