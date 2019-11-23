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
                    rows: 0,
                    responsive: [
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                        },
                        {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
                }
            }
        },
        methods: {
         
        }
    }
</script>