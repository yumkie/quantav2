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
                    <a href="../html/message.html">
                        <img src="../img/Component 8.svg">
                        <p>Message</p>
                    </a>
                </nav>
                <nav class="menu_list">
                    <nav onclick="friend()">
                        <img src="../img/friends 1.svg">
                        <p>Friends 1</p>
                    </nav>
                    <nav onclick="sent()">
                        <img src="../img/friends 2.svg">
                        <p>Sent requests 1</p>
                    </nav>
                    <nav onclick="friendship()">
                        <img src="../img/friends 3.svg">
                        <p>Friendship requests 1</p>
                    </nav>
                    <nav onclick="find()">
                        <img src="../img/friends 4.svg">
                        <p>Find a friend</p>
                    </nav>
                </nav>
            </div>
            <div class="result_container">
                    <?php
                    require("../php/connect.php");
                    session_start();
                    $id = $_SESSION['id'];
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
                        $select2 = "SELECT * FROM Users WHERE UserID = '$friend'";
                        $result2 = mysqli_query($link, $select2);
                        $user2 = mysqli_fetch_assoc($result2);
                        $_SESSION['invd'] = $invited;
                        $_SESSION['invr'] = $inviter;
                        $invd = $_SESSION['invd'];
                        $invr = $_SESSION['invr'];
                        ?>
                        <nav class="friends">
                            <a><img src="../img/ava.svg" width="146" height="141"></a>
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
                        ?>
                <nav class="sent">
                    <a><img src="../img/ava.svg" width="146" height="141"></a>
                    <nav>
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
                        $_SESSION['inv'] = $inviter;
                        $inv = $_SESSION['inv'];
                        $select6 = "SELECT * FROM Users WHERE UserID = '$inviter2'";
                        $result6 = mysqli_query($link, $select6);
                        $user6 = mysqli_fetch_assoc($result6);
                ?>
                <nav class="friendship">
                    <a><img src="../img/ava.svg" width="146" height="141"></a>
                    <nav>
                        <p><?php echo $user6['Username'];?> <?php echo $user6['Lastname']; ?></p>
                        <p>Online</p>
                    </nav>
                    <form action='../php/delete_friendship.php' method='POST'>
                        <input type='submit' name='<?php echo $user6['Request_id']; ?>' value=''>
                    </form>
                    <form action='../php/add_friendship.php' method='POST'>
                        <input type='submit' name='<?php echo $user6['Request_id']; ?>' value=''>
                    </form>
                </nav>
                <?php } ?>
                <nav class="find">
                    <form action="" method="POST">
                        <input type="text" name="search">
                        <input type="submit" value="">
                    </form>
                </nav>
            </div>
        </div>
    </main>
    <script src="../js/friends.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
