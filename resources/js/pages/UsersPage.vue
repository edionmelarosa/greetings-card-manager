<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Users Lists</div>

            <div class="card-body">
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Numbers of Card Sent</th>
                        <th scope="col">Numbers of Card Received</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark James</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark James</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark James</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark James</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark James</td>
                        <td>@mdo</td>
                        <td>1</td>
                        <td>20</td>
                    </tr>
                </tbody>
                </table>
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
                users: []
            }
        },

        async created () {
            try {
                let users =  await otherUsers();
                this.users = users.data;
            } catch (error) {
                notify_error(error_processing_message())
            }
        }
    }
</script>
