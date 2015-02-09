<html>
    <head>
        
    </head>
    <body>
        <form method="POST" action="login.php">
            Username
            <input name="username" type="text"/>

            Password
            <input name="password" type="text"/>

            <input type="submit"/>
        </form>
    </body>
</html>
<?php
include 'connect.php';

	function login($id) {
		session_start();
        session_regenerate_id();

        $_SESSION['logedin'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userid'] = $id;
        
        echo "Logged in!";
        header("Location: ../index.php");
	}

	try {
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$query = $db->prepare("SELECT * FROM users WHERE BINARY username = :username AND password = :password");
	        $query->bindParam(":username", $_POST['username']);
	        
	        $salt = "iaw2jsoff03209tgoso398rhs983ht093";
	        $salt2 = "dahud219hfksi2017834thaodf1h309342";
	        $hashedPassword = hash('sha256', $salt . $_POST['password'] . $salt2);
	        $query->bindParam(":password", $hashedPassword);
	        
	        $query->execute();
	        $result = $query->fetchAll(PDO::FETCH_ASSOC);

	        if($query->rowCount() == 1) {
	        	$exists = true;
	        } else {
	        	$exists = false;
	        }

			if($exists) {
				login($result[0]['id']);
			} else {
				echo "Feil brukernavn eller passord.";
			}
		} else {
			echo "Vennligst skriv inn brukernavn og passord.";
		}
	} catch(PDOException $e) {
		die("ERROR: " . $e->getMessage());
	}
?>