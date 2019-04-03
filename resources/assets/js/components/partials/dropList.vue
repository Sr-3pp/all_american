<template>
    <ul class="service-list drop-list" :class="{'content': content !== null}">
        <li v-if="name !== 'design' && content == null || content == index" v-for="(item, index) in list">
            <article @click="showContent(index, item.img)">
                <icon name="star"></icon>
                <p>
                    <span class="category">{{item.name}}</span>
                </p>
            <button class="btn">
                <icon v-if="content === null" name="chevron"></icon>
                <icon v-else name="minus"></icon>
            </button>       
            </article>
            <span v-if="content == index" class="text">{{item.content}}</span>     
        </li>
        <li v-if="name === 'design' && content == null || content == index" v-for="(item, index) in list">
            <p class="subtitle">
                <icon name="-"></icon>
                {{item.name}}
            </p>
            <p class="text">
                {{item.content}}          
            </p>
        </li>
    </ul>
</template>
<script>
export default{
    mounted(){
        console.log(this.list[0]);
        
    },
    props: [
        'list', 'name'
    ],
    data(){
        return {
            content: null
        }
    },
    methods: {
        showContent(index, img){
            this.content == index ? this.content = null : this.content = index;
            if(this.content !== null){
                this.$bus.$emit('setImg', {img: img});
            }else{
                 this.$bus.$emit('setImg', {img: '/img/default.jpg'});
            }
        }
    }
}
</script>