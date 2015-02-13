<?php
	session_start();
    session_regenerate_id();
    if($_SESSION['logedin'] == true) {
    	try {
    		include 'connect.php';

    		$character_sheet = json_decode($_POST['character_sheet'], true);

    		$tables = array(
    			'armor',
    			'item',
    			'obligation',
    			'motivation',
    			'talent',
    			'weapon',
    			'description'
    		);

    		$character_basic_prepare = "UPDATE `character_basic` SET ";

    		$i = 0;
    		$max = count($character_sheet['character_basic']);
    		foreach($character_sheet['character_basic'] as $key => $value) {
    			$i++;
    			$character_basic_prepare .= "`" . $key . "`=:" . $key;
    			if($i < $max) {
    				$character_basic_prepare .= ", ";
    			}
    		}

    		$character_basic_prepare .= " WHERE `user_id`=:user_id";
    		$query = $db->prepare($character_basic_prepare);

    		foreach($character_sheet['character_basic'] as $key => $value) {
    			$query->bindValue(':' . $key, $value);
    		}

    		$query->bindValue(':user_id', $_SESSION['userid']);
	        $query->execute();
			$query = null;
	        
    	} catch(PDOException $e) {
			die("ERROR: " . $e->getMessage());
		}
    } else {
    	header("Location: login.php");
    }
?>