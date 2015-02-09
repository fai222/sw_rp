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

	        $query = $db->prepare("SELECT * FROM armor WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $armor = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM critical_injuries WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $critical_injuries = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM equipment WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $equipment = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM obligations WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $obligations = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM motivations WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $motivations = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM talents WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $talents = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM weapons WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $weapons = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $query = $db->prepare("SELECT * FROM descriptions WHERE character_id = :character_id");
	        $query->bindParam(":character_id", $character_id);
	        $query->execute();
	        $descriptions = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query = null;

	        $character_sheet = array('character_sheet_data' => $character_sheet_data, 'armor' => $armor, 'critical_injuries' => $critical_injuries, 'equipment' => $equipment, 'obligations' => $obligations, 'motivations' => $motivations, 'talents' => $talents, 'weapons' => $weapons, 'descriptions' => $descriptions);
	        echo json_encode($character_sheet);
	        
    	} catch(PDOException $e) {
			die("ERROR: " . $e->getMessage());
		}
    } else {
    	header("Location: login.php");
    }
?>