<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        $invd = $_SESSION['invd'];
        $invr = $_SESSION['invr'];
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $insert = "INSERT INTO `Friend_requests` (`Friend_id`, `user_inviter`, `user_invited`)
SELECT `Friend_id`,
       CASE 
           WHEN User_id = '$id' THEN User_id2 
           ELSE User_id
       END,
       CASE 
           WHEN User_id2 = '$id' THEN User_id2
           ELSE User_id
       END
FROM `Friends` 
WHERE Friend_id = '$key'"; 
                mysqli_query($link, $insert);
                echo $insert;
                $delete = "DELETE FROM Friends WHERE Friend_id='$key'";
                mysqli_query($link, $delete);
                echo "
                <script>
                    setTimeout(function() {
                       window.location = '../html/friends.php';
                    },3000);
                </script>
                ";
            }
            break;
        } 
?>
