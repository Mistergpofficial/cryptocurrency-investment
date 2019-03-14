<!--
<template>
    <div class="box">

        &lt;!&ndash; /.box-header &ndash;&gt;
        <div class="box-body table-responsive no-padding">
            &lt;!&ndash; <p id="alert">Invoice submitted </p>   &ndash;&gt;
            <table class="table table-hover">
                <tbody><tr >
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>USERNAME</th>
                    <th>BITCOIN WALLET</th>
                    <th>COUNTRY</th>
                    <th>STATE</th>
                    <th>AVATAR</th>
                    <th>JOINED DATE</th>
                    <th>STATUS</th>

                </tr>


                <tr v-for="user in users">
                    <td>{{ user.full_name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.username }}</td>
                    <td>{{ user.btc }}</td>
                    <td>{{ user.country }}</td>
                    <td>{{ user.state }}</td>
                    <td><img :src="'http://localhost:8000/crypto_images/' + user.pro_pic" style="width:40px; height:50px;"></td>
                    <td>{{ user.created_at| formatDate }}</td>
                </tr>




                </tbody>
            </table>
        </div>&lt;!&ndash;
        <div class="pagination">
            <button class="btn btn-default" @click="allUsers(pagination.prev_page_url)"
                    :disabled="!pagination.prev_page_url">
                Previous
            </button>
            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
            <button class="btn btn-default" @click="allUsers(pagination.next_page_url)"
                    :disabled="!pagination.next_page_url">Next
            </button>
        </div>&ndash;&gt;
        &lt;!&ndash; /.box-body &ndash;&gt;
    </div>

</template>

<script>
    import {allUsers} from '../utilities/settings'
    export default {
        data () {
            return {
                users: {},
             //   pagination: {}

            }
        },

        created () {
            this.allUsers();
           // this.makePagination()

        },


        methods: {
            allUsers() {
                this.$http.get(allUsers)
                    .then(function (response) {
                    this.users = response.body
                    })
                    .catch( (err) => {

                    })
            }
          /*  makePagination() {
                    let pagination = {
                        current_page: data.current_page,
                        last_page: data.last_page,
                        next_page_url: data.next_page_url,
                        prev_page_url: data.prev_page_url
                    }
                    this.$set('pagination', pagination)
                }
*/
        }
    }
</script>-->
