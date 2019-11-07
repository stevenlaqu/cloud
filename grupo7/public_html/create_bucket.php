<?php

    if(isset($_POST['bucket_name'])) {

        require_once realpath(__DIR__.'/../app/ReglasNegocio/get_client.php');

        try {

            $s3Client->createBucket([
                'Bucket' => $_POST['bucket_name'],
            ]);

        } catch (Aws\S3\Exception\S3Exception $e) {

            echo "Error in creating your Bucket, try again.<br/>";
            echo '<a href="create_bucket.php">Create a new Bucket</a>';
            die();

        }

        header("Location: show_buckets.php");
        die();

    }

?>

<div align="center">
  <h1>Create a new Bucket:</h1>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="bucket_name"/>
    <input type="submit"/>
  </form>
  <a href="show_buckets.php">Show all of my Buckets</a>
</div>
