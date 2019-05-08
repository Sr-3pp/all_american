<template>
    <div class="cont">
        <article v-if="!active" @click="setSection(5)">
            <figure>
                <img src="/img/services/welding_card.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="painting"></icon>
                <p class="text">
                    Painting
                </p>
            </div>
        </article>
        <article class="sub" v-else>
            <div class="headline">
                <icon name="painting"></icon>
                <h1 class="subtitle">Painting</h1>
                <icon name="star_bar"></icon>
            </div>
        </article>
    </div>
</template>
<script>
export default {
    mounted(){

    },
    props: ['active'],
    data(){
        return {
           
        }
    },
    methods: {
        setSection(index){
            this.$bus.$emit('setTab', {section: index});
            this.active = true
        }
    }
}
</script>
