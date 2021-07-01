const app = new Vue({
    el: ('#spotitrack'),
    data: {
        user: "",
        currentSong: ""
    },
    created() {
        //get user-data
        axios.get('./api/account/user.php')
            .then(function (response) {
                app.user = response['data']
            })
            .catch(function (error) {
                console.error(error)
            });
        //Get current song
        axios.get('./api/account/currentSong.php')
            .then(function (response) {
                app.currentSong = response['data']
            })
            .catch(function (error) {
                console.error(error)
            });
        //Start current song getter interval
        this.getCurrentSong()
    },
    methods: {
        getCurrentSong() {
            setInterval(() => {
                axios.get('./api/account/currentSong.php')
                    .then(function (response) {
                        app.currentSong = response['data']
                    })
                    .catch(function (error) {
                        console.error(error)
                    });
            }, 2000)
        }
    }
})