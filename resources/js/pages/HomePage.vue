<template>
    <div>
        <MainJumbotron class="mb-5"/>
        <div class="container-lg ">
            <div class="row justify-content-center mb-5">
                <div 
                    class="col-2 rounded p-4 m-2 text-center" 
                    v-for="typology in typologiesArray" :key="typology.id" 
                    :class="typology.name"
                    @click="toggleTypologies(typology.id, typology.name), getFilteredTypologies()"
                >
                    <h6 class="text-white mb-0">{{capitalizeFirstLetter(typology.name)}}</h6>
                </div>
            </div>
            <div v-if="typologies.length == 0" class="row" id="restaurants-list">
                <div 
                    class="col-lg-4"
                    v-for="restaurant in restaurants" :key="restaurant.id" 
                >
                    <RestaurantCard :restaurant="restaurant"/>
                </div>
            </div>
            <div v-else class="row" v-for="typology in filteredRestaurants" :key="typology.id">
                <h4 class="mb-3"><strong>{{capitalizeFirstLetter(typology.name)}}</strong></h4>
                <h6 v-if="typology.users.length == 0" class="col-12">Non ci sono ristoranti per questa tipologia</h6>
                <RestaurantCard v-for="restaurant in typology.users" :key="restaurant.id" :restaurant="restaurant" />
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
            filteredTypologiesUrl: 'http://localhost:8000/api/typologies/search',
            restaurants: [],
            typologiesArray: [],
            typologies: [],
            filteredRestaurants: [],
        }
    },
    methods: {
        //prende la lista di tutti i ristoranti
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    //console.log(this.restaurants)
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
                    //console.log(this.typologiesArray)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        //rende la prima lettera maiuscola
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        //agiunge e rimuove le tipologies selezionate dall'array typologies
        toggleTypologies(typologyID, typologyName) {
            if(this.typologies.includes(typologyID)) {
                this.typologies = this.typologies.filter(typology => typology !== typologyID);
                //rimuove la classe active dall'elemento
                document.querySelector(`.${typologyName}`).classList.remove('active');
            } else {
                this.typologies.push(typologyID);
                //agiunge la classe active
                document.querySelector(`.${typologyName}`).classList.add('active');
            }
        },
        //popola l'array filteredRestaurants con i ristoranti filtrati per tipologia attraverso chiamata axios
        getFilteredTypologies(){
            axios.get(this.filteredTypologiesUrl, {
                params: {
                    typologies: this.typologies
                }
            })
            .then(response => {
                this.filteredRestaurants = response.data.results;
                console.log(this.filteredRestaurants)
            })
            .catch(error => {
                console.log(error)
            })
        }
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

.active{
    border: 5px solid $primary-color;
}

</style>