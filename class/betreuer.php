<?php 
class Betreuer {
    public function getAllBetreuer() {
        $database = new Database();
        $database->DBconnect();
        $sql = $database->DBquery('SELECT * FROM t_betreuer;');
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;

    }
}