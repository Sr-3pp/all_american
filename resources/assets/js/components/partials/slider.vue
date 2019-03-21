<template>
<div class="slider">
<button @mouseover="prev()" class="control prev"> < </button>
  <div class="slider--inner" :class="{'prev': this.previus, 'fast': this.nexts}">
    <div class="slide-inner">
                <article class="item" v-for="(slide, index) in slides">
                    <img src="/img/default.jpg" alt="default slide">
                    {{slide.name}}
                </article>
            </div>
            <div class="slide-inner">
                <article class="item" v-for="(slide, index) in slides">
                    <img src="/img/default.jpg" alt="default slide">
                    {{slide.name}}
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
                speed: 10000,
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
                this.speed = 2000
            },
            reset(){
                this.previus = false;
                this.nexts = false;
                this.speed = 10000
            }
        }
    }
</script>