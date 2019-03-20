<template>
<<<<<<< HEAD
    <div class="carousel">
        <button @click="prev()" class="control prev"> < </button>
        <transition-group class="slides" :class="{'reverse': transition === 'prev'}" :name="transition">
            <article :class="{'active': content === index}" :key="slide.id" class="slide" v-for="(slide, index) in slides" v-if="active === index">
                <img :src="slide.archivo" alt="slide 1">
=======
    <section class="carousel">
        <button @click="prev()" class="control prev"> < </button>
        <transition-group class="slides" :class="{'reverse': transition === 'prev'}" :name="transition">
            <article :class="{'active': content === index}" :key="slide.id" class="slide" v-for="(slide, index) in slides" v-if="active === index">
                <img src="/img/default_slide.jpg" alt="slide 1">
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
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
<<<<<<< HEAD
    </div>
=======
    </section>
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
</template>
<script>
    export default {
        mounted(){
<<<<<<< HEAD
            console.log(this.slides);
=======
          
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
        },
        props: [
            'slides'
        ],
        data(){
            return {
                active: 0,
                transition: 'next',
<<<<<<< HEAD
                content: 0
=======
                content: 0,
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
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