<template>
    <transition-group tag="div" class="content">
        <slides :key="0" v-if="active == 0"></slides>
        <projects-panel :key="1" v-if="active == 1"></projects-panel>
        <materials :key="2" v-if="active == 2"></materials>
        <finishes-panel :key="3" v-if="active == 3"></finishes-panel>
        <mills :key="4" v-if="active == 4"></mills>
        <faqs :key="5" v-if="active == 5"></faqs>
        <skills :key="6" v-if="active == 6"></skills>
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