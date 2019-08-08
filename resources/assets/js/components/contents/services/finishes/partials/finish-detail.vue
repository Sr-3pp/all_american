<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img v-if="finish == 0" src="/img/services/finish_8.jpg" alt="">
            <img v-if="finish == 1" src="/img/services/finish_7.jpg" alt="">
            <img v-if="finish == 2" src="/img/services/finish_6.jpg" alt="">
            <img v-if="finish == 3" src="/img/services/finish_4.jpg" alt="">
            <img v-if="finish == 4" src="/img/services/vibration.jpg" alt="">
            <img v-if="finish == 5" src="/img/services/sandblasted.jpg" alt="">
            <img v-if="finish == 6" src="/img/services/timesaver.jpg" alt="">
            <icon name="polish"></icon>
        </figure>
        <p class="title">
            {{finishes.name}}
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            <icon name="star_panel2"></icon>
        </p>
        <figure class="info" v-if="finishes">
            <img :src="'/storage/'+ofinish.archivo" alt="">
            <p class="text">
                {{finishes.description}}
            </p>
        </figure>
        <article class="finishes list info">
            <figure @click="setFinish(f, i)" v-for="(f, i) in finishes.finishes">
                <img width="100%" :src="'/storage/'+f.archivo" alt="">
                <span class="category">
                    {{finishes.name}}
                </span>
                <ul>
                    <li v-for="(base) in f.bases">{{base.name}}</li>
                </ul>
            </figure>
        </article>
    </div>
</template>
<script>
export default {
    mounted(){        
        
    },
    props: [
        'finishes'
    ],
    data(){
        return {
            finish: 0,
            ofinish: false
        }
    },
    methods: {
        setFinish(f, index){
            this.finish = index
            this.ofinish = f
        }
    },
    watch: {
        finishes: {
            handler(val, old){
                this.ofinish = val.finishes[0]                
            }
        }
    }
}
</script>
