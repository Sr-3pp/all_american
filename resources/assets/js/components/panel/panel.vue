<template>
    <section class="section">
        <p class="title">Slides</p>
        <transition-group name="fade">
            <inbox :key="1" v-if="active == 0"></inbox>
            <slides :key="1" v-if="active == 1"></slides>
            <mills :key="6" v-if="active == 6"></mills>
        </transition-group>
    </section>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setPanel', ($event) => {
            this.active = $event.section;
        })
    },
    props: [
       
    ],
    data(){
        return {
           active: 1
        }
    },
    methods: {
       
    }
}
</script>