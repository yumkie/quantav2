<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        $invd = $_SESSION['invd'];
        $invr = $_SESSION['invr'];
        echo $inv;
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $delete = "DELETE FROM Friends WHERE Friend_id='$key'";
                $result = mysqli_query($link, $delete);
                $insert = "INSERT INTO `Friend_requests`(`user_inviter`, `user_invited`) VALUES ('$invr','$invd')";
                $result = mysqli_query($link, $insert);
                echo $insert; 
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
