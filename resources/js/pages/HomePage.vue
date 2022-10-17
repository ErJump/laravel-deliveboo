<template>
    <div>
        <h1>Home Page</h1>
        <div class="container-lg">
            <div class="row">
                <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant" />
            </div>
        </div>  
    </div>
</template>

<script>

import axios from 'axios';
import RestaurantCard from '../components/RestaurantCard.vue';

export default {
    name: 'HomePage',
    components: {
    RestaurantCard
},
    data() {
        return {
            restaurantsUrl: 'http://localhost:8000/api/users',
            restaurants: [],
            typologiesArray: [],
            typologies: [],
        }
    },
    methods: {
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    console.log(this.restaurants)
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