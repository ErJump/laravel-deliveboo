<template>
    <div>
        <h1>Home Page</h1>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: 'HomePage',
    components: {
        
    },
    data() {
        return {
            restaurantsUrl: 'http://localhost:8000/api/users',
            users: [],
            typologies: [],
        }
    },
    methods: {
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.users = response.data.results.data;
                    console.log(this.users)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getRestaurants()
    }
}
</script>

<style scoped lang="scss">

</style>