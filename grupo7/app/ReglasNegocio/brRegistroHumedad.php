<?php

require_once realpath(__DIR__.'/../bdconfig/Config.php');
require_once realpath(__DIR__.'/../AccesoDatos/daRegistroHumedad.php');
require_once realpath(__DIR__.'/../aws/aws-autoloader.php') ;
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

//Create a S3Client
$s3 = new Aws\S3\S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region' => 'us-east-2'
]);


class brRegistroHumedad {

    public function InsertarLectura($params) {
        $id = false;
        try {
            $con = new mysqli(CONNECTION_HOST, CONNECTION_USER, CONNECTION_PASSWORD, CONNECTION_BD);
            $odaRegistroHumedad = new daRegistroHumedad();
            $id = $odaRegistroHumedad->InsertarLectura($con,$params);
            $con->close();
        } catch (Exception $error) {
            return $error;
        }
        return $id;
    }

}
