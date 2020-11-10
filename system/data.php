<?php

//Datenbankverbindung aufbauen
function get_db_connection(){
	global $db_host, $db_name, $db_user, $db_pass, $db_charset;

	$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false
	];

	try {
		$db = new PDO($dsn, $db_user, $db_pass, $options);
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}

	return $db;
}

//Login Funktion
function login($email, $password){
		$db = get_db_connection();
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$password';";
		$result = $db->query($sql);

		if($result->rowCount() == 1){
			$row = $result->fetch();
			return $row;
		}else{
			return false;
	}
}

//Registrieren Funktion
function register($name, $email, $password){
	$db = get_db_connection();
	$sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($name, $email, $password));
}

// Überprüfung, ob die E-Mail-Adresse in der Tabelle users vorhanden ist.
function email_check($email){
	$db = get_db_connection(); // DB-Verbindung herstellen (s. login())
	$sql = "SELECT * FROM user where email = '$email';";
	$result = $db->query($sql);
	if($result->rowCount() > 0){
		return true;
	};
	return false;
}

function get_user_by_id($id){
	$db = get_db_connection();
	$sql = "SELECT * FROM user WHERE id = $id;";
	$result = $db->query($sql);
	return $result->fetch();
}

function request_input($title, $description, $user){
	$db = get_db_connection();
	$sql = "INSERT INTO request (title, description, autor ) VALUES (?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($title, $description, $user));
}

?>
