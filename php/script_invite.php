<?php
    $arr1 = [];
    $w = [];
    $count = -1;
    function list($id) {
        $data = new WorkingExamples();
        $res = $data->getUserInfo("SELECT * FROM friends_invite");
        while($user = mysqli_fetch_assoc($res)) {
            $idf1 = $user['id'];
            array_push($arr1, $idf1);
            $count++;
            if($user['status_invite'] == 0 ) {
                var_dump($invited = $user['id2_invited']);
                $data2 = new WorkingExamples();
                $res2 = $data2->getUserInfo("SELECT username FROM log_in WHERE id='$invited'");
                $user2 = mysqli_fetch_assoc($res2);
            ?>
                <div class="requests_list">
                        <div class="btn_1">
                            <button>
                                <img src="../img/Group.svg">
                            </button>
                        </div>
                        <span><?php echo($user2['username']); ?></span>
                        <div class="btn_2">
                            <form action='' method='POST'>
                            <input type='submit' src='../img/Component 3.png' name="<?=$arr1[$count]?>" value=''>
                            </form>
                        </div>
                        <div class="btn_3">
                                <img src="../img/Vector (4).png">
                        </div>
                </div>
                    <?php
            }
        }
        foreach ($_POST as $keys => $value) {
            if(array_key_exists($keys, $_POST)) {
                $data3 = new WorkingExamples();
                $res3 = $data3->getUserInfo("DELETE FROM friends_invite WHERE id='$keys'");
                echo "eee";
                echo "
                <script>
                    setTimeout(function() {
                       window.location = '../html/friends.php';
                    }, 2000);
                </script>
                ";
            }
            $_POST = array();
            break;

        }
    }
?>