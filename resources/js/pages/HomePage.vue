<template>
    <div>
        <MainJumbotron class="mb-5"/>
        <div class="container-lg">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center mb-4">Scegli la categoria</h2>
                </div>
                <div class="col-12">
                    <div class="d-flex filter-categories">
                        <div 
                            class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3" 
                            v-for="typology in typologiesArray" :key="typology.id" 
                            @click="toggleTypologies(typology.id, typology.name), getFilteredTypologies()">
                            <div class="card text-center filter-card" :class="typology.name">
                                <div class="filter-img">
                                    <img class="card-img-top" :src="typology.image" :alt="typology.name">
                                </div>
                                <h6 class="my-3">{{capitalizeFirstLetter(typology.name)}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="restaurants-list"></div>
            <div v-if="typologies.length == 0" class="row mb-5">
                <div 
                    class="col-12 col-sm-6 col-lg-4 mb-4"
                    v-for="restaurant in restaurants" :key="restaurant.id" 
                >
                    <RestaurantCard :restaurant="restaurant"/>
                </div>
                <div class="col-12 text-center my-2">
                    <a class="btn text-white ms_btn_secondary" v-if="nextPageUrl != ''" @click="getNewRestaurantPage()">Carica altri ristoranti</a>
                </div>
            </div>
            <div v-else class="row">
                <div class="col-12">
                    <h3 class="mb-3"><strong v-for="typology in typologies" :key="typology.id">{{capitalizeFirstLetter(getTypologyName(typology))}} </strong></h3>
                </div>
                <div v-if="filteredRestaurants.length == 0"  class="col-12 mb-5">
                    <h6 class="col-12">Non ci sono ristoranti per questa tipologia</h6>
                </div>
                <div v-else class="col-12 col-sm-6 col-lg-4 mb-5" v-for="filteredRestaurant in filteredRestaurants" :key="filteredRestaurant.id">
                    <RestaurantCard :restaurant="filteredRestaurant" />
                </div>
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
            filteredTypologiesUrl: 'http://localhost:8000/api/search',
            restaurants: [],
            typologiesArray: [],
            typologies: [],
            filteredRestaurants: [],
            activePage: 0,
            nextPageUrl: '',
        }
    },
    methods: {
        //prende la lista di tutti i ristoranti
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    this.nextPageUrl = response.data.results.next_page_url;
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
                this.filteredRestaurants = response.data.results.data;
                console.log('ristoranti filtrati: ' + this.filteredRestaurants)
                console.log('typologies: ' + this.typologies)
            })
            .catch(error => {
                console.log(error)
            })
        },
        //carica i ristoranti successivi
        getNewRestaurantPage(){
            axios.get(this.nextPageUrl)
                .then(response => {
                    this.restaurants = this.restaurants.concat(response.data.results.data);
                    if(response.data.results.next_page_url != null) {
                        this.nextPageUrl = response.data.results.next_page_url;
                    } else {
                        this.nextPageUrl = '';
                    }
                    console.log('Url nuova pagina: ' + this.nextPageUrl);
                })
                .catch(error => {
                    console.log(error)
                })
        },
        //converte l'id di una tipologia nel suo nome
        getTypologyName(typologyID) {
            let typologyName = '';
            this.typologiesArray.forEach(typology => {
                if(typology.id == typologyID) {
                    typologyName = typology.name;
                }
            });
            return typologyName;
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


.filter-img {
    height: 100px;
    width: 100%;

    img {
        height: 100%;
        width:100%;
        object-fit: cover;
    }
}

.filter-card{
    &:hover {
        cursor: pointer;
    }
}

.active{
    border: 5px solid $primary-color;
}

.card {

    &:hover {
        cursor: pointer;
    }
}


/* breakpoints classes */


@media only screen and (max-width: 768px) {
    .filter-categories{
      overflow-y: auto;
    }
}
@media only screen and (min-width: 769px) {
    .filter-categories{
      overflow-y: none;
      flex-wrap: wrap;
    }
}
</style>