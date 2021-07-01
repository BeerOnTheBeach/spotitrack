<?php
require '../../vendor/autoload.php';

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $redirectUri = "http://" . $_SERVER['HTTP_HOST'] . "/spotitrack/public/api/callback.php";
} else {
    $redirectUri = "http://" . $_SERVER['HTTP_HOST'] . "/public/api/callback.php";
}

$session = new SpotifyWebAPI\Session(
    'a1754536c44c462b97ac8cd3c2f82bf7',
    '1dde07c34de448e4a5bd27c7717100b1',
    $redirectUri
);

$api = new SpotifyWebAPI\SpotifyWebAPI();

if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->me());
} else {
    $options = [
        'scope' => [
            'user-read-email',
            'user-read-recently-played',
            'user-read-playback-state',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die;
}