<div class="comments">
    <h3>Comments:</h3><br>
                   
    <?php
    $sqlComments ="SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";
    $statement = $connection->prepare($sqlComments);

    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
    ?>

    <ul>
        <?php foreach ($comments as $comment) {?>
        <li>
            <p>posted by: <strong><?php echo $comment['author']?></strong></p>
            <p><?php echo $comment['text'] ?> </p>
        </li>
        <hr>
        <?php } ?>
    </ul>
        
</div>
