<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/friends.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Poiret+One&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="../img/logo2.png">
        <p>Quanta</p>
        <a href="../html/profile.php"><img  src="../img/Group.svg"></a>
    </header>
    <main>
        <div class="friend_container">
            <div class="left_chart_container">
                <nav class="menu_container">
                    <a href="#">
                        <img src="../img/Component 7.svg">
                        <p>Friends</p>
                    </a>
                    <a href="../html/message.php">
                        <img src="../img/Component 8.svg">
                        <p>Message</p>
                    </a>
                </nav>
                <?php
                    require("../php/connect.php");
                    session_start();
                    $id = $_SESSION['id'];
                    $count_friend = "SELECT COUNT(*) FROM Friends WHERE User_id='$id' OR User_id2='$id'";
                    $result_friend = mysqli_query($link, $count_friend);
                    $user_friend = mysqli_fetch_assoc($result_friend);
                ?>
                <nav class="menu_list">
                    <nav onclick="friend()">
                        <img src="../img/friends 1.svg">
                        <p>Friends <?php echo implode('', $user_friend); ?></p>
                    </nav>
                    <?php
                        $id = $_SESSION['id'];
                        $count_sent = "SELECT COUNT(*) FROM Friend_requests WHERE user_inviter='$id'";
                        $result_sent = mysqli_query($link, $count_sent);
                        $user_sent = mysqli_fetch_assoc($result_sent);
                    ?>
                    <nav onclick="sent()">
                        <img src="../img/friends 2.svg">
                        <p>Sent requests <?php echo implode('',  $user_sent); ?></p>
                    </nav>
                    <?php
                        $count_friendship = "SELECT COUNT(*) FROM Friend_requests WHERE user_invited = '$id'";
                        $result_friendship = mysqli_query($link, $count_friendship);
                        $user_friendship = mysqli_fetch_assoc($result_friendship);
                    ?>
                    <nav onclick="friendship()">
                        <img src="../img/friends 3.svg">
                        <p>Friendship requests <?php echo implode('',   $user_friendship); ?></p>
                    </nav>
                    <nav onclick="find()">
                        <img src="../img/friends 4.svg">
                        <p>Find a friend</p>
                    </nav>
                </nav>
            </div>
            <div class="result_container">
                    <?php
                    $select = "SELECT * FROM Friends WHERE User_id='$id' OR User_id2='$id'";
                    $result = mysqli_query($link, $select);
                    while($user = mysqli_fetch_assoc($result)) {
                        $id_friend = $user['Friend_id'];
                        $invited = $user['User_id2'];
                        $inviter = $user['User_id'];
                        if ($invited == $id) {
                            $friend = $inviter;
                        } else {
                            $friend = $invited;
                        }
                        $select_avatar = "SELECT Avatar_photo FROM Users WHERE UserID='$friend'";
                        $result_avatar = mysqli_query($link, $select_avatar);
                        $user_avatar = mysqli_fetch_assoc($result_avatar);
                        if($user_avatar['Avatar_photo'] === null) {
                            $avatar = '../img/ava.svg';
                        } else {
                            $avatar = '../avatar_user/' . $user_avatar['Avatar_photo'];
                        }
                        $select2 = "SELECT * FROM Users WHERE UserID = '$friend'";
                        $result2 = mysqli_query($link, $select2);
                        $user2 = mysqli_fetch_assoc($result2);
                        $_SESSION['invd'] = $invited;
                        $_SESSION['invr'] = $inviter;
                        $invd = $_SESSION['invd'];
                        $invr = $_SESSION['invr'];
                        $_SESSION['friend'] = $friend;
                        ?>
                        <nav class="friends">
                            <form action='profile_view.php' method="POST">
                                <button name='<?php echo $friend; ?>' type="submit"><img src="<?php echo $avatar; ?>" width="146" height="141"></button>
                            </form>
                            <nav>
                                <p><?php echo $user2['Username'];?> <?php echo $user2['Lastname']; ?></p>
                                <p>Online</p>
                            </nav>
                            <form action='../php/delete_friend.php' method='POST'>
                                <input type='submit' name='<?php echo $id_friend; ?>' value=''>
                            </form>
                        </nav>
                <?php } ?>
             <?php
                    $select3 = "SELECT * FROM Friend_requests WHERE user_inviter = '$id'";
                    $result3 = mysqli_query($link, $select3);
                    while($user3 = mysqli_fetch_array($result3)) {
                        $invited2 = $user3['user_invited'];
                        $select4 = "SELECT * FROM Users WHERE UserID = '$invited2'";
                        $result4 = mysqli_query($link, $select4);
                        $user4 = mysqli_fetch_assoc($result4);
                        $select_avatar2 = "SELECT Avatar_photo FROM Users WHERE UserID='$invited2'";
                        $result_avatar2 = mysqli_query($link, $select_avatar2);
                        $user_avatar2 = mysqli_fetch_assoc($result_avatar2);
                        if($user_avatar2['Avatar_photo'] === null) {
                            $avatar2 = '../img/ava.svg';
                        } else {
                            $avatar2 = '../avatar_user/' . $user_avatar2['Avatar_photo'];
                        }
                        ?>
                <nav class="sent">
                    <form action='profile_view.php' method="POST">
                        <button name='<?php echo $invited2; ?>' type='submit'><img src="<?php echo $avatar2; ?>" width="146" height="141"></button>
                    </form>
                    <nav class='info'>
                        <p><?php echo $user4['Username'];?> <?php echo $user4['Lastname']; ?></p>
                        <p>Online</p>
                    </nav>
                    <form action='../php/delete_sent.php' method='POST'>
                        <input type='submit' name='<?php echo $user3['Request_id']; ?>' value=''>
                    </form>
                </nav>
                <?php } ?>
                <?php
                    $select5 = "SELECT * FROM Friend_requests WHERE user_invited = '$id'";
                    $result5 = mysqli_query($link, $select5);
                    while($user5 = mysqli_fetch_array($result5)) {
                        $inviter2 = $user5['user_inviter'];
                        $_SESSION['inv'] = $inviter2;
                        $inv = $_SESSION['inv'];
                        $select6 = "SELECT * FROM Users WHERE UserID = '$inviter2'";
                        $result6 = mysqli_query($link, $select6);
                        $user6 = mysqli_fetch_assoc($result6);
                        $select_avatar3 = "SELECT Avatar_photo FROM Users WHERE UserID='$inviter2'";
                        $result_avatar3 = mysqli_query($link, $select_avatar3);
                        $user_avatar3 = mysqli_fetch_assoc($result_avatar3);
                        if($user_avatar3['Avatar_photo'] === null) {
                            $avatar3 = '../img/ava.svg';
                        } else {
                            $avatar3 = '../avatar_user/' . $user_avatar3['Avatar_photo'];
                        }
                ?>
                <nav class="friendship">
                    <form action="profile_view.php" method="POST">
                        <button type='submit' name='<?php echo $inviter2; ?>'><img src="<?php echo $avatar3; ?>" width="146" height="141"></button>
                    </form>
                    <nav>
                        <p><?php echo $user6['Username'];?> <?php echo $user6['Lastname']; ?></p>
                        <p>Online</p>
                    </nav>
                    <form action='../php/delete_friendship.php' method='POST'>
                        <input type='submit' name='<?php echo $user5['Request_id']; ?>' value=''>
                    </form>
                    <form action='../php/add_friendship.php' method='POST'>
                        <input type='submit' name='<?php echo $user5['Request_id']; ?>' value=''>
                    </form>
                </nav>
                <?php } ?>
                <nav class="find">
                    <form action="" method="POST">
                        <input type="text" name="search">
                        <input type="submit" name='find_sub' value="">
                    </form>
                    <?php
                        if(isset($_POST['find_sub'])) {
                            $search = explode(' ', $_POST['search']);
                            if(isset($search[1])) {
                            $select7 = "SELECT * FROM Users WHERE Username='$search[0]' AND Lastname='$search[1]'";
                            $result7 = mysqli_query($link, $select7);
                            while($user7 = mysqli_fetch_assoc($result7)) { 
                                $find_avatar = $user7['UserID'];
                                $select_avatar4 = "SELECT Avatar_photo FROM Users WHERE UserID='$find_avatar'";
                                $result_avatar4 = mysqli_query($link, $select_avatar4);
                                $user_avatar4 = mysqli_fetch_assoc($result_avatar4);
                                if($user_avatar4['Avatar_photo'] === null) {
                                    $avatar4 = '../img/ava.svg';
                                } else {
                                    $avatar4 = '../avatar_user/' . $user_avatar4['Avatar_photo'];
                                }                                
                                ?>
                                <nav class="find_friend">
                                    <form action="profile_view.php" method="POST">
                                        <button type="submit" name="<?php echo $find_avatar; ?>"><img src="<?php echo $avatar4; ?>" width="146" height="141"></button>
                                    </form>
                                    <nav>
                                        <p><?php echo $user7['Username'];?> <?php echo $user7['Lastname']; ?></p>
                                        <p>Online</p>
                                    </nav>
                                    <?php
                                        $id2 = $user7['UserID'];
                                        $select8 = "SELECT * FROM Friends WHERE User_id='$id' AND User_id2='$id2' OR User_id='$id2' AND User_id2='$id'";
                                        $result8 = mysqli_query($link, $select8);
                                        $user8 = mysqli_fetch_assoc($result8);
                                        if(!empty($user8)) {?>
                                            <form action='../php/add_friendship.php' method='POST'>
                                                <input type='submit' name='<?php echo $id2;?>' value='' style="background-image: url('../img/delete.svg')">
                                            </form>
                                    <?php }
                                        $select9 = "SELECT * FROM Friend_requests WHERE user_invited='$id' AND user_inviter='$id2'";
                                        $result9 = mysqli_query($link, $select9);
                                        $user9 = mysqli_fetch_assoc($result9);
                                        if(!empty($user9)) {?>
                                            <form action='../php/add_friendship.php' method='POST'>
                                                <input type='submit' name='<?php echo $id2;?>' value='' style="background-image: url('../img/add.svg')">
                                            </form>
                                    <?php }
                                        $select10 = "SELECT * FROM Friend_requests WHERE user_invited='$id2' AND user_inviter='$id'";
                                        $result10 = mysqli_query($link, $select10);
                                        $user10 = mysqli_fetch_assoc($result10);
                                        if(!empty($user10)) {?>
                                            <form action='../php/add_friendship.php' method='POST'>
                                                <input type='submit' name='<?php echo $id2;?>' value='' style="background-image: url('../img/delete.svg')">
                                            </form>
                                    <?php }
                                        if(empty($user10) && empty($user9) && empty($user8)) { 
                                            $_SESSION['id2'] = $id2?>
                                            <form action='../php/add_find.php' method='POST'>
                                                <input type='submit' name='<?php echo $id2;?>' value='' style="background-image: url('../img/add.svg')">
                                            </form>
                                        <?php } ?>
                                </nav>
                          <?php }}else {?>
                                    <p>This user not found<p>
                         <?php }}?>
                </nav>
            </div>
        </div>
    </main>
    <script src="../js/friends.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
