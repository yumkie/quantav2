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
                <?php
                session_start();
                require("../php/connect.php");
                $id = $_SESSION['id'];
                ?>
                <nav class="massage_list">
                <?php
                $select = "SELECT * FROM Chats WHERE UserID='$id' OR UserID2='$id'";
                $result = mysqli_query($link, $select);
                while($user = mysqli_fetch_assoc($result)) { 
                    $chat1 = $user['ChatID'];
                    if($user['UserID'] == $id) {
                        $id2 = $user['UserID2'];
                    }else {
                        $id2 = $user['UserID'];
                    }
                    $select_chat = "SELECT * FROM Users WHERE UserID='$id2'";
                    $result_chat = mysqli_query($link, $select_chat);
                    $user_chat = mysqli_fetch_assoc($result_chat); 
                    if($user_chat['Avatar_photo'] === null) {
                        $avatar = '../img/ava.svg';
                    } else {
                        $avatar = '../avatar_user/' . $user_chat['Avatar_photo'];
                    } 
                    $last = "SELECT `Message` FROM `messages` Where `Sender`='$id' AND `Recipient`='$id2' OR `Sender`='$id2' AND `Recipient`='$id' ORDER BY `Massage_id` DESC LIMIT 1";
                    $result_last = mysqli_query($link, $last);
                    $user_last = mysqli_fetch_assoc($result_last);
                    ?>
                        <nav class="massage" onclick="ds(<?php echo $chat1; ?>, <?php echo $id2 ?>)">
                            <img src="<?php echo $avatar; ?>" width='60' height='60'>
                            <nav class="massage_content">

                                <h1><?php echo $user_chat['Username'];?> <?php echo $user_chat['Lastname'];?></h1>
                                <p><?php echo !isset($user_last['Message']) ? 'This chat is empty' : $user_last['Message']; ?></p>
                            </nav>
                        </nav>
                        
            <?php } ?>
                </nav>
            </div>
            <nav class="chat_container">
                <img src="../img/Vector.svg">
                <p>Select chat</p>
            </nav>
            <?php
                $select1 = "SELECT * FROM Chats WHERE UserID='$id' OR UserID2='$id'";
                $result1 = mysqli_query($link, $select1);
                while($user1 = mysqli_fetch_assoc($result1)) {
                    $chat = $user1['ChatID'];
                    if($user1['UserID'] == $id) {
                        $id2 = $user1['UserID2'];
                    }else {
                        $id2 = $user1['UserID'];
                    }
                    $select_chat1 = "SELECT * FROM Users WHERE UserID='$id2'";
                    $result_chat1 = mysqli_query($link, $select_chat1);
                    $user_chat1 = mysqli_fetch_assoc($result_chat1); 
                    if($user_chat1['Avatar_photo'] === null) {
                        $avatar1 = '../img/ava.svg';
                    } else {
                        $avatar1 = '../avatar_user/' . $user_chat1['Avatar_photo'];
                    }  
            ?>
            <nav class="chat_container_view" id='chat-<?php echo $chat; ?>'>
                <nav class="massage_header">
                    <img src="<?php echo $avatar1; ?>">
                    <nav  class="massage_text">
                        <h1><?php echo $user_chat1['Username']; ?> <?php echo $user_chat1['Lastname']; ?></h1>
                        <p>Online</p>
                    </nav>
                </nav>
                <nav class="massage_main">
                        <?php
                            $message_text = "SELECT `Massage_id`, `ChatID`, `Sender`, `Recipient`, `Message`, `Date_message` FROM `messages` WHERE ChatID='$chat'";
                            $sent_result = mysqli_query($link, $message_text);
                            while($message_user = mysqli_fetch_assoc($sent_result)) {
                                $sender =  $message_user['Sender'];
                                $recipient = $message_user['Recipient'];
                                $message_title = "SELECT * From Users WHERE UserID='$sender'";
                                $message_result = mysqli_query($link, $message_title);
                                while($message_user1 = mysqli_fetch_assoc($message_result)) {
                                    if ($sender == $message_user1['UserID']) {
                                        if ($message_user1['Avatar_photo'] == null)
                                        $avatar_mess = '../img/ava.svg';
                                        else {
                                            $avatar_mess = '../avatar_user/' . $message_user1['Avatar_photo'];
                                        }
                                        ?>
                                        <nav class="message_all">
                                            <img src="<?php echo $avatar_mess; ?>" width='49' height='49'>
                                            <nav  class="message_title">
                                                <p><?php echo $message_user1['Username']; ?> <?php echo $message_user1['Lastname']; ?></p>
                                                <p><?php echo $message_user['Message']; ?></p>
                                            </nav>
                                        </nav>
                        <?php       }else { 
                                        if ($message_user1['Avatar_photo'] == null)
                                            $avatar_mess = '../img/ava.svg';
                                        else {
                                                $avatar_mess1 = '../avatar_user/' . $message_user1['Avatar_photo'];
                                        }?>
                                    <nav class="message_all">
                                    <img src="<?php echo $avatar_mess1; ?>" width='49' height='49'>
                                    <nav  class="message_title">
                                        <p><?php echo $message_user1['Username']; ?> <?php echo $message_user1['Lastname']; ?></p>
                                        <p><?php echo $message_user['Message']; ?></p>
                                    </nav>
                                </nav>
                                <?php }
                                }

                            } ?>
                </nav>
            </nav>
                <?php } ?>
                        <form action="" method="POST">
                        <input type="text" name='message' placeholder="Enter massage">
                        <input type="hidden" id="currentChatId" name="chat_id" value="">
                        <input type="hidden" id="currentRecipient" name="Recipient" value="">
                        <input type="submit" name='sent' value="">
                        <?php
                        if(isset($_POST['sent'])) {
                            $message = $_POST['message'];
                            $date = Date('y-m-d');
                            $chatID = $_POST['chat_id'];
                            if ($message != '') {
                            $recipient = $_POST['Recipient'];
                            $sent_message = "INSERT INTO `messages`(`ChatID`, `Sender`, `Recipient`, `Message`, `Date_message`) VALUES ('$chatID','$id','$recipient','$message','$date')";
                            $sent_result = mysqli_query($link, $sent_message);
                            echo "<script>
                                    window.location = '../html/message.php';
                                    
                                </script>";
                            }
                } ?>
                    </form>
        </div>
    </main>
    <script>
        function ds(Chat, Recipient) {
        $('.chat_container_view').css('display', 'none');
        $(`#chat-${Chat}`).css('display', 'block');
        $('form').css('display', 'flex');
        $('.chat_container').css('display', 'none');
        $("#currentChatId").val(Chat);
        $("#currentRecipient").val(Recipient);
        const chatBlock = document.getElementById(`chat-${Chat}`);
        const container = chatBlock.querySelector('.message_all');
        container.scrollTop = container.scrollHeight;
    }
       $.ajax({
      // метод передачи данных POST
      type: "POST",
      // на сервере обратимся к файлу ajax.php,
      // который находится рядом с index.php
      url: "ajax.php",
      // передаем две переменные с именами min и max, 
      // равные 1 и 100 соответственно
      data: {min: 1, max: 100},
      // перед отправкой показываем loader.gif
      beforeSend: function() {$('#loader').fadeIn();},
      // если получен ответ от сервера, то скрываем loader.gif за 300 мс
      // и помещаем в <p></p> полученное число
      success: function(res) {
          $('#loader').fadeOut(300, function() {$("p").text(res);});
      },
      // если ошибка, то скрываем loader.gif за 300 мс и 
      // затем помещаем в <p></p> текст о недоступности сервера
      error: function() {
          $('#loader').fadeOut(300, 
             function() {$("p").text('Сервер временно недоступен');});
      }
      });
   return false;
});
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>