<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/regisration.css">
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
        <div class="registration_container">
            <p>Registration</p>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="password" placeholder="Password" required>
                <input type="text" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" value="Register">
            </form>
            <?php
                session_start(); //Запуск сессии
                require("../php/connect.php"); //подключение файла с данными о бд
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $confirm_password = $_POST['confirm_password']; 
                $select = "SELECT `UserID`, `Login`, `Password`, `Email` FROM `Users` WHERE Login='$username' OR Email='$email'"; //Выбор данных из бд
                $res = mysqli_query($link, $select);
                $user = mysqli_fetch_assoc($res);
                if ($password == $confirm_password) {
                    if (!isset($user)) {
                        $_SESSION['auth'] = true; //индикация входа пользователя в аккаунт
                        $_SESSION['id'] = $user['UserID'];  //сохранение id пользователя в сессии
                        $hash = password_hash($password, PASSWORD_DEFAULT); //хеширование пароля
                        $insert = "INSERT INTO `Users`(`Login`, `Password`, `Email`) VALUES ('$username','$hash','$email')"; //добавление данных в бд
                        var_dump($insert);
                        $res = mysqli_query($link, $insert);
                        header("Location: profile.php"); //редирект при успешной авторизации
                        die();
                }else {
                        ?><p><?php echo "Password is not semi";?><p><?php
                    }
                }
            ?>
            <p><a href="log_in.php">I already have an account?</a></p>
        </div>
    </main>
</body>
</html>
