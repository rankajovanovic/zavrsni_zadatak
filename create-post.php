
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
</head>
<body>

<?php include('header.php')?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main form">
            <form action="add-post.php" method="post">    

                <label for="">Author:</label><br>
                <input id="author" name="author" type="text"><br>

                <label for="title">Post title:</label><br>
                <input id="title" name="title" type="text"><br>

                <label for="">Content:</label><br>
                <textarea  name="body" name="bodys" id="content_text" cols="50" rows="10"></textarea><br><br>
               
                <button id="submit" type= "submit">Save</button>
            </form>

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php')?>

<script> src="scripts.js" </script>
</body>
</html>
