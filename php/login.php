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

	function login($id, $character_id) {
		session_start();
        session_regenerate_id();

        $_SESSION['logedin'] = true;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userid'] = $id;
        $_SESSION['characterid'] = $character_id;
        
        echo "Logged in!";
        header("Location: ../index.php");
	}

	try {
		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$query = $db->prepare("SELECT * FROM `user` WHERE BINARY `username` = :username AND `password` = :password");
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
				$query2 = $db->prepare("SELECT `id` FROM `character_basic` WHERE `user_id` = :user_id");
			    $query2->bindParam(":user_id", $result[0]['id']);
			    $query2->execute();
			    $result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
				login($result[0]['id'], $result2[0]['id']);
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