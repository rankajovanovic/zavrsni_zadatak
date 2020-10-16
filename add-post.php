<?php
include('db.php');

try{
    $sql = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':body', $_POST['body']);
    $stmt->bindParam(':author', $_POST['author']);
    
    $stmt->execute();
    header("Location: /zavrsni_zadatak-master/index.php");

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>