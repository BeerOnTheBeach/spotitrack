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
        setInterval(this.getCurrentSong(),1000)
    },
    methods: {
        getCurrentSong() {
            axios.get('./api/account/currentSong.php')
                .then(function (response) {
                    app.currentSong = response['data']['item']
                    console.log(app.currentSong)
                })
                .catch(function (error) {
                    console.error(error)
                });
        }
    }
})