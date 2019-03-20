<template>
    <article class="tabs">
        <ul>
            <ol :class="{'active': section === 1}" @click="setTab(1)">
                Tab 1
            </ol>
            <ol :class="{'active': section === 2}" @click="setTab(2)">
                Tab 2
            </ol>
        </ul>
    </article>
</template>
<script>
export default {
    mounted(){

    },
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