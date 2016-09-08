<template>
    <nav class="navbar navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Admin Dashboard</a>
        </div>
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ user.name }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        created () {
            this.fetchUser()
        },
        data () {
            return {
                user: {}
            }
        },
        methods: {
            fetchUser () {
                this.$http({ url: '/api/getUser', method: 'GET' })
                        .then(function (response) {
                            this.$set('user', response.data)
                        })
            }
        }
    }
</script>