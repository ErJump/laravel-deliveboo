<template>
    <section class="container-lg pt-5">
        <div class="row mb-5">
            <div class="col-12 col-md-4 mb-5">
                <img v-if="cutImageString(restaurant.image)" class="card-img-top" :src="'/storage/' + plate.image" alt="immagine_interna"></img>
                <img v-else class="w-100 rounded-lg" :src="restaurant.image" alt="image">
            </div>
            <div class="col-12 col-md-8">
                <h3 class="font-weight-bold">{{ restaurant.name }}</h3>
                <h5 class="mb-3">
                    <span v-for="typology in restaurant.typologies" :key="typology.id">{{ capitalizeFirstLetter(typology.name) }} </span>
                </h5>
                <p>
                    {{ restaurant.description }}
                </p>
                <div>
                    <i class="fa-solid fa-phone"></i>
                    <span>
                        {{ restaurant.phone_number}}
                    </span>
                </div>
                <div>
                    <i class="fa-solid fa-location-dot"></i>
                    <span>
                        {{ restaurant.address}}
                    </span>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3>Menu</h3>
                    </div>
                    <div class="col-12 col-md-6 mb-4"  v-for="plate in platesArray" :key="plate.id" >
                        <div class="card h-100 rounded" :class="plate.availability ? '' : 'ms_not_available'">
                            <img v-if="plate.image == null" class="card-img-top" src="/assets/images/food-placeholder.png" alt="placeholder">
                            <img v-else-if="cutImageString(plate.image)" class="card-img-top" :src="'/storage/' + plate.image" alt="immagine_interna">
                            <img v-else class="card-img-top" :src="plate.image" alt="immagine_url">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{plate.name}}</h5>
                                <p class="card-subtitle text-muted mb-3">{{plate.description}}</p>
                                <p class="card-subtitle text-muted mb-3"><strong>Ingredienti: </strong>{{plate.ingredients}}</p>
                                <span v-if="plate.discount > 0" class="card-subtitle mb-3 d-block">{{plate.discount}}% di sconto</span>
                                <div class="d-flex g-3">
                                    <span v-if="plate.discount > 0" class="card-subtitle mb-3 d-block text-muted mr-3"><s>{{plate.price}}€</s></span>
                                    <strong class="card-subtitle mb-3 d-block">{{plate.price - (plate.price * plate.discount / 100)}}€</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3>Carrello</h3>
                    </div>
                    <div class="col-12">
                        <div class="card h-100 rounded">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">Ciao</h5>
                                <p class="card-subtitle text-muted mb-3">Io sono un carrello</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: 'RestaurantShow',

    data() {
        return {
            restaurant:[],
            platesArray:[],
        }
    },
    
    methods:{
        getRestaurantDetail(){
            const id=this.$route.params.id;
           
            axios.get(`http://localhost:8000/api/users/${id}`)
                .then(response => {
                    this.restaurant = response.data.results;
                    this.platesArray = response.data.results.plates;
                    console.log(this.restaurant, this.platesArray);
                })
                .catch(error => {
                    console.log(error);
                })
        
        },
        urlValidationFunction(image){
            image.startsWith("https");
            return true;
        },
        cutImageString(image){
            if(image.startsWith("uploads/")){
                return image.split('uploads/').pop()
            }
            return false
        },
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
    },
    created(){
        this.getRestaurantDetail();
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

/* *{
    outline: 1px solid blue;
} */

div.card.h-100{
    cursor: pointer;
}
.ms_not_available{
    filter: grayscale(100%);
    opacity: 0.5;
    cursor: default !important;
}
</style>