<?php
    $_POST;
    $arr1 = [];
    $w = [];
    $count = -1;
    $data = "SELECT * FROM friends_invite";
    $res = mysqli_query($link, $data);
        while($user = mysqli_fetch_assoc($res)) {
            $idf1 = $user['id'];
            array_push($arr1, $idf1);
            $this->count++;
            if($user['status_invite'] == 1 ) {
                var_dump($invited = $user['id2_invited']);
                $data2 = "SELECT username FROM log_in WHERE id='$invited'";
                $res2 = mysqli_query($link, $data2);
                $user2 = mysqli_fetch_assoc($res2);
            ?>
                <div class="friends_list">
                    <div class="btn_1">
                        <button>
                            <img src="../img/Group.svg">
                        </button>
                    </div>
                    <span><?=$user2['username']?></span>
                    <div class="btn_2">
                        <form action='' method='POST'>
                            <input type="submit" name="<?=$arr1[$count]?>" value=''>
                        </form>
                    </div>
                </div>
                    <?php
            }
        }
        foreach ($_POST as $key => $value) {
            echo $key;
            if(array_key_exists($key, $_POST)) {
                $data3 = "UPDATE friends_invite SET status_invite='0' WHERE id='$key'";
                $res3 = mysqli_query($link, $data3);
                echo "qqqq";
                echo "
                <script>
                    setTimeout(function() {
                       window.location = '../html/friends.php';
                    },3000);
                </script>
                ";
            }
            $_POST = array();
            break;

        }


?>