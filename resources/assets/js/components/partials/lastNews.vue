<template>
    <section s-sec="last-news" class="full-section">
        <h2 class="title">Last News</h2>
        <div class="news">
            <article v-for="(n, index) in news" class="new">
                <figure class="cover">
                    <img src="/img/default.jpg" alt="">
                </figure>
                <p class="s-text">
                    {{n.fecha}}
                </p>
                <div class="content">
                    <h3 class="category">{{n.title}}</h3>
                    <p class="s-text">
                        {{n.prev}}
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
    </section>
</template>
<script>
export default {
    mounted(){
        console.log(this.news);
        
    },
    props: [
        'news'
    ],
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
