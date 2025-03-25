<?php 
    session_start(); 
    $id = $_SESSION['id'];
    require('../php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/friends.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="C:/OSPanel/home/php/public/js/display_block.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <img src="../img/logo.svg">
            <div class="text_logo">
                <p>Q</p>
                <p>u</p>
                <p>a</p>
                <p>n</p>
                <p>t</p>
                <p>a</p>
            </div>
        </div>
        <a href="../html/profile.php"><img src="../img/Group.svg"></a>
    </header>
    <main>
        <div class="container_messages">
            <div class="menu">
                    <div class="friends">
                        <a href ="..//html/friends.php">
                            <img src="../img/Component 1.svg">
                            <p>Friends</p>
                        </a>
                    </div>
                <div class="messages">
                    <a href="../html/main_screen.php">
                        <img src="../img/Component 2.svg">
                        <p>Messages</p>
                    </a>
                </div>
            </div>
            <div class="list_choice">
                <div class="friends_choice">
                    <button onclick="ds_1()">
                        <img src="../img/Vector (1).png">
                        <p>Friends</p>
                    </button>
                </div>
                <div class="requests_choice">
                    <button onclick="ds_2()">
                        <img src="../img/Vector (2).png">
                        <p>Send requests</p>
                    </button>
                </div>
                <div class="friendship_choice">
                    <button onclick="ds_3()">
                        <img src="../img/Vector (3).png">
                        <p>Friendship requests</p>
                    </button>
                </div>
                <div class="find_friend">
                    <button onclick="ds_4()">
                        <img src="../img/FindReplaceLine.svg">
                        <p>Find a friend</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="list">
        <?php
            require('../php/connect_db_class.php');
            require('../php/script_friend.php');
        ?>
            <?php 
                require('../php/script_invite.php');
                
            ?>

            <?php 
            $query1 = "SELECT * FROM friends_invite WHERE id2_invited='$id'";
            $res1 = mysqli_query($link, $query1);
            while($user1 = mysqli_fetch_assoc($res1)) {
                if($user1['status_invite'] == 0 ) {
                    $inviter1 = $user1['id_inviter'];
                    $query2 = "SELECT username FROM log_in WHERE id='$inviter1'";
                    $res2 = mysqli_query($link, $query2);
                    $user2 = mysqli_fetch_assoc($res2);
                ?>
            <div class="friendship_list">
                <div class="btn_1">
                    <button>
                        <img src="../img/Group.svg">
                    </button>
                </div>
                <span><?php echo($user2['username']); ?></span>
                <div class="btn_2">
                    <form action='' method='POST'>
                        <input type='submit' src='../img/Component 3.png' name='delfsm' value=''>
                    </form>
                </div>
                <div class="btn_3">
                    <form action='' method='POST'>
                        <input type='submit' name='delfsp' value=''>
                    </form>
                </div>
            </div>
            <?php
                }
            }
                ?>
            
           

            <div class='find_list'>
                <form action='' method='POST'>
                    <input type='text' name='find'>
                    <button>
                        <img src='../img/FindReplaceLine.svg'>
                    </button>
                </form>
                <?php 
                if(!empty($_POST['find'])) {
                    $username = $_POST['find'];
                    $query = "SELECT * FROM log_in WHERE username='$username'";
                    $res = mysqli_query($link, $query);
                    while($user = mysqli_fetch_assoc($res)) {
                        if(is_array($user) && $user['id'] !== $id) {
                            ?> <div class='find_friend_list'> 
                                <div class="btn_1">
                                    <button>
                                        <img src="../img/Group.svg">
                                    </button>
                                </div>
                                <span>
                                    <?php echo($user['username']); ?>
                                </span>
                                <div class="btn_2" >
                                    <button>
                                            <img src="../img/add.svg">
                                    </button>
                                </div>
                            </div>
                            <?php

                        }
                    }
                }
                ?>
            <div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <?php
        echo '<script src="../php/js/display_block.js"></script>';
        ?>
    </main>
</body>
</html>