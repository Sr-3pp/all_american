<template>
    <transition-group tag="section" class="tab-content">
        <article v-if="section === 1">
            Contenido 1
        </article>
        <article v-if="section === 2">
            Contenido 2
        </article>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
        });
    },
    data(){
        return {
            section: 1
        }
    },
    methods: {

    }
}
</script>