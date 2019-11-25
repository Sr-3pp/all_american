<template>
    <div @click="active = false" class="overlay" :m-active="active"></div>
</template>
<style lang="scss">
    .overlay{
        position: fixed;
        width: 100vw;
        height: 100vh;
        max-width: 0;
        max-height: 0;
        top: 0;
        left: 0;
        background-color: rgba(#000, .8);
        z-index: 11;
        opacity: 0;
        transition: all .2s ease;
        &[m-active=true]{
            opacity: 1;
            max-height: 100vh;
            max-width: 100vw;
        }
    }
</style>
<script>
export default {
    data(){
        return {
            active: false
        }
    },
    mounted(){
        this.$bus.$on('overlay', ($event) => {            
            this.active = $event.sw
        });
    },
    watch: {
        active: {
            handler(val, old){
                if (!val) {
                    this.$bus.$emit('closeOverlay');
                }
            }
        }
    }
}
</script>