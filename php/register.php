<html>
    <head>
        
    </head>
    <body>
        <form method="POST" action="register.php">
            Username
            <input name="username" type="text"/>

            Password
            <input name="password" type="text"/>

            Repeat Password
            <input name="password2" type="text"/>

            <input type="submit"/>
        </form>
    </body>
</html>

<?php
    include 'connect.php';

    try
    {
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']))
        {
            $query = $db->prepare("SELECT * FROM user WHERE username = :username");
            $query->bindParam(":username", $_POST['username']);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            if($query->rowCount() >= 1)
            {
                echo "Brukernavnet er allerede tatt, venligst velg et annet brukernavn.";
            }
            else
            {
                if($_POST['password'] == $_POST['password2'])
                {
                    $query = $db->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
                    $query->bindParam(":username", $_POST['username']);
                    
                    $salt = "iaw2jsoff03209tgoso398rhs983ht093";
                    $salt2 = "dahud219hfksi2017834thaodf1h309342";
                    $hashedPassword = hash('sha256', $salt . $_POST['password'] . $salt2);
                    $query->bindParam(":password", $hashedPassword);
                    
                    $query->execute();
                    echo "Registrering vellykket.";
                }
                else
                {
                    echo "Passordene er ikke like, vennligst prøv igjen.";
                }
            }
            
        }
        else
        {
            echo "Vennligst skriv inn brukernavn og passord";
        }
    }
    catch (PDOException $e)
    {
        die("Error! " . $e->getMessage());
    }

?>