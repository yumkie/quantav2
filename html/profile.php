<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poiret+One&display=swap" rel="stylesheet">
</head>
<?php
    session_start();
    require("../php/connect.php");
    $id = $_SESSION['id'];
    $select = "SELECT UserID, `Date_of_birth`, `Hometown`, `Languages`, `Educational_institution`, `Username`, `Lastname`, `User_status` FROM `Users` WHERE UserID = '$id'";
    $res = mysqli_query($link, $select);
    $user = mysqli_fetch_assoc($res);
?>
<body>
    <header>
        <img src="../img/logo2.png">
        <p>Quanta</p>
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
                    $count_friend = "SELECT COUNT(*) FROM Friends WHERE User_id='$id' OR User_id2='$id'";
                    $result_friend = mysqli_query($link, $count_friend);
                    $user_friend = mysqli_fetch_assoc($result_friend);
                ?>
                <nav class="info">
                    <img src="../img/Edit.svg">
                    <nav>
                        <h1>More information</h1>
                        <img src="../img/Info.svg">
                    </nav>
                    <p>Friends: <?php echo implode('', $user_friend); ?></p>
                    <p>Date of birth: <?php echo $user['Date_of_birth'] ?></p>
                    <p>Hometown: <?php echo $user['Hometown'];?></p>
                    <p>Languages: <?php echo $user['Languages'];?></p>
                    <p>Educational institution: <?php echo $user['Educational_institution'];?></p>
                    <a href="../php/logout.php"><img src="../img/log out.svg"></a>
                </nav>
            </div>
            <nav class="profile">
                <nav class='upload_file'>
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for='real_input'>Select a file</label>
                        <input name="userfile" type="file" id='real_input'/>
                        <input type="submit" name='upload_file' value="Send a file" />
                    </form>
                    <form action="" method="POST">
                        <input type='submit'name='delete_avatar' value=''>
                    </form>
                </nav>
                    <?php
                    if(isset($_POST['upload_file'])) {
                        $_SESSION['avatar'] = $_FILES['userfile']['name'];
                        $uploaddir = '../avatar_user/';
                        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
                        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
                        echo "
                        <script>
                        window.location = '../php/load_avatar.php';
                        </script>";
                    }
                    ?>
                    <?php
                        $select_avatar = "SELECT Avatar_photo FROM Users WHERE UserID='$id'";
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
                    <img src="../img/arrow slide.svg">
                    <nav class="img">
                        <?php
                            $select_photo = "SELECT * FROM User_Photos WHERE User_id='$id'";
                            $result_photo = mysqli_query($link, $select_photo);
                            while($user_photo = mysqli_fetch_assoc($result_photo)) { 
                                $photo = '../photo_user/' . $user_photo['Photo'];
                                ?>
                                <img src="<?php echo $photo; ?>">
                        <?php } ?>
                    </nav>
                    <img src="../img/arrow slide.svg">
                </nav>
                <nav class='photo'>
                    <form enctype="multipart/form-data" action="" method="POST">
                        <label for='input'>Upload a photo</label>
                        <input name="photoname" type="file" id='input'/>
                        <input type="submit" name='add_photo' value="Add a photo" />
                    </form>
                </nav>
                    <?php
                    if(isset($_POST['add_photo'])) {
                        $_SESSION['photo'] = $_FILES['photoname']['name'];
                        $uploaddir = '../photo_user/';
                        $uploadfile = $uploaddir . basename($_FILES['photoname']['name']);
                        move_uploaded_file($_FILES['photoname']['tmp_name'], $uploadfile);
                        echo "
                        <script> 
                        window.location = '../php/load_photo.php';
                        </script>";
                    }
                    ?>
            </nav>
        </div>
        <div class="edit_profile">
            <nav class="btn">
                <p>Back</p>
            </nav>
            <form action="" method="POST">
                <input type="text" name = "Username" placeholder="Username:">
                <input type="text" name = "Status" placeholder="Status:">
                <input type="text" name = "Hometown" placeholder="Hometown:">
                <input type="text" name = "Languages" placeholder="Languages:">
                <input type="text" name = "Educational_institution" placeholder="Educational institution:">
                <input type="submit" name='edit_profile' value="Save">
                <?php 
                if(isset($_POST['edit_profile'])) {
                    $Username = $_POST['Username'];
                    $Status = $_POST['Status'];
                    $Hometown = $_POST['Hometown'];
                    $Languages = $_POST['Languages'];
                    $Educational_institution = $_POST['Educational_institution'];
                    $update = "UPDATE `Users` SET `Hometown` = IF('$Hometown' = '', Hometown, '$Hometown'),`Languages` = IF('$Languages' = '', Languages, '$Languages'),`Educational_institution` = IF('$Educational_institution' = '', Educational_institution, '$Educational_institution'),`Username` = IF('$Username' = '', Username, '$Username'),`User_status` = IF('$Status' = '', User_status, '$Status') WHERE UserID = $id";
                    $result = mysqli_query($link, $update);
                }
                ?>
            </form>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/profile.js"></script>
</body>
</html>
