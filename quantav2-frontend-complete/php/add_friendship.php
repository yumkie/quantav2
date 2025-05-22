<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        $inv = $_SESSION['inv'];
        echo $inv;
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $delete = "DELETE FROM Friend_requests WHERE Request_id='$key'";
                $result = mysqli_query($link, $delete);
                $insert = "INSERT INTO `Friends`(`User_id`, `User_id2`) VALUES ('$inv','$id')";
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
