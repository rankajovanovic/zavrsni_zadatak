<?php
 include('db.php');
 
 try{
    $sql = "INSERT INTO comments (author, text, post_id) VALUES (:author, :text, :post_id)";
    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':text', $_POST['body']);
    $stmt->bindParam(':author', $_POST['author']);
    $stmt->bindParam(':post_id',$_GET['post_id']);
    
    $stmt->execute();

} catch(PDOException $e){
    echo("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
// Close connection

$url = "single-post.php?post_id= {$_GET['post_id']}";
header("Location: $url");
exit();
?>




