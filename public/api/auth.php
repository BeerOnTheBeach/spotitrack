<?php
require '../../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    'a1754536c44c462b97ac8cd3c2f82bf7',
    '1dde07c34de448e4a5bd27c7717100b1',
    'http://beeronthebeach.de/spotitrack/public/api/callback.php'
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