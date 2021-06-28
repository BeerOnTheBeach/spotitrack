<?php
require '../../../vendor/autoload.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();

// Fetch the saved access token from session
session_start();
$accessToken = $_SESSION['accessToken'];
$api->setAccessToken($accessToken);

// It's now possible to request data about the currently authenticated user
echo json_encode($api->me());
