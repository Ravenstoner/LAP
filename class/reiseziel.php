<?php

class ReiseZiel {
    public function getAllDestinations() {
        $database = new Database();
        $database->DBconnect();
        $sql = $database->DBquery('SELECT * FROM t_reisedestinationen LEFT JOIN t_betreuer ON t_reisedestinationen.betreuer_id = t_betreuer.id;');
        $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        return $result;
    }

    public function addDestination($name, $betreuer_id) {
        $database = new Database();
        $database->DBconnect();
        $database->DBquery('INSERT INTO t_reisedestinationen (name, betreuer_id) VALUES ("' . $database->mysqli_escape_string($name) . '", "' . $database->mysqli_escape_string($betreuer_id) . '");');
    }
}

?>