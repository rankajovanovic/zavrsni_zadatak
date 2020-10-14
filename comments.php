
<div class="comments">
<?php
    $sqlComments ="SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
    $statement = $connection->prepare($sqlComments);

    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>

    <h3>Comments:</h3><br>
                   
    <form action="create-comm.php" method="post">
    <label for="">Name:</label><br>
    <input name="author" id="author" type="text"><br>
    <label for="">Comment:</label><br>
    <textarea name="com-body" id="com-body" cols="50" rows="5"></textarea><br><br>
    <button type="">Add comm!</button>
    </form>

    <ul>
        <?php foreach ($comments as $comment) {?>
            <hr>
        <li>
            <p><?php echo $comment['text'] ?> </p>
            <p>posted by: <strong><?php echo $comment['author']?></strong></p>
        </li>
        
        <?php } ?>
    </ul> 
</div>
