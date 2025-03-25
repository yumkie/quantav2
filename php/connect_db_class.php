<?php
Class ConnectDb {
    var $mysqli;
    public function link() {
        $conn = mysqli_connect('mySQL-8.0', 'root', '', 'log_in') or die("Couldn't connect");
        return $conn;
    }
}
Class WorkingExamples{
    function getUserInfo($ress) {
        $Dbobj = new ConnectDb();
        $query = mysqli_query($Dbobj->link(), $ress);
        return $query;
    }
}
?>