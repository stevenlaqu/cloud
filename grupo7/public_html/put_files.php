<?php

    if(isset($_FILES['file_to_upload'])) {

        require realpath(__DIR__.'/../app/ReglasNegocio/get_client.php');

        $file_name = $_FILES['file_to_upload']['name'];
        $temp_file_location = $_FILES['file_to_upload']['tmp_name'];

        $result = $s3Client->putObject([
            'Bucket' => $_POST['bucket_name'],
            'Key'    => $file_name,
            'SourceFile' => $temp_file_location
        ]);

        header("Location: show_buckets.php");
        die();

    }

?>

<div align="center">
  <h1>Put a new file into my Bucket:</h1>
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="bucket_name" value="<?php echo $_GET['bucket_name']?>"/>
    <input type="file" name="file_to_upload"/>
    <input type="submit"/>
  </form>
  <a href="show_buckets.php">Show all of my Buckets</a>
</div>
