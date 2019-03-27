<template>
    <ul class="service-list drop-list">
        <li v-for="(item, index) in list">
            <article>
                <icon name="star"></icon>
                <span v-if="content != index">{{item.name}}</span>
                <p v-if="content == index">{{item.content}}</p>
            </article>
            <button @click="showContent(index)"><icon name="chevron"></icon></button>            
        </li>
    </ul>
</template>
<script>
export default{
    mounted(){

    },
    props: [
        'list'
    ],
    data(){
        return {
            content: null
        }
    },
    methods: {
        showContent(index){
            this.content == index ? this.content = null : this.content = index
        }
    }
}
</script>