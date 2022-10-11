<template>
    <div id="app">
        <ul>
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
        </ul>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',

}
</script>

<style scoped lang="scss">

</style>