<template>
    <section class="container-lg pt-5">
        <div class="row mb-5">
            <div class="col-12 col-md-4 mb-5">
                <img v-if="cutImageString(restaurant.image)" class="card-img-top" :src="'/storage/' + restaurant.image" alt="immagine_interna">
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
                <div v-if="platesArray.length > 0" class="row">
                    <div class="col-12 mb-3">
                        <h3>Menu</h3>
                    </div>
                    <div class="col-12 col-md-6 mb-4"  v-for="plate in platesArray" :key="plate.id" >
                        <div @click="[plate.availability == 1 ? addToCart(plate) : '']" class="card h-100 rounded" :class="plate.availability ? '' : 'ms_not_available'">
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
                                    <strong class="card-subtitle mb-3 d-block">{{floatPrice(plate.price - (plate.price * plate.discount / 100))}}€</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else-if="platesArray == 0">
                    <h3>Questo ristorante non ha ancora inserito il suo menu</h3>
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
                                <!-- <h5 class="card-title font-weight-bold">Il carrello è vuoto</h5> -->
                                <!-- <p class="card-subtitle text-muted mb-3">Io sono un carrello</p> -->

                                <table class="table mb-4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Prezzo</th>
                                            <th scope="col">Rimuovi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(plate, index) in cart" :key="index">
                                            <td>{{ plate.name }}</td>
                                            <td>€ {{floatPrice(plate.price - (plate.price * plate.discount / 100))}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" @click="removeFromCart(plate)">
                                                    Rimuovi
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Totale</th>
                                            <td>€ {{ floatPrice(total) }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>

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
            cart: [],
            plateIdsArray: [],
            total: 0,
            restaurantId: null,
        }
    },
    
    methods:{
        getRestaurantDetail(){
            const id=this.$route.params.id;
           
            axios.get(`http://localhost:8000/api/users/${id}`)
                .then(response => {
                    this.restaurant = response.data.results;
                    //console.warn(this.restaurant.image);
                    if(this.restaurant.plates.length > 0){
                        this.platesArray = response.data.results.plates;
                    }
                    //this.platesArray = response.data.results.plates;
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
            // console.warn(image);
            if(image.startsWith("uploads/")){
                return image.split('uploads/').pop()
            }
            return false
        },
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        floatPrice(price){
            return price.toFixed(2);
        },

        // Gestione Carrello
        addToCart(plate) {
            if ( localStorage.getItem("id") === this.restaurantId || localStorage.getItem("id") === null ) {
                this.cart.push(plate);
                this.plateIdsArray.push(plate.id);
                this.total += parseFloat(plate.price - (plate.price * plate.discount / 100));
                this.save();
            } else {
                console.log("ID pagina attuale: " + this.restaurantId);
                console.log("ID ristorante del local storage: " + localStorage.getItem("id"));
                console.log("Local Storage svuotato");
                localStorage.removeItem("cart");
                localStorage.removeItem("total");
                localStorage.removeItem("id");
                this.cart = [];
                this.total = 0;
                this.save();
            }
        },
        save() {
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.setItem("total", this.total);
            localStorage.setItem("id", this.restaurantId);

            if (this.cart.length === 0){
                localStorage.removeItem("cart");
                localStorage.removeItem("total");
                localStorage.removeItem("id");
            }

        },
        removeFromCart(plate) {
            this.cart.splice(this.cart.indexOf(plate), 1);
            this.total -= parseFloat(plate.price - (plate.price * plate.discount / 100));
            this.save();
        },
    },
    created(){
        this.getRestaurantDetail();

        const url = window.location.href;
        let pageID = url.substring(url.lastIndexOf("/") + 1);
        this.restaurantId = pageID;

        if (localStorage.getItem("cart")) {
            try {
                this.cart = JSON.parse(localStorage.getItem("cart"));
                this.total = parseFloat(localStorage.getItem("total"));
                this.id = JSON.parse(localStorage.getItem("id"));
            } catch (error) {
                localStorage.removeItem("cart");
                localStorage.removeItem("total");
                localStorage.removeItem("id");
            }
        }
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