<template>
    <nav class="sidebar">
        <ul>
            <ol>
                <button @click="setSec(0)" class="btn" :class="{'active': active == 0}">Inbox <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(1)" class="btn" :class="{'active': active == 1}">Slides <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(2)" class="btn" :class="{'active': active == 2}">Projects <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(3)" class="btn" :class="{'active': active == 3}">Materials <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(4)" class="btn" :class="{'active': active == 4}">Categories <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(5)" class="btn" :class="{'active': active == 5}">Finishes <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(6)" class="btn" :class="{'active': active == 6}">Mills <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(7)" class="btn" :class="{'active': active == 7}">Votes <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(8)" class="btn" :class="{'active': active == 8}">FAQS <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(9)" class="btn" :class="{'active': active == 9}">Skills <icon name="planning"></icon></button>
            </ol>
            <ol>
                <button @click="setSec(10)" class="btn" :class="{'active': active == 10}">Newsletter Subs <icon name="planning"></icon></button>
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