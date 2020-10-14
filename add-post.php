<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 

try{
   
    $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':body', $_POST['body']);
    $stmt->bindParam(':author', $_POST['author']);
    
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>