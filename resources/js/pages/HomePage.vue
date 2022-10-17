<template>
    <div>
        <h1>Home Page</h1>
    </div>
</template>

<script>
export default {
    name: '',
    components: {

    },
    data() {
        return {
            restaurantsUrl: 'http://localhost:8000/api/users',
            restaurants: [],
            typologiesArray: [],
            typologies: [],
        }
    },
    methods: {
        getRestaurants() {
            axios.get(this.restaurantsUrl)
                .then(response => {
                    this.restaurants = response.data.results.data;
                    console.log(this.restaurants)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getRestaurants()
    }
}
</script>

<style scoped lang="scss">

</style>