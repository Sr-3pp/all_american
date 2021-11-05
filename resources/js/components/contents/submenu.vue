<template>
    <ul>
        <li v-for="(item, index) in submenu" :key="index+1" :class="{'active': section == index}">
            <article v-if="item.sub">
                <span class="text" @click="setTab(index)">{{item.name}}
                    <icon @click="showSub(index)" name="chevron"></icon>
                </span>
                <ul v-if="section == index && item.sub != undefined">
                    <li :class="{'active': sub == i}" v-for="(sm, i) in item.sub" @click="setSub(i)">{{sm}}</li>
                </ul>
            </article>
            <button :class="{active: current == index}" @click="setCurrent(item, index)" v-else>
                <span class="text">{{item.name}}
                    <icon name="star"></icon>
                </span>
            </button>
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
            sub: null,
            current: null
        }
    },
    methods: {
        setTab(index){
            this.section = index
            this.$bus.$emit('setTab', {section: index+1});
            this.sub = null
        },
        setSub(index){
             this.$bus.$emit('setSub', {section: index});
             this.sub = index
        },
        showSub(i){
            this.section ? this.section = null : this.section = i;
        },
        setCurrent(item, index){
            this.current = index
            this.$bus.$emit('setSumbenuSection', {cat: item, index: index})
        }
    }
}
</script>
