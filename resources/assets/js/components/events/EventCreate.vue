<template>
    <form method="post" @submit.prevent="onSubmit">
        <div class="modal-content">
            <h4>Create an Event</h4>
            <div class="divider"></div>
            <br>
            <div class="row">
                <div class="input-field col s6">
                    <input v-model="event.name" type="text" class="validate" required>
                    <label>Event Name</label>
                </div>
                <div class="input-field col s6">
                    <input v-model="event.location" type="text" class="validate" required>
                    <label>Location</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <datetime type="datetime" v-model="event.date_start" use12-hour required></datetime>
                    <label class="active">Date Start</label>
                </div>
                <div class="input-field col s6">
                    <datetime type="datetime" v-model="event.date_end" use12-hour required></datetime>
                    <label class="active">Date End</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea validate" v-model="event.description" required></textarea>
                    <label>About the Event</label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action waves-effect btn-flat">CREATE</button>
            <a class="modal-action modal-close waves-effect btn-flat">CANCEL</a>
        </div>
    </form>
</template>

<script>
    export default {
        
        data() {
            return {
                loading: false,
                post: null,
                error: null,
                event: {
                    name: null,
                    picturel_url: '.',
                    location: null,
                    description: null,
                    date_start: null,
                    date_end: null,
                },
            }
        },
        methods: {
            onSubmit() {
                  //2018-04-18 20:43:20
                this.loading = true;
                this.event.date_start = this.moment(this.event.date_start).format('YYYY-MM-DD HH:MM:ss');
                this.event.date_end = this.moment(this.event.date_end).format('YYYY-MM-DD HH:MM:ss');
                console.log(this.event);
                axios.post('events', this.event).then(response => {
                    $('#create-event-modal').modal('close');
                    this.loading = false
                });
            },

        }
    }
</script>