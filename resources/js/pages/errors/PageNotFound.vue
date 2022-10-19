<template>
    <div class="error">
        <div class="container-lg">
            <div class="d-flex centering align-items-center">
                <img class="mb-4 w-100 w-md-75" src="../../../../public/assets/images/404.png" alt="404">
            </div>
        </div>
        <div class="text-error d-flex align-items-center flex-column text-center ">
            <h2 class="text-white col-sm-8 font-weight-bold">"Oops, pagina non trovata. </h2>
            <h2 class="text-white col-sm-10 font-weight-bold">Andiamo ad incolpare i graphic designer"</h2>
        </div>
    </div>
</template>

<script>
export default {
    name: 'PageNotFound',
}
</script>

<style scoped lang="scss">
@import "../../../sass/variables.scss";

.error{
    background-image: url(../../../../public/assets/images/error.png);
    height: 100vh;
    background-size: cover;
    background-repeat: no-repeat;
    background-position:center;
}
.errorquattro{
    font-weight: 900;
    font-size: 10rem;
    color: white;
    padding: 0px 22px;
}
.centering{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -85%);
}
.text-error{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, 25%);
    text-shadow: 0px 7px 8px rgba(33, 33, 33, 0.3);
    width: 85vw;
}

</style>