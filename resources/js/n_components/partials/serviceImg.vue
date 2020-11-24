<template>
    <figure>
        <img :src="img" alt="">
    </figure>
</template>

<script>
export default {
    props: [
        'imgsrc'
    ],
    data() {
        return {
            img: false
        }
    },
    mounted() {
        this.imgsrc ? this.img = this.imgsrc : null;

        this.$bus.$on('setServiceImg', ($event) => {
            this.img = $event.img
        });
        
        this.$bus.$on('setTabContent', ($event) => {
            this.img = 'img/services/service_'+($event.index + 1)+'.jpg'
        });
    }
}
</script>