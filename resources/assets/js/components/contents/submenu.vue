<template>
    <ul>
        <li v-for="(item, index) in submenu">
            {{item}}
        </li>
    </ul>
</template>
<script>
export default {
    mounted(){

    },
    props: ['submenu'],
    data(){
        return {
            section: 1
        }
    },
    methods: {
        setTab(index){
            this.section = index
            this,$bus.$emit('setTab', {index: index});
        }
    }
}
</script>
