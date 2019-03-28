<template>
<div class="slider">
<button @mouseover="prev()" class="control prev"> < </button>
  <div class="slider--inner" :class="{'prev': this.previus, 'fast': this.nexts}">
    <div class="slide-inner">
        <article class="item" v-for="(slide, index) in slides">
            <img :src="slide.archivo" alt="default slide">
            <p>
                <span class="category">{{slide.name}}</span>
                <a href="#" class="btn">See More</a>
            </p>
        </article>
    </div>
    <div class="slide-inner">
        <article class="item" v-for="(slide, index) in slides">
            <img :src="slide.archivo" alt="default slide">
            <p>
                <span class="category">{{slide.name}}</span>
                <a href="#" class="btn">See More</a>
            </p>
        </article>
    </div>
  </div>
<button @mouseover="next()" class="control next"> > </button>
</div>
</template>
<script>
    export default {
        mounted() {

                
        },
        props: [
            'slides'
        ],
        data(){
            return {
                pictures: null,
                previus: false,
                nexts: false,
                paused: false
            }
        },
        methods: {
            prev(){
                this.nexts = false;
                this.previus ? this.previus = false : this.previus = true;
            },
            next(){
                this.previus = false
                this.nexts ? this.nexts = false : this.nexts = true;
            },
            reset(){
                this.previus = false;
                this.nexts = false;
            }
        }
    }
</script>