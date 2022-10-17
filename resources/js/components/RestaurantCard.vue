<template>
    <div class="card px-0 col-12 position-relative">
        <img :src="restaurant.image" class="card-img-top" :alt="restaurant.name">
        <div class="card-body">
            <h5 class="card-title">{{restaurant.name}}</h5>
            <p class="card-text">{{restaurant.description}}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{restaurant.address}}</li>
            <li class="list-group-item">{{restaurant.phone_number}}</li>
        </ul>
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
.ms_badge{
    margin: 0 auto;
    padding: 10px;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    background-color: $dark-color;
    img{
        width: 100px;
    }
}
</style>