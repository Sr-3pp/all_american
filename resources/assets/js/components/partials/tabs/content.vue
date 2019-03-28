<template>
    <transition-group s-sec="services" tag="section" class="tab-content full-section">
        <article :key="s.id" v-if="section === index" v-for="(s, index) in services">
            <drop-list :list="s.list"></drop-list>
        </article>
        <img :key="7" :src="image" width="20%" alt="">
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
        }).$on('setImg', ($event) => {
            this.image = $event.img
        });
    },
    props: [
        'services'
    ],
    data(){
        return {
            section: 0,
            image: '/img/default.jpg'
        }
    },
    methods: {

    }
}
</script>