<div align="center">
  <h1>All of my Buckets:</h1>

<?php

    require_once realpath(__DIR__.'/../app/ReglasNegocio/get_client.php');

    $bucket_list = $s3Client->listBuckets([]);

    foreach ($bucket_list['Buckets'] as $bucket) {

        $bucket_name = $bucket['Name'];

        $objects = $s3Client->listObjects([
            'Bucket' => $bucket_name
        ]);

        echo $bucket_name,
        " - <a href='delete_buckets.php?bucket_name=$bucket_name'>Delete</a>",
        " - <a href='put_files.php?bucket_name=$bucket_name'>Put Files</a>",
        "<br/>";

        if(isset($objects['Contents'])) {
          foreach ($objects['Contents'] as $object) {

            $file_name = $object['Key'];

            echo $file_name,
            " - <a href='delete_files.php?bucket_name=$bucket_name&file_name=$file_name'>Delete File</a>",
            "<br/>";
          }

        }
        echo "<hr/>";

    }

?>

  <a href="create_bucket.php">Create a new Bucket</a>
</div>
