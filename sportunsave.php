<?php 
        session_start();
        $conn = new mysqli('localhost','root','','insta1');
        $user_id= $_SESSION['user_id'];
        $delete_entertainment="delete from allsub where user_id='$user_id' and subsription_id=2 ";
        if(mysqli_query($conn,$delete_entertainment)){
            ?>
            <script>history.go(-1);</script>
            <?php
            //header('Location:entertainmentsave.php?savedsuccess');	
        }else{
            //header('Location:entertainmentunsave.php?notsaved');	
        }
?>
