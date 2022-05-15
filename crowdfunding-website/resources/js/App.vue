<template>
    <div class="wrapper">
        <router-link to="/">Home</router-link>
        <router-link to="/donations">Donations</router-link>
        <router-link to="/blogs">Blogs</router-link>
        <div class="content-wrapper">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            console.log('Component mounted.')
        }
    }
</script>