<template>
    <section class="w-100 h-100 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative text-center">
                    <img class="img-fluid floating"  :src="'../../public/assets/images/' + images[mainImage]" alt="hero">
                    <div class="w-100 d-flex justify-content-center mb-3">
                        <a href="#" class="btn btn-danger ms_btn_cta">Sfoglia i ristoranti</a>
                    </div>
                    <h2 class="text-center ms_title_font">Il tuo cibo preferito direttamente <br>a casa tua!</h2>
                </div>
            </div>
        </div>
        <svg class="w-100" xmlns="../../../public/assets/images/wave1.svg" viewBox="0 0 100 100" preserveAspectRatio="none" height="100">
            <path fill="white" d="M 0 0 L0 100 L100 100 L100 0 Q 50 200 0 0"></path>
        </svg>
    </section>
</template>

<script>
export default {
    name: 'Jumbotron',

    data () {
        return {
        images: [
            'margherita.png',
            'nigiri.png',
            'HERO.png',
        ],
        mainImage: 0,
        }
    },
    methods:{
        changeImage(){
            setInterval(() => {
                if(this.mainImage < this.images.length - 1){
                    this.mainImage++;
                }else{
                    this.mainImage = 0;
                }
            }, 3000);
        }
    },

    mounted(){
        this.changeImage();
    }
}



</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

section{
    background-color: $secondary-color;
    padding: 50px 0 0 0;
}

img{
    z-index: 2;
}
h2.ms_title_font{
    color: $dark-color;
}

svg{
    height: 40px;
}

@keyframes float {
	0% {
		
		transform: translatey(0px);
	}
	50% {
		
		transform: translatey(-30px);
	}
	100% {
		
		transform: translatey(0px);
	}
}

.floating{
    animation: float 4s ease-in-out infinite;
}
</style>