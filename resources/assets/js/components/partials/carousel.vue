<template>
    <section class="carousel">
        <button @click="prev()" class="control prev"> < </button>
        <transition-group class="slides" :class="{'reverse': transition === 'prev'}" :name="transition">
            <article :class="{'active': content === index}" :key="slide.id" class="slide" v-for="(slide, index) in slides" v-if="active === index">
                <img src="/img/default.jpg" alt="slide 1">
                <div class="content">
                    <p class="title">{{slide.name}}</p>
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
            console.log(this.slides);
        },
        props: [
            'slides'
        ],
        data(){
            return {
                active: 0,
                transition: 'next',
                content: 0
            }
        },
        methods: {
            next(){
                if(this.active < this.slides.length-1){
                this.content = false
                    this.transition = 'next'
                    this.active += 1;
                    var este = this;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }
            },
            prev(){
                if(this.active > 0){
                this.content = false;
                    this.transition = 'prev'
                    this.active -= 1;
                    var este = this;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }
            }
        }
    }
</script>