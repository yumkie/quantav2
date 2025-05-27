<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        $id2 = $_SESSION['id2'];
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $insert = "INSERT INTO `Friend_requests`(`user_inviter`, `user_invited`) VALUES ('$id','$id2')";
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