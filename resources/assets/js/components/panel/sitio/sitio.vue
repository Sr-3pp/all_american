<template>
    <transition-group tag="div" class="content">
        <slides :key="0" v-if="active == 0"></slides>
        <mills :key="4" v-if="active == 4"></mills>
    </transition-group>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setSec', ($event) => {
            this.active = $event.section;
        })
    },
    props: [
       
    ],
    data(){
        return {
           active: 0
        }
    },
    methods: {
       
    }
}
</script>