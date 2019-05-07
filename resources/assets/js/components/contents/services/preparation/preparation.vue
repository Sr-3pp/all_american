<template>
    <div class="cont">
        <article v-if="!active" @click="setSection(2)">
            <figure>
                <img src="/img/services/preparation_card.jpg" alt="">
            </figure>
            <p class="label">
                <icon name="preparation"></icon>
                Preparation
            </p>
        </article>
        <article class="sub" v-else>
            <div class="headline">
                <icon name="preparation"></icon>
                <h1 class="subtitle">Preparation</h1>
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
        }
    }
}
</script>
