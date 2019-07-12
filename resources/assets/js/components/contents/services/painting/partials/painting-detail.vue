<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img v-if="paint == 0" src="/img/services/paint_8.jpg" alt="">
            <img v-if="paint == 1" src="/img/services/paint_7.jpg" alt="">
            <img v-if="paint == 2" src="/img/services/paint_6.jpg" alt="">
            <img v-if="paint == 3" src="/img/services/paint_4.jpg" alt="">
            <img v-if="paint == 4" src="/img/services/vibration.jpg" alt="">
            <img v-if="paint == 5" src="/img/services/sandblasted.jpg" alt="">
            <img v-if="paint == 6" src="/img/services/timesaver.jpg" alt="">
            <icon name="polish"></icon>
        </figure>
        <p class="title">
            {{paints.name}}
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            <icon name="star_panel2"></icon>
        </p>
        <figure class="info" v-if="paints.paints">
            <img :src="'/storage/'+paints.paints[paint].archivo" alt="">
            <p class="text">
                {{paints.paints[paint].description}}
            </p>
        </figure>
        <article class="paints list info">
            <figure @click="setPaint(i)" v-for="(f, i) in paints.paints">
                <img width="100%" :src="'/storage/'+f.archivo" alt="">
                <span class="category">
                    {{paints.name}}
                </span>
                <span class="text">
                    {{f.name}}
                </span>
            </figure>
        </article>
    </div>
</template>
<script>
export default {
    mounted(){
        
        
    },
    props: [
        'paints'
    ],
    data(){
        return {
            paint: 0
        }
    },
    methods: {
        setPaint(index){
            this.paint = index
        }
    }
}
</script>
