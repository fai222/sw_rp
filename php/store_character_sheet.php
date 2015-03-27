<?php
	session_start();
    session_regenerate_id();
    if ($_SESSION['logedin'] == true) {
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

            foreach ($character_sheet as $key_i => $value) {
                if ($key_i == "character_basic") {
                    $character_basic_prepare = "UPDATE `character_basic` SET ";
                    $i = 0;
                    $max = count($character_sheet['character_basic']);
                    foreach ($character_sheet['character_basic'] as $key => $value) {
                        $i++;
                        $character_basic_prepare .= "`" . $key . "`=:" . $key;
                        if($i < $max) {
                            $character_basic_prepare .= ", ";
                        }
                    }

                    $character_basic_prepare .= " WHERE `user_id`=:user_id";
                    $query = $db->prepare($character_basic_prepare);

                    foreach ($character_sheet['character_basic'] as $key => $value) {
                        $query->bindValue(':' . $key, $value);
                    }

                    $query->bindValue(':user_id', $_SESSION['userid']);
                    $query->execute();
                    $query = null;
                } else {
                    if (in_array($key_i, $tables)) {
                        foreach ($character_sheet[$key_i] as $key_ii => $value) {
                            if (is_array($character_sheet[$key_i][$key_ii])) {
                                $query_string = "INSERT INTO `" . $key_i . "` (`id`, `character_id`, ";
                                $placeholders = ":id, :character_id, ";
                                $deleteSelector = "; DELETE FROM `" . $key_i . "` WHERE ";
                                $placeholders_update = "`character_id`=:character_id, ";
                                $i = 0;
                                $max = count($character_sheet[$key_i][$key_ii]);
                                foreach ($character_sheet[$key_i][$key_ii] as $key_iii => $value) {
                                    $i++;
                                    $query_string .= "`" . $key_iii . "`";
                                    $deleteSelector .= "`" . $key_iii . "` = '' ";
                                    $placeholders .= ":" . $key_iii;
                                    $placeholders_update .= "`" . $key_iii . "`=:" . $key_iii;

                                    if ($i < $max) {
                                        $query_string .= ", ";
                                        $deleteSelector .= "AND ";
                                        $placeholders .= ", ";
                                        $placeholders_update .= ", ";
                                    }
                                }

                                $query_string .= ") VALUES (" . $placeholders . ") ON DUPLICATE KEY UPDATE " . $placeholders_update . $deleteSelector;
                                echo "    > " . $query_string;
                                $query = $db->prepare($query_string);
                                
                                $query->bindValue(':id', $key_ii);
                                $query->bindValue(':character_id', $_SESSION['characterid']);

                                foreach ($character_sheet[$key_i][$key_ii] as $key_iii => $value) {
                                    $query->bindValue(':' . $key_iii, $value);
                                }

                                $query->execute();
                                $query = null;
                            } else {
                                /*$query_string = "INSERT INTO `" . $key_i . "` (";
                                $placeholders = ":character_id, ";
                                $placeholders_update = "";
                                $i = 0;
                                $max = count($character_sheet[$key_i]);
                                foreach ($character_sheet[$key_i] as $key_ii => $value) {
                                    $i++;
                                    $query_string .= "`" . $key_ii . "`";
                                    $placeholders .= ":" . $key_ii;
                                    $placeholders_update .= "`" . $key_ii . "`=:" . $key_ii;

                                    if ($i < $max) {
                                        $query_string .= ", ";
                                        $placeholders .= ", ";
                                        $placeholders_update .= ", ";
                                    }
                                }

                                $query_string .= ") VALUES (" . $placeholders . ") ON DUPLICATE KEY UPDATE " . $placeholders_update;
                                echo "    > " . $query_string;
                                $query = $db->prepare($query_string);
                                
                                $query->bindValue(':character_id', $_SESSION['characterid']);
                                foreach ($character_sheet[$key_i] as $key_ii => $value) {
                                    $query->bindValue(':' . $key_ii, $value);
                                }

                                $query->execute();
                                $query = null;*/
                                echo "NOT ROW!";
                            }
                        }
                    }
                }
            }
	        
    	} catch (PDOException $e) {
			die("ERROR: " . $e->getMessage());
		}
    } else {
    	header("Location: login.php");
    }
?>