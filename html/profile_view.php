<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/profile_view.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poiret+One&display=swap" rel="stylesheet">
</head>
<?php
    session_start();
    require("../php/connect.php");
    foreach ($_POST as $key => $value) {
        if(isset($_POST[$key])) {
            $select = "SELECT UserID, `Date_of_birth`, `Hometown`, `Languages`, `Educational_institution`, `Username`, `Lastname`, `User_status` FROM `Users` WHERE UserID = '$key'";
            $res = mysqli_query($link, $select);
            $user = mysqli_fetch_assoc($res);
    }
}
?>
<body>
    <header>
        <img src="../img/logo2.png">
        <p>Quanta</p>
        <a href="../html/profile.php"><img  src="../img/Group.svg"></a>
    </header>
    <main>
        <div class="profile_container">
            <div class="left_chart_container">
                <nav class="menu_container">
                    <a href="../html/friends.php">
                        <img src="../img/Component 5.svg">
                        <p>Friends</p>
                    </a>
                    <a href="../html/message.php">
                        <img src="../img/Component 8.svg">
                        <p>Message</p>
                    </a>
                </nav>
                <?php 
                    $count_friend = "SELECT COUNT(*) FROM Friends WHERE User_id='$key' OR User_id2='$key'";
                    $result_friend = mysqli_query($link, $count_friend);
                    $user_friend = mysqli_fetch_assoc($result_friend);
                ?>
                <nav class="info">
                    <nav class='more'>
                        <h1>More information</h1>
                        <img src="../img/Info.svg">
                    </nav>
                    <p>Friends: <?php echo implode('', $user_friend); ?></p>
                    <p>Date of birth: <?php echo $user['Date_of_birth'] ?></p>
                    <p>Hometown: <?php echo $user['Hometown'];?></p>
                    <p>Languages: <?php echo $user['Languages'];?></p>
                    <p>Educational institution: <?php echo $user['Educational_institution'];?></p>
                </nav>
            </div>
            <nav class="profile">
                    <?php
                        $select_avatar = "SELECT Avatar_photo FROM Users WHERE UserID='$key'";
                        $result_avatar = mysqli_query($link, $select_avatar);
                        $user_avatar = mysqli_fetch_assoc($result_avatar);
                        if($user_avatar['Avatar_photo'] === null) {
                            $avatar = '../img/ava.svg';
                        } else {
                            $avatar = '../avatar_user/' . $user_avatar['Avatar_photo'];
                        }
                        ?>
                <nav class='profile_info_container'>
                    <img src="<?php echo $avatar; ?>" width="220" height="213">
                    <nav class="profile_info">
                        <h1><?php echo $user['Username'];?> <?php echo $user['Lastname'];?></h1>
                        <p>Online</p>
                        <p><?php echo $user['User_status'];?></p>
                    </nav>
                </nav>
                <nav class="gallary">
                <?php
                        $select_count = "SELECT COUNT(*) FROM User_Photos WHERE User_id='$id'";
                        $result_count = mysqli_query($link, $select_count);
                        $user_count = mysqli_fetch_assoc($result_count);
                        foreach ($user_count as $key => $count) {
   
                        }
                        if($count > 3) {?>
                        <img src="../img/arrow slide.svg">
                    <?php } ?>
                    <nav class="img">
                        <?php
                            $select_photo = "SELECT * FROM User_Photos WHERE User_id='$key'";
                            $result_photo = mysqli_query($link, $select_photo);
                            while($user_photo = mysqli_fetch_assoc($result_photo)) { 
                                $photo = '../photo_user/' . $user_photo['Photo'];
                                ?>
                                <img src="<?php echo $photo; ?>">
                        <?php } ?>
                    </nav>
                    <?php
                    if($count > 3) { ?>
                        <img src="../img/arrow slide.svg">
                    <?php } ?>
                </nav>
            </nav>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/profile.js"></script>
</body>
</html>