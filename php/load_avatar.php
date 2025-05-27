    <?php
    require('connect.php');
    session_start();
        $id = $_SESSION['id'];
        $avatar_photo = $_SESSION['avatar'];
        $insert_avatar = "UPDATE `Users` SET `Avatar_photo`='$avatar_photo' WHERE UserID='$id'";
        $result_avatar = mysqli_query($link, $insert_avatar);
        echo "
        <script>
        window.location = '../html/profile.php';
        </script>";
    ?>