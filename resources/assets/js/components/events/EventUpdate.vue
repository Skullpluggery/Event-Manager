<template>
    <form method="post" @submit.prevent="onSubmit">
        <div class="modal-content">
            <h4>Update an Event</h4>
            <div class="divider"></div>
            <br>
            <div class="row">
                <div class="input-field col s6">
                    <input v-model="event.name" type="text" class="validate" required>
                    <label class="active">Event Name</label>
                </div>
                <div class="input-field col s6">
                    <input v-model="event.location" type="text" class="validate" required>
                    <label class="active">Location</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <datetime type="datetime" :value="event.date_start" use12-hour required auto></datetime>
                    <label class="active">Date Start</label>
                </div>
                <div class="input-field col s6">
                    <datetime type="datetime" :value="event.date_end" use12-hour required auto></datetime>
                    <label class="active">Date End</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea validate" v-model="event.description" required></textarea>
                    <label class="active">About the Event</label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <div class="row no-margin-bot">
                <div class="col s6 left-align">
                    <button v-on:click="deleteEvent()" type="button" class="modal-action waves-effect btn-flat red-text">DELETE</button>
                </div>
                <div class="col s6  right-align">
                    <button type="submit" class="modal-action waves-effect btn-flat pink-text">UPDATE</button>
                    <button v-on:click="onClose()" class="modal-action modal-close waves-effect btn-flat">CANCEL</button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
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
        created() {
            this.getEvent()
        },
        watch: {
            '$route' (to, from) {
                this.getEvent()
            }
        },
        methods: {
            onSubmit() {
                this.event.date_start = this.moment(this.event.date_start).format('YYYY-MM-DD HH:MM:ss');
                this.event.date_end = this.moment(this.event.date_end).format('YYYY-MM-DD HH:MM:ss');
                console.log(this.event);
                axios.put('events/'+this.id, this.event).then(response => {
                    this.onClose();
                });
            },
            onClose() {
                $('#event-modal').modal('close');
                this.$router.push('/');
            },
            getEvent() {
                axios.get('events/' + this.id).then(response => {
                    console.log(this.event);
                    this.event = response.data;
                });
            },
            deleteEvent() {
                axios.delete('events/' + this.id).then(response => {
                    this.onClose();
                });
            },

        }
    }
</script>