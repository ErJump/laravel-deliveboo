<template>
    <div>
        <MainJumbotron class="mb-5"/>
        <div class="container-lg ">
            <div class="row justify-content-center mb-5">
                <div class="col-2 rounded p-4 m-2 text-center" v-for="typology in typologiesArray" :key="typology.id">
                    <h6 class="text-white">{{capitalizeFirstLetter(typology.name)}}</h6>
                </div>
            </div>
            <div class="row">
                <RestaurantCard v-for="restaurant in restaurants" :key="restaurant.id" :restaurant="restaurant" />
            </div>
        </div>  
    </div>
</template>

<script>

import axios from 'axios';
import RestaurantCard from '../components/RestaurantCard.vue';
import MainJumbotron from '../components/MainJumbotron.vue';

export default {
    name: 'HomePage',
    components: {
    RestaurantCard,
    MainJumbotron
},
    data() {
        return {
            restaurantsUrl: 'http://localhost:8000/api/users',
            typologiesUrl: 'http://localhost:8000/api/typologies',
            restaurants: [],
            typologiesArray: [],
            typologies: [],
        }
    },
    methods: {
        //prende la lista di tutti i ristoranti
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    console.log(this.restaurants)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        //prende la lista di tutte le tipologie
        getTypologies() {
            axios.get(this.typologiesUrl)
                .then(response => {
                    this.typologiesArray = response.data.results.data;
                    console.log(this.typologiesArray)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        //rende la prima lettera maiuscola
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
    },
    created() {
        this.getRestaurants(),
        this.getTypologies()
    }
}
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

div.col-2{
    background-color: $secondary-color;
    h6{
        line-height: 20px;
    }
}

</style>