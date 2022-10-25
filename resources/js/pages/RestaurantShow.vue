<template>
    <section class="container-lg pt-5 custom">
        <div :class="!isReady ? '' : 'd-none'" class="ms_height">
            <LoaderComponent />
        </div>
        <div :class="isReady ? '' : 'd-none'">
            <div class="row mb-5">
                <div class="col-12 col-md-4 mb-3">
                    <img v-if="cutImageString(restaurant.image)" class="card-img-top" :src="'/storage/' + restaurant.image" alt="immagine_interna">
                    <img v-else class="w-100 rounded-lg" :src="restaurant.image" alt="image">
                </div>
                <div class="col-12 col-md-8">
                    <h4 class="font-weight-bold">{{ restaurant.name }}</h4>
                    <p v-for="typology in restaurant.typologies" :key="typology.id"><small>{{ capitalizeFirstLetter(typology.name) }}</small></p>
                    <p>{{ restaurant.description }}</p>
                    <div>
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ restaurant.phone_number}}</span>
                    </div>
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ restaurant.address}}</span>
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
                                <div class="card-header p-0 position-relative plate-card-img">
                                    <img v-if="plate.image == null" class="card-img-top" src="/assets/images/food-placeholder.png" alt="placeholder">
                                    <img v-else-if="cutImageString(plate.image)" class="card-img-top" :src="'/storage/' + plate.image" alt="immagine_interna">
                                    <img v-else class="card-img-top" :src="plate.image" alt="immagine_url">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold mb-2">{{plate.name}}</h6>
                                    <p class="card-subtitle text-muted mb-3"><small>{{plate.description}}</small></p>
                                    <p class="card-subtitle text-muted mb-3"><small><strong>Ingredienti: </strong>{{plate.ingredients}}</small></p>
                                </div>
                                <div class="card-footer">
                                    <p v-if="!plate.availability" class="text-dark mb-0 font-weight-bold">Non disponibile</p>
                                    <div v-if="plate.availability" class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p v-if="plate.discount > 0" class="card-subtitle text-muted mr-1 d-inline"><s>{{plate.price}}€</s></p>
                                            <h6 class="mb-0 d-inline font-weight-bold">{{floatPrice(plate.price - (plate.price * plate.discount / 100))}}€</h6>
                                            <p v-if="plate.discount > 0" class="card-subtitle text-muted fs-small"><small>{{plate.discount}}% di sconto</small></p>
                                        </div>
                                        <div>
                                            <i v-if="plate.availability" class="fa-solid fa-plus text-right rounded-circle p-2"
                                        @click="[plate.availability == 1 ? addToCart(plate) : '']"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="platesArray == 0">
                        <h3>Questo ristorante non ha ancora inserito il suo menu</h3>
                    </div>
                </div>
                <div class="col-12 col-lg-4 " id="checkout-cart">
                    <div v-if="isPaying" class="mt-5 ms_loader d-flex flex-column align-items-center pt-4">
                        <h4 class="mb-3 text-center">Stiamo processando il pagamento...</h4>
                        <LoaderComponent  />
                    </div>
                    <div v-else class="card mobile-cart">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h4 class="car-title mb-0">Carrello</h4>
                                </div>
                                <div class="collapse-cart d-sm-none">
                                    <i class="fa-solid text-center rounded-circle mr-2 p-2"
                                        :class="cartActive ? 'fa-angle-down' : 'fa-angle-up'"
                                        @click="toggleCartActive()"></i>
                                </div>
                                <div class="collapse-cart d-none d-sm-block">
                                    <i class="fa-solid text-center rounded-circle mr-2 p-2"
                                        :class="cartActive ? 'fa-angle-up' : 'fa-angle-down'"
                                        @click="toggleCartActive()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" :class="cartActive ? 'hv_50' : 'd-none'">
                            <div class="mb-4" v-if="cartActive">
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
                            <div class="checkout-form" :class="cart.length === 0 ? 'd-none' : ''">
                                <h4>Pagamento</h4>
                                <form action="http://127.0.0.1:8000/api/orders" id="payment-form" method="post">
                                    <input class="form-control mb-2" type="text" v-model="userName" placeholder="Nome*"
                                        required maxlength="50" name="userName"/>
                                    <input class="form-control mb-2" type="text" v-model="userSurname" placeholder="Cognome*"
                                        required maxlength="50" name="userSurname"/>
                                    <input class="form-control mb-2" type="text" v-model="userAddress"
                                        placeholder="Indirizzo*" name="userAddress" required maxlength="50"/>
                                    <input class="form-control mb-2" name="userPhone" type="number" v-model="userPhone"
                                        placeholder="Numero di telefono*" required />
                                    <input class="form-control mb-2" name="userEmail" type="email" v-model="userEmail" placeholder="Email*"
                                        required />
                                    <div id="dropin-container"></div>
                                    <button type="submit" class="btn ms_btn_primary w-100">Paga</button>
                                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                                    <input type="hidden" id="cart" name="cart_items"/>
                                </form>
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
                                <a @click="emptyCart()" class="btn mb-1 btn-dark w-100">Svuota carrello</a>
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
import LoaderComponent from '../components/LoaderComponent';

