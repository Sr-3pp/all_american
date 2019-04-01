<template>
    <article class="tabs full-section">
        <ul>
            <ol v-for="(s, index) in services" :class="{'active': section === index}" @click="setTab(index)">
                <icon :name="s.icon"></icon>
                <p>
                    {{s.name}}
                </p>
            </ol>
        </ul>
    </article>
</template>
<script>
export default {
    mounted(){
        if(this.name === 'home'){
            this.section = 0
        }
        
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.index
        })
    },
    props: [
        'services', 'name'
    ],
    data(){
        return {
            section: false
        }
    },
    methods: {
        setTab(index){
            this.section = index
            this.$bus.$emit('setTab', {index: index});
        }
    }
}
</script>