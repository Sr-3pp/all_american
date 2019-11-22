<template>
 <slick class="project-slider" ref="slick"  :options="slickOptions">
     <figure class="slide" v-for="(slide, index) in slides">
            <img :src="'/storage/'+slide.archivo" alt="default slide">
            <p>
                <span class="category">{{slide.name}}</span>
                <a href="#" class="btn">See More</a>
            </p>
        </figure>
</slick>
</template>
<script>
import '../../../../../node_modules/slick-carousel/slick/slick.css';
import Slick from 'vue-slick';
    export default {
        components: { Slick },
        mounted() {

                
        },
        props: [
            'slides'
        ],
        data(){
            return {
                slickOptions: {
                    slidesToShow: 5,
                    infinite: true,
                    autoplay: true,
                    dots: false,
                    arrows: false,
                    variableWidth: true,
                    centerMode: true,
                    rows: 0
                },
            }
        },
        methods: {
         
        }
    }
</script>