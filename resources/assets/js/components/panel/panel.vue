<template>
    <section class="section">
        <p class="title">Sitio</p>
        <ul class="panel-tabs" v-if="active == 1">
            <li :class="{'active': section == 0}" @click="setSec(0)">Slides</li>
            <li :class="{'active': section == 1}" @click="setSec(1)">Projects</li>
            <li :class="{'active': section == 2}" @click="setSec(2)">Materials</li>
            <li :class="{'active': section == 3}" @click="setSec(3)">Finishes</li>
            <li :class="{'active': section == 4}" @click="setSec(4)">Mills</li>
            <li :class="{'active': section == 5}" @click="setSec(5)">FAQS</li>
            <li :class="{'active': section == 6}" @click="setSec(6)">Skills</li>
        </ul>
        <transition-group name="fade" tag="div">
            <inbox :key="0" v-if="active == 0"></inbox>
            <sitio :key="1" v-if="active == 1"></sitio>
            <categories :key="2" v-if="active == 2"></categories>
            <votes :key="3" v-if="active == 3"></votes>
            <news :key="4" v-if="active == 4"></news>
        </transition-group>
    </section>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setPanel', ($event) => {
            this.active = $event.section;
        });
    },
    props: [
       
    ],
    data(){
        return {
           active: 1,
           section: 0
        }
    },
    methods: {
       setSec(index){
           this.section = index;
           this.$bus.$emit('setSec', {section: index});
       }
    }
}
</script>