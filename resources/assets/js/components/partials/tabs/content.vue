<template>
    <transition-group s-sec="services" :tag="tag" class="tab-content full-section">
        <tabs-content-home v-if="name === 'home'" :key="0" :services="services"></tabs-content-home>
        <tabs-content-general v-if="name === 'general'" :key="1" :services="services"></tabs-content-general>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        if(this.name === 'general'){
            this.tag = 'div';
        }else{
            this.section = 0
        }
    },
    props: [
        'services', 'name'
    ],
    data(){
        return {
            tag: 'section'
        }
    },
    methods: {

    }
}
</script>