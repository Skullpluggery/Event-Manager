<template>
    <div>
        <div class="slider">
            <ul class="slides relative">
                <li>
                    <img src="https://cdn.allwallpaper.in/wallpapers/2400x1350/8754/music-concert-2400x1350-wallpaper.jpg">
                    <div class="caption left-align">
                        <h3 class="headline">MANAGE YOUR EVENTS EASILY!</h3>
                    </div>
                </li>
                <li>
                    <img src="https://www.artsfon.com/pic/201510/1920x1080/artsfon.com-73885.jpg">
                    <div class="caption left-align">
                        <h3 class="headline">AND TAKE CARE OF YOUR VIP GUESTS!</h3>
                    </div>
                </li>
            </ul>
            <div class="container">
                <div class="float-above-slider">
                    <button v-on:click="createModal()" class="btn-floating btn-large waves-effect waves-light tooltipped" data-position="right"
                        data-delay="50" data-tooltip="Create an Event!"> 
                        <i class="mdi mdi-playlist-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container event-section">
            <div class="progress" v-if="loading">
                <div class="indeterminate"></div>
            </div>
            <div class="row no-margin-bot" v-for="event in events" :key="event.id">
                <div class="col s12">
                    <div class="card responsive-horizontal">
                        <div class="card-image">
                            <img class="img-cover" src="http://via.placeholder.com/350x300/3F51B5/FFFFFF/?text=Image+Holder">
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
                                    <div class="col s12">
                                        <span>
                                            <i class="mdi mdi-calendar-range"></i> Date: {{moment(event.date_start).format('MMMM DD, YYYY h:mm A')}} — {{moment(event.date_end).format('MMMM DD, YYYY h:mm A')}}</span>
                                    </div>
                                </div>
                                <h5>About the Event</h5>
                                <p>{{event.description}}</p>
                            </div>
                            <div class="card-action right-align">
                                <a class="pink-text">
                                    <i class="mdi mdi-account-plus"></i> REGISTER VIP GUEST</a>
                                <button v-on:click="updateModal()" class="pink-text btn-flat">
                                    <i class="mdi mdi-square-edit-outline"></i> EDIT EVENT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="event-modal" class="modal modal-fixed-footer">
            <router-view></router-view>
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
            '$route' (to, from) {
                this.fetchEvents()
            }
        },

        methods: {
            createModal(){
                $('#event-modal').modal('open');
                this.$router.push('/event/create');
            },
            updateModal(){
                $('#event-modal').modal('open');
                this.$router.push('/event/update');
            },
            fetchEvents() {
                this.loading = true;
                axios.get('events').then(response => {
                    this.loading = false
                    this.events = response.data;
                });
            }
        }
    }
</script>