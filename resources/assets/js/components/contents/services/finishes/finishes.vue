<template>
    <div class="cont">
        <article v-if="!active" @click="setSection(4)">
            <figure>
                <img src="/img/services/polish_cards.jpg" alt="">
            </figure>
            <p class="label">
                <icon name="polish"></icon>
                Finishes
            </p>
        </article>
        <article class="sub" v-else>
            <div class="headline">
                <icon name="polish"></icon>
                <h1 class="subtitle">Finishes</h1>
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
