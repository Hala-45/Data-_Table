<?php 
     require('connection.php');


      if(isset($_GET['id'])){
          
        $id =  $_GET['id']; 
          echo $id;
   
       $sql = "delete from post where id =".$id;
          
       
       $op =   mysqli_query($con,$sql);    
   
          if($op){
             
              header("Location: view data.php");

          }else{
              echo 'user can not deleted ';
          }
       
       

   
        }else{

          header("Location: view data.php");

      }

      




?>