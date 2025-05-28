                    <?php
                    require("../php/connect.php");
                    $id = 5;
                    $select = "SELECT * FROM Friends";
                    $result = mysqli_query($link, $select);
                    while($user = mysqli_fetch_assoc($result)) {
                        $id_friend = $user['Friend_id'];
                        $invited = $user['User_id2'];
                        $inviter = $user['User_id'];
                        if ($invited == $id) {
                            $friend = $inviter;
                        } else {
                            $friend = $invited;
                        }
                        $select = "SELECT * FROM Users WHERE UserID = '$friend'";
                        $result = mysqli_query($link, $select);
                        $user = mysqli_fetch_assoc($result);
                        ?>
                        <nav class="friends">
                            <a><img src="../img/ava.svg" width="146" height="141"></a>
                            <nav>
                                <p><?php echo $user['Username'];?> <?php echo $user['Lastname']; ?></p>
                                <p>Online</p>
                            </nav>
                            <form action='../php/delete_friend.php' method='POST'>
                                <input type='submit' name='<?php echo $id_friend; ?>' value=''>
                            </form>
                        </nav>
                <?php } ?>
