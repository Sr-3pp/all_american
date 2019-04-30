<template>
    <section s-sec="services" class="main">
        <design-planning v-if="!active || active == 1"></design-planning>
        <preparation v-if="!active || active == 2"></preparation>
    </section>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return{
            section: false,
            active: false
        }
    },
    methods: {

    }
}
</script>

