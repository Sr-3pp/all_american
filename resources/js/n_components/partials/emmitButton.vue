<template>
    <button @click="emitEvent" :class="{'active': active}">
        <slot />
    </button>
</template>
<style lang="scss">

</style>
<script>
export default {
    data(){
        return {
            active: false
        }
    },
    props: [
        'ind', 'emmitname', 'emmitdata'
    ],
    mounted () {
        this.ind == 0 ? this.active = true : null;

        this.$bus.$on('disableTab', ($event) => {
            if ($event.index == this.ind) {
                this.active = true
            }else{
                this.active = false
            }
        })
    },
    methods: {
        emitEvent(){
             this.$bus.$emit(this.emmitname, this.emmitdata);

            this.$bus.$emit('disableTab', {index: this.ind})
            
            $([document.documentElement, document.body]).animate({
                scrollTop: ($("[s-sec=services]").offset().top / 2)
            }, 500);
        }
    }
}
</script>