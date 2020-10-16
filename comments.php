<div class="comments mb-5">
<?php
    $sqlComments ="SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
    $statement = $connection->prepare($sqlComments);

    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
?>

    <form action="create-comm.php?post_id=<?php echo($_GET['post_id'])?>" method="post">
    
    <h3>Comments:</h3><br>

    <label class="form-check-label form-text" for="">Name:</label>
    <input class="form-check-inline form-control" name="author" id="author" type="text">

    <label class="form-check-label form-text" for="">Comment:</label>
    <textarea class="form-text form-control"  name="body" id="body" cols="50" rows="5"></textarea>

    <button class="btn btn-primary mt-3" type="submit">Add comm!</button>
    </form>

    <ul class="mt-5">
        <?php foreach ($comments as $comment) {?>
            <hr>
        <li>
            <p><?php echo $comment['text'] ?> </p>
            <p class="text-right ">posted by: <strong><?php echo $comment['author']?></strong></p>
        </li>
        
        <?php } ?>
    </ul> 
</div>
