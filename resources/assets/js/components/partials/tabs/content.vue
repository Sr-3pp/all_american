<template>
    <transition-group tag="section" class="tab-content">
        <article :key="1" v-if="section === 1">
            Contenido 1
        </article>
        <article :key="2" v-if="section === 2">
            Contenido 2
        </article>
        <article :key="3" v-if="section === 3">
            Contenido 3
        </article>
        <article :key="4" v-if="section === 4">
            Contenido 4
        </article>
        <article :key="5" v-if="section === 5">
            Contenido 5
        </article>
        <article :key="6" v-if="section === 6">
            Contenido 6
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