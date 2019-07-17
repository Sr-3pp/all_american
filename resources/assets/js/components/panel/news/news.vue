<template>
    <div class="content">
        <article v-if="newnew" class="new-new">
            <p class="form-group">
                <label>Title</label>
                <input class="input" type="text" v-model="nnew['title']">
            </p>
            <p class="form-group">
                <label>Content</label>
                <textarea class="input" type="text" v-model="nnew['content']"></textarea>
            </p>
            <p class="form-group">
                <label>Archivo</label>
                <input class="input" type="file" @change="setNewPic()">
            </p>
        </article>
        <div class="news">
            <article class="new" v-for="(n, i) in news">
                <figure class="cover">
                    <img width="100%" :src="'/storage/'+ n.archivo" alt="">
                </figure>
                <p class="s-text">
                    {{n.created_at}}
                </p>
                <div class="content">
                    <h3 class="category">{{n.title}}</h3>
                    <p class="s-text">
                        {{n.content}}
                    </p>
                </div>
                <div class="social">
                    <button class="btn">
                        <icon name="coment"></icon>
                    </button>
                    <button class="btn">
                        <icon name="like"></icon>
                    </button>
                    <button class="btn">
                        <icon name="share"></icon>
                    </button>
                </div>
            </article>
        </div>
        <div>
            <ul>
                <li>
                    Subscribers list
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this;
        this.$bus.$on('new', ($event) => {
            this.newnew ? this.newnew = false : this.newnew = true;
        });

        axios.get('/get-news').then((news) => {
            este.news = news.data
        });
    },
    props: [
       
    ],
    data(){
        return {
           news: false,
           newnew: false,
            nnew: {
                title: null,
                content: null,
                archivo: null
            }
        }
    },
    methods: {
       
    }
}
</script>