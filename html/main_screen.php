<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/main_screen.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                        <a href ="../html/friends.php">
                            <img src="../img/Component 1.svg">
                            <p>Friends</p>
                        </a>
                    </div>
                <div class="messages">
                    <a href="#">
                        <img src="../img/Component 2.svg">
                        <p>Messages</p>
                    </a>
                </div>
            </div>
            <div class="window_message">
                    <div id="window_message_chat">
                        <a return false onclick="ds_b()" id="reverse">
                            <div class="ava"><img src="../img/Group.svg"></div>
                            <p>Alex Holland</p>
                        </a>
                    </div>
            </div>
        </div>
        <div class="container_chat">
            <div class="chat" id="chat">
                <div class="profile_chat">
                    <img src="../img/Group.svg">
                    <div class="username_online">
                        <p>Alex Holland</p>
                        <p>online</p>
                    </div>
                </div>
                <div class="info_message">
                    <form action="../php/log_in.php" method="POST">
                        <input type="text" name="dialog" placeholder="Enter message">
                        <button>
                            <img src="../img/enter.png">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script src="../js/display_block.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </main>
</body>
</html>