<template>
    <div id="event">
        <div class="slider">
            <ul class="slides relative">
                <li>
                    <img src="https://cdn.allwallpaper.in/wallpapers/2400x1350/8754/music-concert-2400x1350-wallpaper.jpg">
                </li>
                <li>
                    <img src="https://www.artsfon.com/pic/201510/1920x1080/artsfon.com-73885.jpg">
                </li>
            </ul>
            <div class="container">
                <div class="float-above-slider">
                    <a class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="right" data-delay="50" data-tooltip="Create an Event!">
                        <i class="mdi mdi-playlist-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="progress" v-if="loading">
                <div class="indeterminate"></div>
            </div>
            <div class="row event-list" v-for="event in events" :key="event.id">
                <div class="col s12">
                    <div class="card horizontal">
                        <div class="card-image">
                            <img class="img-cover" src="http://via.placeholder.com/350x300/3F51B5/FFFFFF/?text=Place+Holder">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <div class="row no-margin-bot">
                                    <div class="col s12">
                                        <span class="card-title indigo-text">{{event.name}}</span>
                                    </div>
                                </div>
                                <div class="row no-margin-bot">
                                    <div class="col s12">
                                        <span>
                                            <i class="mdi mdi-map-marker"></i> Location: {{event.location}}</span>
                                    </div>
                                </div>
                                <div class="row no-margin-bot">
                                    <div class="col s6">
                                        <span>
                                            <i class="mdi mdi-calendar-range"></i> Date Start: {{event.date_start}}</span>
                                    </div>
                                    <div class="col s6 right-align">
                                        <span>
                                            <i class="mdi mdi-calendar-range"></i> Date End: {{event.date_end}}</span>
                                    </div>
                                </div>
                                <h5>About the Event</h5>
                                <p>{{event.description}}</p>
                            </div>
                            <div class="card-action right-align">
                                <a href="#" class="pink-text">
                                    <i class="mdi mdi-account-plus"></i> REGISTER GUEST</a>
                                <a href="#" class="pink-text">
                                    <i class="mdi mdi-square-edit-outline"></i> EDIT EVENT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                post: null,
                error: null,
                events: [],
            }
        },
        created() {
            // fetch the data when the view is created and the data is
            // already being observed
            this.fetchEvents()
        },
        watch: {
            // call again the method if the route changes
            '$route': 'fetchEvents'
        },

        methods: {
            fetchEvents() {
                this.loading = true;
                axios.get('events').then(response => {
                    this.loading = false
                    this.events = response.data;
                });
            },
            // fetchData() {
            //     this.error = this.event = null
            //     this.loading = true
            //     // replace `getPost` with your data fetching util / API wrapper
            //     event.index((err, post) => {
            //         this.loading = false
            //         if (err) {
            //             this.error = err.toString()
            //         } else {
            //             this.event = event
            //         }
            //     })
            // },

        }
    }
</script>