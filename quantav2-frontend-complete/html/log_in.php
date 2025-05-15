<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/log_in.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&family=Kalam:wght@300;400;700&family=Permanent+Marker&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="../img/logo.svg">
        <p>Q</p>
        <p>u</p>
        <p>a</p>
        <p>n</p>
        <p>t</p>
        <p>a</p>
    </header>
    <main>
        <div class="log_in_container">
            <p>Authorization</p>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username or Email">
                <input type="password" id="password-input" name="password" placeholder="Password">
                <a href="#" class="view_password" onclick="view()"></a>
                <input type="submit" value="log in">
            </form>
            <?php
                    session_start();  //Запуск сессии
                    require("../php/connect.php"); //подключение файла с данными о бд
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $select = "SELECT `UserID`, `Login`, `Password`, `Email` FROM `Users` WHERE Login='$username'"; //Sql запрос
                        $res = mysqli_query($link, $select);
                        $user = mysqli_fetch_assoc($res);
                        if (password_verify($password, $user['Password'])) { //дехеширование пароля
                            $_SESSION['auth'] = true; //индикация входа пользователя в аккаунт
                            $_SESSION['id'] = $user['UserID']; //сохранение id пользователя в сессии
                            $id = $_SESSION['id'];
                            header("Location: ../html/profile.php"); //редирект при успешной авторизации
                            die();
                        }else {
                            ?><p><?php echo "Incorrect username or password"?><p><?php
                        }

                    
                ?>
            <p><a href="#">Forgot your password?</a></p>
            <p>no account? <a href="../html/registration.php">registration</a></p>
        </div>
    </main>
    <script src="../js/pass_view.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>