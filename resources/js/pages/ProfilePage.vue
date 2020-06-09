<template>
    <div class="col-md-10">
            <div class="card">
                <div class="card-header">Profile Page</div>

                <div class="card-body">
                    <p>{{user.name}}</p>
                    <p>{{user.email}}</p>
                    <strong>Number of Cards Sent</strong>
                    <p>{{user.number_of_cards_sent}}</p>
                    <strong>Number of Cards Received</strong>
                    <p>{{user.number_of_cards_received}}</p>
                </div>
            </div>
        </div>
</template>

<script>
    import {profile} from '../http';
    export default {
        name: 'ProfilePage',

        data () {
            return {
                user: [],
                loading: false
            }
        },

        async created () {
            this.loading = true;

            try {
                let user =  await profile();
                this.user = user.data;

                this.loading = false;
            } catch (error) {
                this.loading = false;
                notify_error(error_processing_message())
            }
        }
    }
</script>
