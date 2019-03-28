<template>
    <transition-group s-sec="services" :tag="tag" class="tab-content full-section">
        <article :key="s.id" v-if="section === index && name === 'home'" v-for="(s, index) in services">
            <drop-list :list="s.list"></drop-list>
        </article>
        <img v-if="name === 'home'" :key="7" :src="image" width="20%" alt="">
        <article :key="s.id" v-if="name === 'general'" v-for="(s, index) in services">
            <figure class="img">
                <img :src="s.list[0].img" alt="">
            </figure>
            <p class="text">
                <icon :name="s.icon"></icon>
                {{s.name}}
            </p>
        </article>
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
        if(this.name === 'general'){
            this.tag = 'div';
        }
    },
    props: [
        'services', 'name'
    ],
    data(){
        return {
            section: 0,
            image: '/img/default.jpg',
            tag: 'section'
        }
    },
    methods: {

    }
}
</script>