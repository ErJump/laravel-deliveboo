<template>
    <div id="app">
        <MainHeader />
        <ul>
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
        </ul>
        <router-view></router-view>
        <MainFooter />
    </div>
</template>

<script>
import MainHeader from '../components/MainHeader.vue';
import MainFooter from '../components/MainFooter.vue';

export default {
    name: 'App',
    components: {
    MainHeader,
    MainFooter
}
}
</script>

<style scoped lang="scss">

</style>