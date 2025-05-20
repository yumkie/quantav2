<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        $inv = $_SESSION['q'];
        echo $inv;
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                //$delete = "DELETE FROM Friends WHERE Friend_id='$key'";
                //$result = mysqli_query($link, $delete);
                $insert = "INSERT INTO `Friend_requests`(`Friend_id`, `user_inviter`, `user_invited`) VALUES ('$id_friend','$inviter',''$invited')";
                //$result = mysqli_query($link, $insert);
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