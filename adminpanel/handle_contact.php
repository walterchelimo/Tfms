<?php
 if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $subject=$_POST['subject'];
     $message=$_POST['message'];
     
     $id='';
     $timestamp='';
     
     $sql="INSERT INTO messages(id,name,email,subject,message,timestamp) VALUES('$id','$name','$email','$subject','$message','$timestamp')";
     $results=mysqli_num_rows($conn,$sql);
     if($results){
         echo "Message Sent Successfully";
     }else{
         echo "Message not sent";
     }
 }
?>
