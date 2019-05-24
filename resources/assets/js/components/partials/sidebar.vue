<template>
    <nav class="sidebar">
        <ul>
            <ol>
                <button @click="setSec(0)" class="btn" :class="{'active': active == 0}">Inbox <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(1)" class="btn" :class="{'active': active == 1}">Site <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(2)" class="btn" :class="{'active': active == 2}">Categories <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(3)" class="btn" :class="{'active': active == 3}">Votes <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(4)" class="btn" :class="{'active': active == 4}">News <icon name="planning"></icon></button>
            </ol>
        </ul>
    </nav>
</template>
<script>
export default{
    mounted(){
        
    },
    props: [
       
    ],
    data(){
        return {
        active: 1
        }
    },
    methods: {
       setSec(index){
           this.active = index;
           this.$bus.$emit('setPanel', {section: index});
       }
    }
}
</script>