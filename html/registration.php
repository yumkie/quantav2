<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/registrayion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
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
    </header>
    <main>
        <div class="container">
            <p>Registration</p>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="email" required>
                <input type="text" name="login" placeholder="login" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="password" name="Confirm_password" placeholder="Confirm Password" required>
                <input type="submit" VALUE="REGISTER">
                <?php
                    session_start();
                    require('../php/connect.php');
                    if (!empty($_POST['password']) and !empty($_POST['login']) and !empty($_POST['email'])) {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        
                        $query = "SELECT * FROM log_in WHERE login='$login' OR email='$email'";
                        $res = mysqli_query($link, $query);
                        $user = mysqli_fetch_assoc($res);
                        
                        if (empty($user)) {
                            $_SESSION['auth'] = true;
                            $into = "INSERT INTO log_in SET login='$login', password='$password', email='$email'";
                            $res = mysqli_query($link, $into);
                            header('Location: ../html/main_screen.php');
                            die();
                        } else {
                            ?><p><?php echo("invalid username or password"); ?></p><?php
                        }
                    }
                ?>
            </form>
            <div class="text_container">
                <p><a href="../html/Kyrsovay_log_in.php">I already have an account?<a></p>
            </div>
        </div>
    </main>
</body>
</html>