export default {
    name: 'RestaurantShow',
    components: {
        LoaderComponent
    },
    data() {
        return {
            restaurant:[],
            platesArray:[],
            cart: [],
            plateIdsArray: [],
            total: 0,
            restaurantId: null,
            cartActive: false,
            userName: '',
            userSurname: '',
            userAddress: '',
            userPhone: '',
            userEmail: '',
            activeForm: false,
            clientToken: '',
            tokenApiUrl: 'http://127.0.0.1:8000/api/orders',
            isPaying: false,
            isReady: false,
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
                    this.isReady = true;
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
                this.addedToCart();
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
                    this.addedToCart();
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
        addedToCart(){
            const Swal = require('sweetalert2');
            Swal.fire({
                position: 'top',
                icon: 'success',
                text: "Prodotto aggiunto al carrello",
                showConfirmButton: false,
                timer: 1500
            })
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
            text: "Così svuoterai il carrello e perderai tutti i piatti aggiunti. Il carrello resterà comunque attivo per il ristorante scelto.",
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

        //inizializza braintree
        // create a dropin instance using that container (or a string
        // that functions as a query selector such as `#dropin-container`)
        initBraintree() {
            const form = document.getElementById('payment-form');
            
            braintree.dropin.create({
                authorization: this.clientToken,
                container: '#dropin-container'
            }, (error, dropinInstance) => {
                //this.dropinInstance = instance;
                if(error)console.error(error);

                form.addEventListener('submit', event => {
                    event.preventDefault();
                    dropinInstance.requestPaymentMethod((error, payload) => {
                        if(error)console.error(error);

                        // Pass payload.nonce to your server
                        document.getElementById('nonce').value = payload.nonce;
                        document.getElementById('cart').value = JSON.stringify(this.cart);
                        form.submit();
                        this.isPaying = true;
                    });
                });
            });
        },

        //prende il token dal server
        getToken() {
            axios.get(this.tokenApiUrl)
                .then(response => {
                    this.clientToken = response.data.clientToken;
                    //inizializza braintree
                    this.initBraintree();
                })
                .catch(error => {
                    console.log(error);
                });
        },

        /* userName: null,
            userSurname: null,
            userAddress: null,
            userPhone: null,
            userEmail: null, */
        sendPayment() {
            console.log('sendPayment');
            //chiamata axios con i params
            axios.post(this.tokenApiUrl, {
                cart: this.cart,
                total: this.total,
                restaurant_id: this.restaurantId,
                user_name: this.userName,
                user_surname: this.userSurname,
                user_address: this.userAddress,
                user_phone: this.userPhone,
                user_email: this.userEmail,
                nonce: document.getElementById('nonce').value
            })
            .then(response => {
                console.log('estamos')
                console.log(response);
                /* this.emptyCart();
                this.toggleCartActive();
                this.togglePaymentActive();
                this.toggleSuccessActive(); */
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
    created(){
        
        this.getRestaurantDetail();
        this.getToken();


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

.ms_height{
    height: 70vh;
}
.ms_loader{
        width: 100%;
        background-color: #f8fafc;
    } 
.plate-card-img {
    height: 250px;
}

.card-img-top {
    object-fit: cover;
    height: 250px;
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


/***  Cart  ***/

#checkout-cart {
    z-index: 1;
}

.hv_50 {
    height: 50vh;
}

.mobile-cart {
    box-shadow: 0 -4px 6px rgba(33,33,33,0.08);
    transition: 2s;
}
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

@media screen and (max-width: 576px) {
    #checkout-cart {
        position: fixed;
        bottom: 0;
        left: 0;
    }
}

@media screen and (min-whidth: 577px) {
    #checkout-cart {
        position: relative;

        .hv_50 {
            height: auto;
        }
    }
}
</style>