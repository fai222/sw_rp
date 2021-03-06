<?php
	session_start();
    session_regenerate_id();
    if($_SESSION['logedin'] == true) {
    	try {
    		include 'connect.php';

    		$query = $db->prepare("SELECT * FROM `character_basic` WHERE `user_id` = :user_id");
	        $query->bindParam(":user_id", $_SESSION['userid']);
	        $query->execute();
	        $character_basic = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $character_id = $character_basic[0]['id'];
	        $character_sheet = array('character_basic' => $character_basic);

    		$tables = array(
    			'armor',
    			'item',
    			'obligation',
    			'motivation',
    			'talent',
    			'weapon',
    			'description'
    		);

    		foreach($tables as $table) {
		        $query = $db->prepare("SELECT * FROM `" . $table . "` WHERE `character_id` = :character_id");
		        $query->bindParam(":character_id", $character_id);
		        $query->execute();
		        $result = $query->fetchAll(PDO::FETCH_ASSOC);
		        $character_sheet[$table] = $result;
		        $query = null;
    		}

	        echo json_encode($character_sheet);
	        
    	} catch(PDOException $e) {
			die("ERROR: " . $e->getMessage());
		}
    } else {
    	header("Location: login.php");
    }
?>