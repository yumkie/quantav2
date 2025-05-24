<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/message.css">
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
        <div class="message_container">
            <div class="left_chart_container">
                <nav class="menu_container">
                    <a href="../html/friends.php">
                        <img src="../img/Component 5.svg">
                        <p>Friends</p>
                    </a>
                    <a href="../html/message.html">
                        <img src="../img/Component 6.svg">
                        <p>Message</p>
                    </a>
                </nav>
                <nav class="massage_list">
                    <nav class="massage" onclick="ds()">
                        <a href="#"><img src="../img/ava.svg"></a>
                        <nav class="massage_content">
                            <h1>Michael Serebrynikov</h1>
                            <p>You: Hello! Where are you?</p>
                        </nav>
                    </nav>
                </nav>
            </div>
            <nav class="chat_container">
                <img src="../img/Vector.svg">
                <p>Select chat</p>
            </nav>
            <nav class="chat_container_view">
                <nav class="massage_header">
                    <img src="../img/ava.svg">
                    <nav  class="massage_text">
                        <h1>Michael Serebrynikov</h1>
                        <p>Online</p>
                    </nav>
                </nav>
                <nav class="massage_main">
                    <form action="" method="POST">
                        <input type="text" placeholder="Enter massage">
                        <input type="submit" value="">
                    </form>
                </nav>
            </nav>
        </div>
    </main>
    <script src="../js/message.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>