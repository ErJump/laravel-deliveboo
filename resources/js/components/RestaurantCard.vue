<template>
    <router-link :to="'/RestaurantShow/' + restaurant.id">
        <div class="card h-100 rounded">
            <!-- <img :src="'../../../storage/app/public/uploads/5Gqc0VF4rDAUeoDG8e8HRON4hKvw2sdtTA2zYS1s.png'" alt=""> -->
            <img v-if="cutImageString(restaurant.image)" :src="'../../../storage/app/public/uploads/' + cutImageString(restaurant.image)" alt="immagine interna">
            <img v-else :src="restaurant.image" class="card-img-top" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">{{restaurant.name}}</h5>
                <h6 class="mb-4">
                    <span v-for="typology in restaurant.typologies" :key="typology.id">{{capitalizeFirstLetter(typology.name)}} </span>
                </h6>
                <p class="card-subtitle text-muted mb-3">{{restaurant.description}}</p>
            </div>
            <div class="card-footer">
                <p class="card-text text-muted mb-1">
                    {{restaurant.address}}
                </p>
                <p class="card-text text-muted">
                    {{restaurant.phone_number}}
                </p>
            </div>
        </div>
    </router-link>
</template>

<script>
export default {
    name: 'RestaurantCard',
    props: {
        restaurant: {
            type: Object,
            required: true
        }
    },
    methods: {
        capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        cutImageString(image){
            if(image.startsWith("uploads/")){
                return image.split('uploads/').pop()
            }
            return false
        },
    }
}
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

img{
    height: 250px;
    object-fit: cover;
    position: center;
}
</style>