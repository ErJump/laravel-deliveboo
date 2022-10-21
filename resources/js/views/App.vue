<template>
    <div id="app">
        <MainHeader />
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