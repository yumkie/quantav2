<?php
        require("../php/connect.php");
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $delete = "DELETE FROM Friend_requests WHERE Request_id='$key'";
                $result = mysqli_query($link, $delete);
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
