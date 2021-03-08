<?php 
   
   require 'connection.php';
   error_reporting(0);
    
     
if(isset($_POST["upbtn"])){
  date_default_timezone_set("egypt");
  $time=date("s:i:h A");
 $date=date("m/d/y");
$timedata=$time.' '. $date;
   if(isset($_GET['id'])){
          
     $id =filter_var($_GET['id'],FILTER_VALIDATE_INT);

     $sql = "select * from post where id=".$id ;
     $op =  mysqli_query($con,$sql);  

     
 


     if(mysqli_num_rows($op) == 0){
         echo "error";

     }else{

        $data = mysqli_fetch_assoc($op);
         $data[title]=$_POST["title"];
         $data[content]=$_POST["content"];
         
        $titleQurey = "update post set title='$data[title]' WHERE id=".$id;
         $updateOP  =  mysqli_query($con, $titleQurey  );
        $contentQurey = "update post set content='$data[content]' WHERE id=".$id;
         $updateOP  =  mysqli_query($con, $contentQurey  );
        $timeQurey = "update post set time='$timedata' WHERE id=".$id;
        $updateOP  =  mysqli_query($con, $timeQurey );
         echo $updateOP; 
     }





   }else{

    header("Location: index.php");

   }


}


?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
    <body>
        <div class="container">
            <h2>Edit Your Post</h2>
        <form method="post" action="<?php $_SERVER["PHP_SELF"];?>">
          <div class="form-group">
                <label for="titletxt">Tilte of Post</label>
                <input type="text" name="title" class="form-control" id="titletxt"  placeholder="Enter the title " vlaue="<?php echo $title?>">
              
            </div>

            <div class="form-group">
                <label for="contenttxt">Content</label>
                <textarea class="form-control" rows="3" name="content"  id="contenttxt" placeholder="What's on your mind?"><?php echo isset($_POST["abouttxt"])?$_POST["abouttxt"]:'';?></textarea>
                
            </div>



            <button type="submit" class="btn btn-primary" name="upbtn">Update</button>
  
 
            </form>
        
        
        
        
        </div>
    </body>
</html>