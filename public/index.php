<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spoti-Track</title>

    <link href="./assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="./assets/common/css/main.css" rel="stylesheet"/>
    <script src="./assets/lib/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./assets/lib/vue/vue.js"></script>
    <script src="./assets/lib/vue/axois.js"></script>
</head>
<body>
<div id="spotitrack" class="container">
    <a class="btn btn-primary float-end" href="./api/auth.php">Login with Spotify</a>
    <div class="user-container">
        <div class="user">Logged in as:
            <a :href="'https://open.spotify.com/user/' + user.display_name" target="_blank">
                {{user.display_name}}
            </a>
        </div>
    </div>
    <div class="song-container">
        <div class="song-name">
            You are currently hearing: {{currentSong.name}} - <span v-for="artist in currentSong.artists">{{artist.name}} </span>
        </div>
    </div>
</div>

<script src="./vue/index.js"></script>
</body>
</html>

