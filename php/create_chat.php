<?php
    session_start();
    require("../php/connect.php");
    $id = $_SESSION['id'];
    foreach ($_POST as $key => $value) {
        if(isset($_POST[$key])) {
            $select = "INSERT INTO `Chats`(`UserID`, `UserID2`) VALUES ('$id','$key')";
            $res = mysqli_query($link, $select);
            echo"<script>
                window.location = '../html/message.php';
                </script>";
    }
}
?>