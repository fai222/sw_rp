<?php
	include 'connect.php';
	session_start();
    session_regenerate_id();
    if($_SESSION['logedin'] == true) {
    	try {

    		$query = $db->prepare("SELECT * FROM character_sheet WHERE user_id = :user_id");
	        $query->bindParam(":user_id", $_SESSION['userid']);
	        $query->execute();
	        $character_sheet_data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $character_id = $character_sheet_data[0]['id'];
	        $character_sheet = array('character_sheet_data' => $character_sheet_data);

    		$tables = array(
    			'armor',
    			'critical_injuries',
    			'equipment', 'obligations',
    			'motivations',
    			'talents',
    			'weapons',
    			'descriptions'
    		);

    		foreach($tables as $table) {
		        $query = $db->prepare("SELECT * FROM " . $table . " WHERE character_id = :character_id");
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