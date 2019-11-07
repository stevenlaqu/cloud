<?php
 require_once realpath(__DIR__.'/../aws/aws-autoloader.php');

use Aws\S3\S3Client;
    use Aws\Credentials\CredentialProvider;
    use Aws\S3\Exception\S3Exception;

    $profile = 'default';
    $path = realpath(__DIR__.'/../ReglasNegocio/credentials.ini');

    $provider = CredentialProvider::ini($profile, $path);
    $provider = CredentialProvider::memoize($provider);

    $s3Client = new S3Client([
        'region'      => 'us-west-1',
        'version'     => 'latest',
        'credentials' => $provider
    ]);
 ?>
