<template>
    <ul class="service-list drop-list" :class="{'content': content !== null}">
        <li v-if="name === 'home' && content == null || content == index" v-for="(item, index) in list">
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
        <li v-if="name === 'general'" v-for="(item, index) in list">
            <article  @click="showContent(index, item.img)">
                <p class="subtitle">
                <icon v-if="show === 'item_'+index" name="-"></icon>
                <icon v-if="show !== 'item_'+index"  name="+"></icon>
                {{item.name}}
                </p>
                <p v-html="item.content" v-if="show === 'item_'+index" class="text"></p>
            </article>
        </li>
    </ul>
</template>
<script>
export default{
    mounted(){
        
    },
    props: [
        'list', 'name'
    ],
    data(){
        return {
            content: null,
            show: 'item_0'
        }
    },
    methods: {
        showContent(index, img){
            if (this.name === 'home') {
                this.content == index ? this.content = null : this.content = index;
                if(this.content !== null && this.name !== 'design'){
                    this.$bus.$emit('setImg', {img: img});
                }else{
                    this.$bus.$emit('setImg', {img: '/img/services/concept.jpg'});
                }
            }else{
                this.show = 'item_'+index
            }
        }
    }
}
</script>