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
   
    $sql = "INSERT INTO comments (author, text, post_id) VALUES (:author, :text, :post_id)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':text', $_POST['com-body']);
    $stmt->bindParam(':author', $_POST['author']);
    $stmt->bindParam(':post_id', $_POST['post_id']);
    
    $stmt->execute();
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close connection
unset($pdo);
?>
