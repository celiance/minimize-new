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

function product_input($img, $product_name, $purchase_date, $price, $description, $status, $owner_id){
	$db = get_db_connection();
	$sql = "INSERT INTO products (img, product_name, purchase_date, price, description, status, owner_id ) VALUES (?, ?, ?, ?, ?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($img, $product_name, $purchase_date, $price, $description, $status, $owner_id));
}


/* Meine Produkte */
function get_product($owner_id){
	$db = get_db_connection();
	$sql = "SELECT * FROM products WHERE owner_id = $owner_id ORDER BY purchase_date;";
	$result = $db->query($sql);
	return $result->fetchAll();
}

function get_product_by_id($product_id){
	$db = get_db_connection();
	$sql = "SELECT * FROM products WHERE id = $product_id;";
	$result = $db->query($sql);
	return $result->fetch();
}

/* Produkt-Alert */
function get_product_push($owner_id){
	$db = get_db_connection();
	$sql = "SELECT * FROM products WHERE owner_id = $owner_id AND status <= DATE_ADD(NOW(),INTERVAL -10 DAY) ORDER BY purchase_date;";
	$result = $db->query($sql);
	return $result->fetchAll();
}



/* UPDATE Status */

function update_status($product_id){
	$db = get_db_connection();
	$sql = "UPDATE products SET status=CURRENT_TIMESTAMP WHERE id=?;";
	$stmt = $db->prepare($sql);
	$values = array($product_id);
	return $stmt->execute($values);
}

function update_haufigkeit($haufigkeit, $product_id){
	$db = get_db_connection();
	$sql = "UPDATE products SET haufigkeit=? WHERE id=?;";
	$stmt = $db->prepare($sql);
	$values = array($haufigkeit, $product_id);
	return $stmt->execute($values);
}

/* DELETE BEFEHLE */

function delete_profil($id){
	$db = get_db_connection();
	$sql = "DELETE FROM user WHERE id=?;";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($id));
}


function delete_product($product_id){
	$db = get_db_connection();
	$sql = "DELETE FROM products WHERE id=?;";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($product_id));
}



?>
