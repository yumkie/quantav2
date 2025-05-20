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
                        $select = "SELECT `UserID`, `Login`, `Password`, `Email` FROM `Users` WHERE Login='$username'"; //Sql запрос
                        $res = mysqli_query($link, $select);
                        $user = mysqli_fetch_assoc($res);
                        var_dump($user);
                        if (password_verify($password, $user['Password'])) { //дехеширование пароля
                            $_SESSION['auth'] = true; //индикация входа пользователя в аккаунт
                            $_SESSION['id'] = $user['UserID']; //сохранение id пользователя в сессии
                            $id = $_SESSION['id'];
                            header("Location: ../html/profile.php"); //редирект при успешной авторизации
                            die();
                        }else {
                            ?><p><?php echo "Incorrect username or password"?><p><?php
                        }


                ?>s
