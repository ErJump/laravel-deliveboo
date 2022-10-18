<template>
    
    <div class="card px-0 col-12 rounded mb-4">
        <router-link :to="'/RestaurantShow/' + restaurant.id" >
            <img :src="restaurant.image" class="card-img-top" :alt="restaurant.name">
            <div class="card-body">
                <h5 class="card-title">{{restaurant.name}}</h5>
                <p class="card-text">{{restaurant.description}}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{restaurant.address}}</li>
                <li class="list-group-item">{{restaurant.phone_number}}</li>
            </ul>
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
    }
}
</script>

<style scoped lang="scss">
@import "../../sass/variables.scss";

img{
    height: 200px;
    object-fit: cover;
    position: center;
}
</style>