<?php
require '../../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'a1754536c44c462b97ac8cd3c2f82bf7',
    '1dde07c34de448e4a5bd27c7717100b1',
    $_SERVER['HTTP_HOST'] . "/spotitrack/public/api/callback.php"
);

session_start();

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);

$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a session for example
$_SESSION['accessToken'] = $accessToken;
$_SESSION['refreshToken'] = $refreshToken;

// Send the user along and fetch some data!
header('Location: ../index.php');
die();