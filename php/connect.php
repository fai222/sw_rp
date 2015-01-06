<?php
try {
    $db = new PDO("mysql:host=127.0.0.1; dbname=sw-rp", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {	
    die("Error! " . $e->getMessage());
}
?>