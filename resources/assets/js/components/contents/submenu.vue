<template>
    <ul>
        <li v-for="(item, index) in submenu" :class="{'active': section == index}" @click="setTab(index)">
            <icon v-if="section == index" name="chevron"></icon>
            {{item}}
        </li>
    </ul>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.section-1
        });
    },
    props: ['submenu'],
    data(){
        return {
            section: null
        }
    },
    methods: {
        setTab(index){
            if(this.section == index){
                this.section = null
                this.$bus.$emit('setTab', {section: 0});
            }else{
                this.section = index
                this.$bus.$emit('setTab', {section: index+1});
            }
        }
    }
}
</script>
