<template>
  <div>
    <h1>ciao</h1>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'RestaurantShow',
    methods:{
        getRestaurantDetail(){
            const id=this.$route.params.id;
            
        }
    },
    created(){
        this.getRestaurantDetail()
    }
}
</script>

<style>

</style>