<template>
    <div class="card h-100 rounded">
        <img :src="restaurant.image" class="card-img-top" :alt="restaurant.name">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">{{restaurant.name}}</h5>
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
    height: 250px;
    object-fit: cover;
    position: center;
}
</style>