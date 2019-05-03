<template>
    <div class="cont">
        <article v-if="!active" @click="setSection(3)">
            <figure>
                <img src="/img/services/welding_card.jpg" alt="">
            </figure>
            <p class="label">
                <icon name="welding"></icon>
                Welding
            </p>
        </article>
        <article class="sub" v-else>
            <div class="headline">
                <icon name="welding"></icon>
                <h1 class="subtitle">Welding</h1>
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
