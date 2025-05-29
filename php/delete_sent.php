 
<?php
        require("../php/connect.php");
        session_start();
        $id = $_SESSION['id'];
        foreach ($_POST as $key => $value) {
            if(isset($_POST[$key])) {
                $delete = "DELETE FROM Friend_requests WHERE Request_id='$key'";
                $result = mysqli_query($link, $delete);
                echo "
                <script>
                       window.location = '../html/friends.php';
                </script>
                ";
            }
            break;
        }
?>
