<?php

	include('user.php');

	class Login {

		public function loginUser($username, $password) {
			$user = new User();
			$result = $user->getUserByUsername($username);
			if ($username == $user->name) {
				if (password_verify($password, $user->password)) {
					session_start();
					$_SESSION['user_id'] = $user->id;
					$_SESSION['user_group_id'] = $user->groupid;
					header('Location: ../LAP/pages/home.php');
				} else {
					echo "Benutzername oder Passwort flasch!";
				}
			}
		}

		public function loginAdmin($username, $password) {
			$user = new User();
			$result = $user->getUserByUsername($username);

			if ($username == $user->name) {
				if (password_verify($password, $user->password)) {
					session_start();
					$_SESSION['user_id'] = $user->id;
					$_SESSION['user_group_id'] = $user->groupid;
					header('Location: home.php');
				} else {
					echo "Benutzername oder Passwort flasch!";
				}
			}
		}
	}