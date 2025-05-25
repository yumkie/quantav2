    <?php
    require('connect.php');
    session_start();
        $id = $_SESSION['id'];
        $photo = $_SESSION['photo'];
        $insert_photo = "INSERT INTO `User_Photos`(`User_id`, `Photo`) VALUES ('$id','$photo')";
        $result_photo = mysqli_query($link, $insert_photo);
        echo "
        <script>
        window.location = '../html/profile.php';
        </script>";
    ?>