<template>
        <div class="card h-100 rounded">
            <!-- <img :src="'../../../storage/app/public/uploads/5Gqc0VF4rDAUeoDG8e8HRON4hKvw2sdtTA2zYS1s.png'" alt=""> -->
            <img v-if="cutImageString(restaurant.image)" :src="'/storage/' + restaurant.image" alt="immagine interna">
            <img v-else :src="restaurant.image" class="card-img-top" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">{{restaurant.name}}</h5>
                <h6 class="mb-4">
                    <strong v-for="typology in restaurant.typologies" :key="typology.id" class="text-muted">{{capitalizeFirstLetter(typology.name)}} </strong>
                </h6>
                <p class="card-subtitle text-muted mb-3"><small>{{restaurant.description}}</small></p>
            </div>
            <div class="card-footer">
                <p class="card-text text-muted mb-1">
                    <small>{{restaurant.address}}</small>
                </p>
                <p class="card-text text-muted">
                    <small>{{restaurant.phone_number}}</small>
                </p>
            </div>
            <router-link :to="'/RestaurantShow/' + restaurant.id" class="ms_btn_primary text-white rounded-bottom py-3">
                Vai al ristorante
            </router-link>
        </div>
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
            } else if (image.startsWith("img_restaurants/")){
                return image.split('img_restaurants/').pop()
            }
            return false
        },
    }
}
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

img {
    height: 200px;
    object-fit: cover;
    position: center;
}

.card {
    text-decoration: none;
    transition: .3s;
    cursor: default !important;

    //da gestire
    /* &:hover {
        transform: translateY(-10px);

        h5 {
            color: $primary-color;
        }
    } */
}
</style>