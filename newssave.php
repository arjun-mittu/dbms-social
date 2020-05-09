<?php 
        session_start();
        $conn = new mysqli('localhost','root','','insta1');
        $user_id= $_SESSION['user_id'];
        $insert_entertainment="insert into allsub (user_id,subsription_id) values('$user_id',3)";
        if(mysqli_query($conn,$insert_entertainment)){
            ?>
            <script>history.go(-1);</script>
            <?php
            //header('Location:follow.php?savedsuccess');	
        }else{
            //header('Location:follow.php?notsaved');	
        }
    
?>