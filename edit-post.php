<?php include('db.php')?>
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

    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script>
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist"
            });
    </script>
</head>
<body>

<?php include('header.php')?>

<main role="main" class="container">

    <div class="row">
        <div class="col-sm-8 blog-main form-row ">
            
            <form action="" method="post">    
                <h2 class="pb-4 text-center">Edit post:</h2>

                <?php
                    if(isset($_POST['submit'])){
                        $_POST = array_map( 'stripslashes', $_POST );
                        //collect form data
                        extract($_POST);
                    
                        //basic validation
                        if($title ==''){
                            $error[] = 'Please enter the title.';
                        }
                        if($body ==''){
                            $error[] = 'Please enter the content.';
                        }
                        if($author ==''){
                            $error[] = 'Please enter the author.';
                        }
                        if(!isset($error)){ 
                            try{
                               
                                $sql = "UPDATE posts SET title = :title, body = :body, author = :author WHERE id = :id";
                                $stmt = $connection->prepare($sql);
    
                                $stmt->execute(array(
                                    ':title' => $title,
                                    ':body' => $body,
                                    ':author' => $author,
                                    ':id' =>  $_GET['id']
                                ));

                                header("Location: index.php?action=updated");
                                exit;
                            
                            } catch(PDOException $e){
                                echo $e->getMessage();
                            }
                        }
                    }
                ?>
                <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<p class="text-danger">'.$error.'</p>';
                        }
                    }

                    try {

                        $stmt = $connection->prepare('SELECT title, author, body FROM posts WHERE id = :id') ;
                        $stmt->execute(array(':id' => $_GET['id']));
                        $post = $stmt->fetch(); 
            
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                ?>
    
                <label class="form-check-label form-text" for="">Author:</label>
                <input id="author" class="form-check-inline form-control" name="author" type="text" value='<?php echo $post['author'];?>'>

                <label class="form-check-label form-text" for="title">Post title:</label>
                <input id="title" class="form-check-inline form-control"  name="title" type="text" value='<?php echo $post['title'];?>'>

                <label class="form-check-label form-text" for="">Content:</label>
                <textarea class="form-text form-control"  name="body" id="body" cols="80" rows="15"><?php echo $post['body'];?></textarea>
               
                <button class="btn btn-success mt-3 mb-3" name="submit" id="submit" type= "submit">Save</button>
            </form>

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>
    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php')?>
</body>
</html>