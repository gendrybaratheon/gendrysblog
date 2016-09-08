<template>
    <div id="wrapper">

        <navbar></navbar>
        <sidebar></sidebar>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="content-header">
                    <h4>后台管理<span>Everything is here</span></h4>
                </div>
                <div class="content">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Navbar from './components/layouts/Navbar.vue'
    import Sidebar from './components/layouts/Sidebar.vue'

    export default {
        components: { Navbar, Sidebar },
        replace: false
    }
</script>