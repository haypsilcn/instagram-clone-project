<template>
<!--    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div>
        <div class="ps-4">
            <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                    this.status = !this.status
                    console.log(response.data);
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = '/login'
                    }
                })
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Following' : 'Follow'
            }
        }
    }
</script>
