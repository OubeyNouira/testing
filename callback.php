<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>
<body>
<?php
require_once __DIR__ . '/vendor/autoload.php'; // Change path as needed

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

$fb = new Facebook([
  'app_id' => '1675144776566721', // Replace with your app id
  'app_secret' => '06c478ee7d7bdee6c49e0d00f3727357', // Replace with your app secret
  'default_graph_version' => 'v2.10',
]);

// Use a try-catch block to handle errors
try {
  // Get the Facebook\GraphNodes\GraphUser object for the current user
  $response = $fb->get('/me', 'YOUR_ACCESS_TOKEN'); // Replace with your access token
  $user = $response->getGraphUser();
  echo 'Name: ' . $user['name'];
} catch (FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  
}