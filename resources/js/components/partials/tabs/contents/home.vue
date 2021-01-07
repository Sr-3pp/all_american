<template>
    <div>
        <article>
            <drop-list :list="list" name="home"></drop-list>
        </article>
        <transition-group tag="figure" name="v-fade">
            <img :key="image" :src="image" alt="">
        </transition-group>
    </div>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setImg', ($event) => {
                this.image = $event.img
		this.list = $event.list || this.list
        });
	this.list = this.services[0].list
    },
    props: ['services'],
    data(){
        return {
            section: 0,
            image: '/img/services/service_1.jpg',
	    list: false
        }
    },
    methods: {

    }
}
</script>
