<template>
    <div class="detail">
        <figure class="header" :data-cat="category">
            <icon name="triangle"></icon>
            <img v-if="category == 1" src="/img/services/chart.jpg" alt="">
            <img v-if="category == 2" src="/img/services/powder.jpg" alt="">
            <img v-if="category == 3" src="/img/services/patina.jpg" alt="">
            <icon name="painting"></icon>
        </figure>
        <p class="title">
            {{paint.name}}
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
       <!--  <article class="paints list info">
            <figure @click="setPaint(i)" v-for="(f, i) in paint.attributes">
                <img v-if="archivo != undefined" width="100%" :src="'/storage/'+f.archivo" alt="">
                <span class="category">
                    {{paint.name}}
                </span>
                <span class="text">
                    {{i}}
                </span>
            </figure>
        </article> -->
    </div>
</template>
<script>
export default {
    mounted(){
        if(this.paints['finish Chart'][0] && this.paints['finish Chart'][0].attributes.category == 1){
            this.paint = this.paints['finish Chart'];
            this.paint.name = 'Finish Chart';
        }else if(this.paints['powder coat'][0] && this.paints['powder coat'][0].attributes.category == 2){
            this.paint = this.paints['powder coat'];
            this.paint.name = 'Powder Coat';
        }else if(this.paints['patina'][0] && this.paints['patina'][0].attributes.category == 3){
            this.paint = this.paints['patina'];
            this.paint.name = 'Patina';
        }
        console.log(this.paint);
        
    },
    props: [
        'paints', 'category'
    ],
    data(){
        return {
            paint: false,
        }
    },
    methods: {
        setPaint(index){
            this.paint = index
        }
    }
}
</script>
