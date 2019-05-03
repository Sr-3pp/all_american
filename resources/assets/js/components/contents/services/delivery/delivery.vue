<template>
    <div class="cont">
        <article v-if="!active" @click="setSection(6)">
            <figure>
                <img src="/img/default.jpg" alt="">
            </figure>
            <p class="label">
                <icon name="delivery"></icon>
                Delivery
            </p>
        </article>
        <article class="sub" v-else>
            <div class="headline">
                <icon name="delivery"></icon>
                <h1 class="subtitle">Delivery</h1>
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
