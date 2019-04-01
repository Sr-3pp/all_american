<template>
    <div>
        <article v-if="section === index" v-for="(s, index) in services">
            <drop-list :list="s.list"></drop-list>
        </article>
        <img :src="image" width="20%" alt="">
    </div>
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
    props: ['services'],
    data(){
        return {
            section: 0,
            image: '/img/default.jpg',
        }
    },
    methods: {

    }
}
</script>