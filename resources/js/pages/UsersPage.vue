<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Users Lists</div>

            <div class="card-body">
                <table 
                    class="table table-striped"
                    v-if="users.length > 0">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Numbers of Card Sent</th>
                        <th scope="col">Numbers of Card Received</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" :key="index">
                        <th scope="row">{{user.id}}</th>
                        <td>{{user.name}}</td>
                        <td>{{user.number_of_cards_sent}}</td>
                        <td>{{user.number_of_cards_received}}</td>
                    </tr>
                </tbody>
                </table>
                <span v-if="loading">Loading users...</span>
                <span v-if="users.length <= 0 && !loading">No users found!</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {otherUsers} from '../http';

    export default {
        name: 'UsersPage',

        data () {
            return {
                users: [],
                loading: false
            }
        },

        async created () {
            this.loading = true;

            try {
                let users =  await otherUsers();
                this.users = users.data;

                this.loading = false;
            } catch (error) {
                this.loading = false;
                notify_error(error_processing_message())
            }
        }
    }
</script>
