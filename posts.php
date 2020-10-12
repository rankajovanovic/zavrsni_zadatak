<?php 
    $sql = "SELECT posts.id, posts.title, posts.created_at, posts.body, posts.author  FROM posts ORDER BY posts.created_at DESC LIMIT 3";
    $statement = $connection->prepare($sql);

    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
?>

<?php
    foreach ($posts as $post) {
?>

<div class="blog-post">
    <h2><a class="blog-post-title h2" href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h2>
    <p class="blog-post-meta"><?php echo($post['created_at']) ?> by <a href="#"><?php echo($post['author']) ?></a></p>

    <p><?php echo($post['body']) ?></p>
</div><!-- /.blog-post -->

<?php
    }
?>

<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
</nav>