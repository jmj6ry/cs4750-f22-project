<?php
function addFriend($name, $major, $year)
{
    global $db;
    $query = "INSERT INTO friends VALUES (:name, :major, :year)";  
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':major', $major);
        $statement->bindValue(':year', $year);
        $statement->execute();
        $statement->closeCursor();

        // if ($statement->rowCount() == 0)
        //     echo "Failed to add a friend <br/>";
    }
    catch (PDOException $e) 
    {
        // echo $e->getMessage();
        // if there is a specific SQL-related error message
        //    echo "generic message (don't reveal SQL-specific message)";

        if (str_contains($e->getMessage(), "Duplicate"))
           echo "Failed to add a friend <br/>";
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

function getAllFriends()
{
    global $db; 
    $query = "SELECT * FROM friends";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();   // fetch()
    $statement->closeCursor();
    return $result;
}

function getFriendByName($name)  
{
    global $db;
    $query = "SELECT * FROM friends where name = :name";

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $result = $statement->fetch(); 
    $statement->closeCursor();    
    return $result;
}

function updateFriend($name, $major, $year)
{
    global $db;
    $query = "UPDATE friends SET major=:major, year=:year WHERE name=:name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':major', $major);
    $statement->bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor();
    // $statement->query()
}

function deleteFriend($name)
{
    global $db;
    $query = "DELETE FROM friends WHERE name=:name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

?>