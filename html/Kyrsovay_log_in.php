<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/log_in.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="d-flex mt-5 justify-content-center">
            <img src="../img/logo.svg">
            <div class="d-flex ms-4 align-items-end" style="font-family: Permanent Marker; font-size: 60px;">
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
        <div class="border border-3 border-black rounded-4 mt-5 mx-auto" style="background: #D9D9D9; width: 533px; height: 663px;">
            <p style="font-family: Permanent Marker; font-size: 36px; padding: 100px 0 0 138px;">Authorization</p>
            <form action="" method="POST">
                <input type="text" name="login" placeholder="Username or Email" required>
                <input type="password" name="password" placeholder="Password"required>
                <input type="submit" VALUE="LOG IN">
                <?php
                    session_start();
                    require('../php/connect.php');
                    if (!empty($_POST['password']) and !empty($_POST['login'])) {
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        
                        $query = "SELECT * FROM log_in WHERE login='$login' AND password='$password'";
                        $res = mysqli_query($link, $query);
                        $user = mysqli_fetch_assoc($res);
                        
                        if (!empty($user)) {
                            $_SESSION['auth'] = true;
                            $_SESSION['id'] = $user['id'];
                            $id = $_SESSION['id'];
                            $update = "UPDATE `log_in` SET `visit`='online' WHERE id='$id'";
                            $res = mysqli_query($link, $update);
                            header('Location: ../html/profile.php');
                            die();
                        } else {
                            ?><p><?php echo("invalid username or password"); ?></p><?php
                        }
                    }
                ?>
            </form>
            <div class="text_container">
                <p><a href="#">Forgot you password?</a></p>
                <p>No account?<a href = "registration.php">Registration</a></p>
            </div>
        </div>
    </main>
</body>
</html>