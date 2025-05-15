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
    $select = "SELECT * FROM `Users` WHERE UserID = '$id'";
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
                    <a href="../html/friends.html">
                        <img src="../img/Component 5.svg">
                        <p>Friends</p>
                    </a>
                    <a href="../html/message.html">
                        <img src="../img/Component 8.svg">
                        <p>Message</p>
                    </a>
                </nav>
                <nav class="info">
                    <img src="../img/Edit.svg">
                    <nav>
                        <h1>More information</h1>
                        <img src="../img/Info.svg">
                    </nav>
                    <p>Friends: </p>
                    <p>Date of birth:</p>
                    <p>Hometown: <?php echo $user['Hometown'];?></p>
                    <p>Languages: <?php echo $user['Languages'];?></p>
                    <p>Educational institution: <?php echo $user['Educational institution'];?></p>
                    <a href="../php/logout.php"><img src="../img/log out.svg"></a>
                </nav>
            </div>
            <nav class="profile">
                <nav>
                    <img src="../img/ava.svg" width="220" height="213">
                    <nav class="profile_info">
                        <h1><?php echo $user['Username'];?> <?php echo $user['Lastname'];?></h1>
                        <p>Online</p>
                        <p><?php echo $user['User_status'];?></p>
                    </nav>
                </nav>
                <nav class="gallary">
                    <img src="../img/arrow slide.svg" onclick="left()">
                    <nav class="img">
                        <img src="../img/gallary 1.jpg">
                        <img src="../img/gallary 2.jpg">
                        <img src="../img/gallary 3.jpg">
                        <img src="../img/gallary 4.jpg">
                        <img src="../img/image1.png">
                        <img src="../img/image2.png">
                    </nav>
                    <img src="../img/arrow slide.svg">
                </nav>
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
                <input type="submit" value="Save">
                <?php 
                if($_POST) {
                    $Username = $_POST['Username'];
                    $Status = $_POST['Status'];
                    $Hometown = $_POST['Hometown'];
                    $Languages = $_POST['Languages'];
                    $Educational_institution = $_POST['Educational_institution'];
                    $update = "UPDATE `Users` SET `Hometown` ='$Hometown',`Languages`='$Languages',`Educational institution`='$Educational_institution',`Username`='$Username',`User_status`='$Status' WHERE UserID = $id";
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