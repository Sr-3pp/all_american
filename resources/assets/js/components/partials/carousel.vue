<template>
    <div class="carousel">
        <button @click="prev()" class="control prev"> <icon name="chevron"></icon> </button>
        <transition-group tag="div" class="slides" :class="{'reverse': transition === 'prev'}" :name="transition">
            <article :class="{'active': content === index}" :key="slide.id" class="slide" v-for="(slide, index) in slides" v-if="active === index">
                <img :src="'/storage/'+slide.archivo" alt="slide 1">
                <div v-if="name === 'main'"  class="content" :s-mode="slide.extra.position" :s-color="slide.extra.color">
                    <p class="text">{{slide.extra.title}}</p>
                    <p class="title" v-html="slide.extra.description"></p>
                    <button class="btn cta">Read More</button>
                </div>
                <div v-if="name === 'testimonials'" class="content testimonials">
                    <article>
                        <span class="title">Efficent Work</span>
                        <hr>
                        <span class="text">Quality in their work and good delivery time, they are fast and efficient.</span>
                        <h3 class="title">Testimonial</h3>
                    </article>
                </div>
            </article>
        </transition-group>
        <button @click="next()" class="control next"> <icon name="chevron"></icon> </button>
    </div>
</template>
<script>
    export default {
        mounted(){
            var este = this;
            /* setInterval(() => {
                if (this.active !== (this.slides.length -1)) {
                    this.content = false
                    this.transition = 'next'
                    this.active += 1;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }else{
                    this.content = false
                    this.transition = 'next'
                    this.active = 0;
                    setTimeout(function(){ 
                        este.content = este.active;
                    }, 1000);
                }
                
            }, 6000); */
        },
        props: [
            'slides', 'name'
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