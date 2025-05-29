<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/regisration2.css">
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
                <input type="text" name="username" placeholder="Username" required>
                <input type="text" name="lastname" placeholder="Lastname" required>
                <input type="date" name ='date_of_birth' value='2023-04-01' required>
                <input type="submit" name='sub' value="Register">
            </form>
            <?php
                session_start();
                require("../php/connect.php");
                $id = $_SESSION['email'];
                $select = "SELECT UserID FROM Users WHERE Email='$id'";
                $user = mysqli_fetch_assoc(mysqli_query($link, $select));
                $_SESSION['id'] = $user['UserID'];
                $_SESSION['auth'] = "Online";
                if(isset($_POST['sub'])) {
                    $username = $_POST['username'];
                    $lastname = $_POST['lastname'];
                    $data = $_POST['date_of_birth'];
                    $insert = "UPDATE `Users` SET `Date_of_birth`='$data',`Username`='$username',`Lastname`='$lastname' WHERE `Email` = '$id'"; //добавление данных в бд
                    $res = mysqli_query($link, $insert);
                    header("Location: profile.php"); //редирект при успешной авторизации
                    die();
                }                                   
            ?>
        </div>
    </main>
</body>
</html>