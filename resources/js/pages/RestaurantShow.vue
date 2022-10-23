<template>
    <section class="container-lg pt-5 custom">
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
                    <div class="col-12 col-md-6 col-xl-4 mb-4"  v-for="plate in platesArray" :key="plate.id" >
                        <div class="card h-100 rounded" :class="plate.availability ? '' : 'ms_not_available'">
                            <div class="card-header p-0 position-relative">
                                <img v-if="plate.image == null" class="card-img-top" src="/assets/images/food-placeholder.png" alt="placeholder">
                                <img v-else-if="cutImageString(plate.image)" class="card-img-top" :src="'/storage/' + plate.image" alt="immagine_interna">
                                <img v-else class="card-img-top" :src="plate.image" alt="immagine_url">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold mb-2">{{plate.name}}</h5>
                                <h5 v-if="!plate.availability" class="text-dark mb-3"> Non disponibile</h5>
                                <p class="card-subtitle text-muted mb-3">{{plate.description}}</p>
                                <p class="card-subtitle text-muted mb-3"><strong>Ingredienti: </strong>{{plate.ingredients}}</p>
                                <span v-if="plate.discount > 0" class="card-subtitle mb-3 d-block">{{plate.discount}}% di sconto</span>
                                <div class="d-flex g-3">
                                    <span v-if="plate.discount > 0" class="card-subtitle mb-3 d-block text-muted mr-3"><s>{{plate.price}}€</s></span>
                                    <strong class="card-subtitle mb-3 d-block">{{floatPrice(plate.price - (plate.price * plate.discount / 100))}}€</strong>
                                </div>
                                <i v-if="plate.availability" class="fa-solid fa-plus text-right rounded-circle p-2"
                                @click="[plate.availability == 1 ? addToCart(plate) : '']"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else-if="platesArray == 0">
                    <h3>Questo ristorante non ha ancora inserito il suo menu</h3>
                </div>
            </div>


            <!------------ Mobile Cart ------------>
            <div class="d-sm-none">
                <div class="card fixed-bottom mobile-cart" id="mobile-cart">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="car-title mb-0 font-weight-bold">Carrello</h4>    
                            </div>
                            <div class="collapse-cart">
                                <i class="fa-solid text-center rounded-circle mr-2 p-2"
                                    :class="cartActive ? 'fa-angle-down' : 'fa-angle-up'"
                                    @click="toggleCartActive()"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-auto" :class="cartActive ? 'hv_50' : 'd-none'">
                        <div v-if="cartActive">
                            <div v-if="cart.length > 0">
                                <div class="cart-plates d-flex justify-content-between align-items-center mb-3" v-for="(plate, index) in cart" :key="index">
                                    <div class="plate-data">
                                        <i class="fa-solid fa-xmark text-center rounded-circle mr-2 p-2" @click="removeFromCart(plate)"></i>
                                        <span>{{ plate.name }} x{{ plate.quantity }}</span>
                                    </div>
                                    <div class="plate-prices">
                                        <h6 class="mb-0">{{floatPrice(plate.price - (plate.price * plate.discount / 100))}}€</h6>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="text-center">
                                <h5>Il carrello è vuoto</h5>
                                <p class="text-muted"><small>Clicca su un piatto per aggiungerlo</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4" :class="cart.length === 0 ? 'd-none' : ''">
                        <div class="d-flex justify-content-between align-items-center mb-w"                            >
                            <div>
                                <h4>Totale:</h4>
                            </div>
                            <div>
                                <h4>{{ floatPrice(total) }}€</h4>
                            </div>
                        </div>
                        <div class="checkout-box text-center">
                            <a @click="emptyCart()" class="btn mb-1 text-muted">Svuota carrello</a>
                            <a href="#" class="btn ms_btn_primary w-100">Vai alla cassa</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-none d-sm-block">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3>Carrello</h3>
                    </div>


                    <!------------ Desktop Cart ------------>
                    <div class="col-12">
                        <div class="card h-100 rounded">
                            <div class="card-body">

                                <table class="table mb-4" v-if="cart.length > 0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Quantità</th>
                                            <th scope="col" :colspan="activeForm ? '1' : '2'">Prezzo</th>
                                            <th scope="col" v-if="!activeForm">Rimuovi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(plate, index) in cart" :key="index">
                                            <td>{{ plate.name }}</td>
                                            <td>{{ plate.quantity }}</td>
                                            <td :colspan="activeForm ? '1' : '2'">€ {{floatPrice(plate.price - (plate.price * plate.discount / 100))}}</td>
                                            <td>
                                                <button v-if="!activeForm" class="btn btn-sm btn-danger" @click="removeFromCart(plate)">
                                                    Rimuovi
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Totale</strong></td>
                                            <td :colspan="activeForm ? '2' : '3'">€ {{ floatPrice(total) }}</td>
                                        </tr>
                                        <tr v-if="activeForm">
                                            <!-- Checkout -->
                                            <td class="p-4" colspan="4">
                                                <h4>Checkout</h4>
                                                <form action="">
                                                    <input class="form-control mb-2" type="text" v-model="userName" placeholder="Nome*"
                                                        required />
                                                    <input class="form-control mb-2" type="text" v-model="userSurname" placeholder="Cognome*"
                                                        required />
                                                    <input class="form-control mb-2" type="text" v-model="userAddress"
                                                        placeholder="Indirizzo*" required />
                                                    <input class="form-control mb-2" type="number" v-model="userPhone"
                                                        placeholder="Numero di telefono*" required />
                                                    <input class="form-control mb-2" type="email" v-model="userEmail" placeholder="Email* "
                                                        required />
                                                    <button type="submit">Paga</button>
                                                </form>
                                            </td>
                                            <!-- Fine checkout -->
                                        </tr>
                                        <tr>
                                            <!-- braintree -->
                                            <div id="dropin-container"></div>
                                        </tr>
                                        <tr>    
                                            <td colspan="4">
                                                <div v-if="!activeForm" class="checkout-box text-center">
                                                    <a @click="emptyCart()" class="btn mb-1 text-muted">Svuota carrello</a>
                                                    <a @click="activeForm = true" class="btn ms_btn_primary w-100">Vai alla cassa</a>
                                                </div>
                                                <div v-else class="checkout-box text-center">
                                                    <a @click="activeForm = false" class="btn ms_btn_primary w-100">Torna Indietro</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div v-else class="text-center">
                                    <h5 class="card-title font-weight-bold">Il carrello è vuoto</h5>
                                    <h6 class="card-subtitle mb-3">Clicca sui piatti per aggiungerli</h6>
                                </div>

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
            cartActive: false,
            userName: null,
            userSurname: null,
            userAddress: null,
            userPhone: null,
            userEmail: null,
            activeForm: false,
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
        cutImageString(image){
            if(image){
                if(image.startsWith("uploads/")){
                    return image.split('uploads/').pop()
                }
                return false
            }
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
                if (this.plateIdsArray.includes(plate.id)){
                    plate.quantity = plate.quantity + 1;
                } else {
                    plate.quantity = 1;
                    this.cart.push(plate);
                    this.plateIdsArray.push(plate.id);
                }
                this.total += parseFloat(plate.price - (plate.price * plate.discount / 100));
                this.save();
            } else {
                const Swal = require('sweetalert2');
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Sei sicuro?',
                text: "Il tuo carrello contiene degli ordini da un altro ristorante, così svuoterai il carrello",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sì, svuota',
                cancelButtonText: 'No, torna indietro',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Svuotato!',
                    'Il tuo carrello è stato svuotato, è stato creato un nuovo carrello con il nuovo prodotto',
                    'success'
                    );
                    console.log("ID pagina attuale: " + this.restaurantId);
                    console.log("ID ristorante del local storage: " + localStorage.getItem("id"));
                    console.log("Local Storage svuotato");
                    localStorage.removeItem("cart");
                    localStorage.removeItem("total");
                    localStorage.removeItem("id");
                    this.cart = [];
                    this.total = 0;
                    plate.quantity = 1;
                    this.cart.push(plate);
                    this.plateIdsArray.push(plate.id);
                    this.total += parseFloat(plate.price - (plate.price * plate.discount / 100));
                    this.save();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Annullato',
                    'Il tuo carrello non è stato modificato',
                    'error'
                    )
                }
                })                
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
            if (plate.quantity > 1){
                plate.quantity = plate.quantity - 1;
                this.total -= parseFloat(plate.price - (plate.price * plate.discount / 100));
                this.save();
            } else{
                this.cart.splice(this.cart.indexOf(plate), 1);
                this.plateIdsArray.splice(this.plateIdsArray.indexOf(plate), 1);
                this.total -= parseFloat(plate.price - (plate.price * plate.discount / 100));
                this.save();
            }
        },
        emptyCart() {
            const Swal = require('sweetalert2');
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-2',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Sei sicuro?',
            text: "Così svuoterai il carrello e perderai tutti i piatti aggiunti",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sì, svuota',
            cancelButtonText: 'No, torna indietro',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                'Svuotato!',
                'Il tuo carrello è stato svuotato',
                'success'
                )
                this.cart = [];
                this.plateIdsArray = [];
                this.total = 0;
                this.save();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                'Annullato',
                'Il tuo carrello non è stato modificato',
                'error'
                )
            }
            })
        },

        //Cart behaviour methods
        toggleCartActive() {
            this.cartActive = !this.cartActive;
        },

        //braintree
        // Step two: create a dropin instance using that container (or a string
        // that functions as a query selector such as `#dropin-container`)
        initBraintree() {
            braintree.dropin.create({
                authorization: this.clientToken,
                container: '#dropin-container'
            }, (createErr, instance) => {
                this.dropinInstance = instance;
            });
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


.card-header {
    height: 200px;
}

.card-img-top {
    object-fit: cover;
    height: 200px;
}

.ms_not_available{
    filter: grayscale(100%);
    opacity: 0.5;
    cursor: default !important;
}
@media (min-width: 1200px) {
    .custom{
        max-width: 1100px;
    }
 }
@media (min-width: 1400px) {
    .custom{
        max-width: 1200px;
    }
}
@media (min-width: 1700px) {
    .custom{
        max-width: 1500px;
    }
}
@media (min-width: 1920px) {
    .custom{
        max-width: 1800px;
    }
}


/*** Mobile Cart ***/

.hv_50 {
    height: 50vh;
}

.mobile-cart {
    box-shadow: 0 -4px 6px rgba(33,33,33,0.08);
    transition: 2s;
};
.fa-solid.fa-xmark,
.fa-solid.fa-angle-up,
.fa-angle-down,
.fa-plus {
    background-color: rgba(33,33,33,.05);
    color: $rgba-dark-color;
    height: 30px;
    width: 30px;

    &:hover {
        cursor: pointer;
        background-color: rgba(33,33,33,.1);
        color: $dark-color;
    }
}

.fa-plus {
    background-color: $secondary-color;
    color: $dark-color;

    &:hover {
        background-color: $secondary-accenture-color;
        cursor: pointer;
    }
}
</style>