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
                            class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3 "
                            v-for="typology in typologiesArray" :key="typology.id" 
                            @click="toggleTypologies(typology.id, typology.name), getFilteredTypologies()">
                            <div class="card text-center filter-card ms_typology_card" :class="typology.name">
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
                    <small v-else>Non ci sono altri ristoranti da caricare</small>
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
                <div v-if="filteredRestaurants.length != 0" class="col-12 text-center mb-5">
                    <a class="btn text-white ms_btn_secondary" v-if="nextPageUrlFiltered != ''" @click="getNewFilteredRestaurantPage()">Carica altri ristoranti</a>
                    <small v-else>Non ci sono altri ristoranti da caricare</small>
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
            nextPageUrl: '',
            nextPageUrlFiltered: '',
        }
    },
    methods: {
        //prende la lista di tutti i ristoranti
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    this.nextPageUrl = response.data.results.next_page_url;
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
                if(response.data.results.next_page_url != null) {
                        this.nextPageUrlFiltered = response.data.results.next_page_url;
                    } else {
                        this.nextPageUrlFiltered = '';
                    }
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
                    //console.log('Url nuova pagina: ' + this.nextPageUrl);
                })
                .catch(error => {
                    console.log(error)
                })
        },
        //carica i ristoranti successivi filtrati
        getNewFilteredRestaurantPage(){
            axios.get(this.nextPageUrlFiltered, {
                params: {
                    typologies: this.typologies
                }
            })
                .then(response => {
                    this.filteredRestaurants = this.filteredRestaurants.concat(response.data.results.data);
                    if(response.data.results.next_page_url != null) {
                        this.nextPageUrlFiltered = response.data.results.next_page_url;
                    } else {
                        this.nextPageUrlFiltered = '';
                    }
                    console.log('Url nuova pagina: ' + this.nextPageUrlFiltered);
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

.ms_typology_card{
    border: 4px solid #f8fafc;
    div>img{
        filter: grayscale(70%);
        transition: all 0.1s ease-in-out;
    }
    &:hover div>img{
        filter: grayscale(0%);
    }
    h6{
        transition: all ;
    }
    &:hover h6{
        color: $primary-color;
    }
    &:hover{
        border: 4px solid $secondary-color;
    }
}


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

.card {

    &:hover {
        cursor: pointer;
    }
}

/* Animazioni */

/* ----------------------------------------------
 * Generated by Animista on 2022-10-20 15:28:18
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */
.active {
    border: 4px solid $secondary-color;
    div>img {
        filter: grayscale(0);  
    };
    h6 {
        color: $primary-color;
    };
    -webkit-animation: flip-horizontal-bottom .4s cubic-bezier(.455,.03,.515,.955) both;
    animation: flip-horizontal-bottom .4s cubic-bezier(.455,.03,.515,.955) both;
}

/* ----------------------------------------------
 * Generated by Animista on 2022-10-20 15:46:34
 * Licensed under FreeBSD License.
 * See http://animista.net/license for more info. 
 * w: http://animista.net, t: @cssanimista
 * ---------------------------------------------- */

 @-webkit-keyframes flip-horizontal-bottom{0%{-webkit-transform:rotateX(0);transform:rotateX(0)}100%{-webkit-transform:rotateX(-360deg);transform:rotateX(-360deg)}}
 @keyframes flip-horizontal-bottom{0%{-webkit-transform:rotateX(0);transform:rotateX(0)}100%{-webkit-transform:rotateX(-360deg);transform:rotateX(-360deg)}}


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