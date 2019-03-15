<template>
    <section class="carousel">
        <button @click="prev()" class="control prev"> < </button>
        <transition-group class="slides" :name="transition">
            <article :key="slide" class="slide" v-for="(slide, index) in slides" v-if="active === index">
                <img src="/img/default.jpg" alt="slide 1">
                <div class="content">
                    <p class="title">{{slide}}</p>
                    <p class="text">
                        Text
                    </p>
                    <button class="cta">Go to</button>
                </div>
            </article>
        </transition-group>
        <button @click="next()" class="control next"> > </button>
    </section>
</template>
<script>
    export default {
        mounted(){

        },
        props: [
            'slides'
        ],
        data(){
            return {
                active: 0,
                transition: 'next'
            }
        },
        methods: {
            next(){
                if(this.active < this.slides.length-1){
                    this.transition = 'next'
                    this.active += 1;
                }
            },
            prev(){
                if(this.active > 0){
                    this.transition = 'prev'
                    this.active -= 1;
                }
            }
        }
    }
</script>