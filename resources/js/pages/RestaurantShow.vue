<template>
    <section>
        <div class="py-3 border-bottom">
        <div class="col-12">
            <img class="w-100 rounded-lg" :src="restaurant.image" alt="image">
        </div>
        <div class="pl-3">
            <h4 class="font-weight-bold"> {{ restaurant.name }} </h4>
            <ul>
                <li v-for="typology in restaurant.typologies" :key="typology.id" >
                    {{ typology.name }}
                </li>
            </ul>
            <p>
                {{ restaurant.description }}
            </p>
            <div>
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
    </div>
    
    <div>
        <h5 class="pl-4 pt-5"> Piatti </h5>

        <div class="col-11 mx-auto border p-2 rounded-lg my-2" v-for="plate in platesArray" :key="plate.id">
            <span class="d-flex justify-content-around align-items-center">
                <div class="text-center col-6">
                    <h5 class="card-title"> {{ plate.name }}</h5>
                    <span class="card-text" maxlegth="5"> € {{plate.description}}</span>
                    <span v-if="plate.description.length > 10">...</span>
                    <p class="card-text"> € {{plate.price}} </p>
                </div>
                <div v-if="urlValidationFunction(plate.image)" class="w-25 col-4 p-0">
                    <img class="w-100" :src="plate.image"  alt="immagine_url">
                </div>
                <div v-else class="w-25 col-4 p-0">
                    <img class="w-100" :src="'/images/' + plate.image"  alt="immagine_interna">
                </div>
            </span>
           
            <a href="#" class="btn btn-success ml-4 col-6">aggiungi al carrello</a>
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
                    
                    // for (let i = 0; i < this.platesArray.length; i++) {
                    //     if(this.platesArray[i].image.startsWith("uploads")){
                    //         this.platesArray[i].image=this.platesArray.image.split('uploads').pop()
                    //     }
                    // }
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
        cutImageString(){
            return '0eNhQFs5Vs8YXUKncCnIgbDVT3Jee3mdrxXdsc0c.png';
        }
    },
    created(){
        this.getRestaurantDetail();
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

</style>