
<?php
require('connection.php');

$title;$post;
$titleErr="";
$contentErr="";
if(isset($_POST["subbtn"])){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 
                
                    
                date_default_timezone_set("egypt");
                    $time=date("s:i:h A");
                     $date=date("m/d/y");
                    $data=$time.' '. $date;
                    $title= trim(htmlspecialchars($_POST["title"]));
                    $title = filter_var( $title, FILTER_SANITIZE_STRING);
                    
                    $content= trim(htmlspecialchars($_POST["content"]));
                    $content = filter_var( $content, FILTER_SANITIZE_STRING);
                     
              
                if(!empty($title) && !empty($content)){

                $sql  = "insert into post (title,content,time) values ('$title','$content','$data')"; 
                $op =  mysqli_query($con,$sql);
                    if($op){
                    echo 'Data inserted';
    
                        }
                
                }
                else{
                    $titleErr="please write the title";
                    $contentErr="please write the post content";
        }


                
               }   } 
        


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
            <h2>Write a Post</h2>
        <form method="post" action="<?php $_SERVER["PHP_SELF"];?>">
          <div class="form-group">
                <label for="titletxt">Tilte of Post</label>
                <input type="text" name="title" class="form-control" id="titletxt"  placeholder="Enter the title " vlaue="<?php echo $title?>">
              <div style="color:orangered; font-weight: bold; padding: 5px 10px;   "><?php echo"$titleErr"?></div>
            </div>

            <div class="form-group">
                <label for="contenttxt">Content</label>
                <textarea class="form-control" rows="3" name="content"  id="contenttxt" placeholder="What's on your mind?"><?php echo isset($_POST["abouttxt"])?$_POST["abouttxt"]:'';?></textarea>
                <div style="color:orangered; font-weight: bold; padding: 5px 10px;   "><?php echo"$contentErr"?></div>
            </div>



            <button type="submit" class="btn btn-primary" name="subbtn">Submit</button>
  
 
            </form>
        
        
        
        
        </div>
    </body>
</html>