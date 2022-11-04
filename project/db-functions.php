<?php
function addAccount($username, $firstName, $lastName, $email, $address)
{
    global $db;
    $query = "INSERT INTO accounts VALUES (:username, :firstName, :lastName, :email, :address)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':address', $address);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
    }
    catch (PDOException $e) 
    {
        if (str_contains($e->getMessage(), "Duplicate")) {
            echo "An account with that information already exists <br/>";
        }
        echo "Failed with PDO Exception";
        echo $e->getMessage();
    }
    catch (Exception $e)
    {
        echo "Failed to create account. Result: $result";
        echo $e->getMessage();
    }
    return $result;
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>