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
        <div class="info column header-text">
            <p class="title">
                {{finishes.name}}
            </p>  
            <icon name="estrella4"></icon>
            <figure class="text" v-if="finishes">
                <img :src="'/storage/'+otype.archivo" alt="">
                <p class="text">
                    {{finishes.description}}
                </p>
            </figure>
        </div>
        <article class="finishes list info">
            <figure @click="setType(f, i)" v-for="(f, i) in ofinish.types">
                <img width="100%" :src="'/storage/'+f.archivo" alt="">
                <span class="category">
                    {{finishes.name}}
                </span>
                <p class="text">{{f.description}}</p>
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
            ofinish: false,
            otype: false
        }
    },
    methods: {
        setFinish(f, index){
            this.finish = index
            this.ofinish = f
            
        },
        setType(t){
            this.otype = t;
        }
    },

    watch: {
        finishes: {
            handler(val, old){
                
                if(val.finishes.length){
                    this.ofinish = val.finishes[0]      
                    this.otype = this.ofinish.types[0]    
                }                     
            }
        }
    }
}
</script>
