<template>
    <ul>
        <li v-for="(item, index) in submenu" :class="{'active': section == index}">
            <span class="text" @click="setTab(index)">{{item.name}}</span>
            <ul v-if="section == index && item.sub != undefined">
                <li v-for="(sm, i) in item.sub" @click="setSub(i)">{{sm}}</li>
            </ul>
        </li>
    </ul>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.section = $event.section-1
        });
         if(this.sec == 'design-and-planning'){
            this.section = 0
        }else if(this.sec == 'preparation'){
            this.section = 1
        }else if(this.sec == 'welding'){
            this.section = 2
        }else if(this.sec == 'finishes'){
            this.section = 3
        }else if(this.sec == 'painting'){
            this.section = 4
        }else if(this.sec == 'delivery'){
            this.section = 5
        }
        
    },
    props: ['submenu', 'sec'],
    data(){
        return {
            section: null,
        }
    },
    methods: {
        setTab(index){
            this.section = index
            this.$bus.$emit('setTab', {section: index+1});
        },
        setSub(index){
             this.$bus.$emit('setSub', {section: index});
        }
    }
}
</script>
