<?php include('db.php')?>
<?php
    if(isset($_GET['delpost'])){ 
        $sql ="DELETE FROM comments WHERE post_id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(':id' => $_GET['delpost']));

        $sql1 = "DELETE FROM posts WHERE id = :id";
        $stmt = $connection->prepare($sql1);
        $stmt->execute(array(':id' => $_GET['delpost']));
    
        header('Location: admin.php?action=deleted');
        exit;
    } 
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">

    <script language="JavaScript" type="text/javascript">
        function delpost(id, title)
        {
        if (confirm("Are you sure you want to delete?"))
        {
            window.location.href = 'admin.php?delpost=' + id;
        }       
        }
    </script>
</head>

<body>

<?php include('header.php')?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
           
        <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT id, title, created_at, body, author FROM posts ORDER BY created_at DESC";
                        $statement = $connection->prepare($sql);
                    
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        $posts = $statement->fetchAll();

                        foreach ($posts as $post) {
                    ?>
                    <tr>
                        <td><a href="#" title="#"><?php echo($post['title']) ?></a></td>
                        <td><?php echo(date('jS M Y', strtotime($post['created_at']))) ?></td>
                        <td class="text-right">
                            <a href="edit-post.php?id=<?php echo $post['id'];?>">Edit</a> 
                            <a href="javascript:delpost('<?php echo $post['id'];?>','<?php echo $post['title'];?>')">Delete</a>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php')?>

</body>
</html>