<template>
    <section s-sec="last-news" class="full-section">
        <h2 class="title">Last News</h2>
        <div class="news">
            <article v-for="(n, index) in news" class="new">
                <figure class="cover" @click="goToNew(n.id)">
                    <img :src="'/storage/'+n.archivo" alt="">
                </figure>
                <p class="s-text" @click="goToNew(n.id)">
                    {{n.fecha}}
                </p>
                <div class="content" @click="goToNew(n.id)">
                    <h3 class="category">{{n.title}}</h3>
                    <p class="s-text">
                        {{n.prev}}
                    </p>
                </div>
                <div class="social">
                    <button class="btn">
                        <icon name="coment"></icon>
                    </button>
                    <button class="btn" @click="likeNew(n, index)">
                        <icon name="like"></icon>
                    </button>
                    <button class="btn">
                        <icon name="share"></icon>
                    </button>
                </div>
            </article>
        </div>
    </section>
</template>
<script>
export default {
    mounted(){
        
    },
    props: [
        'news'
    ],
    data(){
        return {

        }
    },
    methods: {
        likeNew(n, i){
            var este = this;
            axios.get('/like-new/'+n.id).then((response) => {
                este.news[i].likes.push(response.data)
            });
        },
        goToNew(id){
            window.location.href = '/new/'+id
        }
    }
}
</script>
