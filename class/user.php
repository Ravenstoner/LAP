<?php
    class User {
        public $id,$groupid, $name, $firstname, $lastname, $password, $street, $ZIP, $city, $dateofbirth;

        public function getAllUsers() {
			$database = new Database();
            $database->DBconnect();
			$sql = $database->DBquery('SELECT * FROM t_users;');
            $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            return $result;
        }

        public function getUserByUserId($userid) {
			$database = new Database();
            $database->DBconnect();
			$sql = $database->DBquery('SELECT * FROM t_users WHERE id= "' . $database->mysqli_escape_string($userid) .'";');
            $result = mysqli_fetch_assoc($sql);
            
            $this->id          = $result['id'];
            $this->groupid     = $result['groupid'];
            $this->name        = $result['name'];
            $this->firstname   = $result['firstname'];
            $this->lastname    = $result['lastname'];
            $this->password    = $result['password'];
            $this->street      = $result['street'];
            $this->ZIP         = $result['ZIP'];
            $this->city        = $result['city'];
            $this->dateofbirth = $result['dateofbirth'];
		}

        public function getUserByUsername($username) {
			$database = new Database();
			$database->DBconnect();
			$sql = $database->DBquery('SELECT * FROM t_users WHERE name= "' . $database->mysqli_escape_string($username) .'";');
            $result = mysqli_fetch_assoc($sql);
            $database->DBdisconnect();
            
            $this->id          = $result['id'];
            $this->groupid     = $result['groupid'];
            $this->name        = $result['name'];
            $this->firstname   = $result['firstname'];
            $this->lastname    = $result['lastname'];
            $this->password    = $result['password'];
            $this->street      = $result['street'];
            $this->ZIP         = $result['ZIP'];
            $this->city        = $result['city'];
            $this->dateofbirth = $result['dateofbirth'];
        }
        
        public function changeUserPassword($user_id, $passordNew) {

            $passordNew = password_hash($passordNew, PASSWORD_DEFAULT);
            $database = new Database();
			$database->DBconnect();
            $database->DBquery('UPDATE `t_users` SET `password` = "' . $database->mysqli_escape_string($passordNew) . '" WHERE `t_users`.`id` = ' . $database->mysqli_escape_string($user_id) . ';');
            $database->DBdisconnect();
        }

        public function changeUserPasswordById($user_id, $passordNew) {

            $passordNew = password_hash($passordNew, PASSWORD_DEFAULT);
            $database = new Database();
			$database->DBconnect();
            $database->DBquery('UPDATE `t_users` SET `password` = "' . $database->mysqli_escape_string($passordNew) . '" WHERE `t_users`.`id` = ' . $database->mysqli_escape_string($user_id) . ';');
            $database->DBdisconnect();
        }

        public function updateUserById($user_id, $groupid, $name, $firstname, $lastname, $street, $city) {
            $database = new Database();
            $database->DBconnect(); 
            $database->DBquery('UPDATE `t_users` SET `groupid` = ' . $database->mysqli_escape_string($groupid) . ',
                                                     `name` = "' . $database->mysqli_escape_string($name) . '",
                                                     `firstname` = "' . $database->mysqli_escape_string($firstname) . '",
                                                     `lastname` = "' . $database->mysqli_escape_string($lastname) . '",
                                                     `street` = "' . $database->mysqli_escape_string($street) . '",
                                                     `city` = "' . $database->mysqli_escape_string($city) . '"
            WHERE `t_users`.`id` = ' . $database->mysqli_escape_string($user_id) . ';');
            // UPDATE `t_users` SET `name` = 'admin', `firstname` = 'Christian' WHERE `t_users`.`id` = 1;
            $database->DBdisconnect();
        }

        public function getAllGroups() {
            $database = new Database();
            $database->DBconnect();
			$sql = $database->DBquery('SELECT * FROM t_groups;');
            $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
            return $result;

        }
    }
?>