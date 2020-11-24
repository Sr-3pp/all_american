<template>
    <section s-sec="last-news">
        <comment-modal></comment-modal>
        <h2 class="title">Last News</h2>
        <slick class="news" ref="slick"  :options="slickOptions">
            <article v-for="(n, index) in news" class="new">
                <figure class="cover" @click="goToNew(n.id)">
                    <img :src="'/storage/'+n.archivo" alt="">
                </figure>
                <p class="s-text" @click="goToNew(n.id)">
                    {{n.fecha}}
                </p>
                <div class="content" @click="goToNew(n.id)">
                    <h3 class="category">{{n.title}}</h3>
                    <p class="s-text" v-html="n.content"></p>
                </div>
                <div class="social">
                    <button class="btn" @click="$bus.$emit('comment-article', {article: n})">
                        <icon name="coment"></icon>
                    </button>
                    <button :class="{'liked': liked == 'new_'+index}" class="btn like" @click="likeNew(n, index)">
                        <icon name="like"></icon>
                    </button>
                    <social-sharing class="btn" :url="'https://allamericanfinishing.com/new/'+n.id"
                                            :title="n.title"
                                            :description="n.content"
                                            :quote="n.content"
                                            hashtags="allamericanfinishing, building, finishes, polish, angles"
                                            inline-template>
                        <div>
                            <network network="facebook">
                                <icon name="share"></icon>
                            </network>
                        </div>
                    </social-sharing>
                </div>
            </article>
        </slick>
    </section>
</template>
<script>
import '../../../../../node_modules/slick-carousel/slick/slick.css';
import Slick from 'vue-slick';
export default {
    components: { Slick },
    mounted(){
        
    },
    props: [
        'news'
    ],
    data(){
        return {
            liked: false,
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 1,
                rows: 0,
                arrows: false,
                dots: false,
                centerMode: true,
                centerPadding: '40px',
                responsive: [
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                        }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                    ]
            },
        }
    },
    methods: {
        likeNew(n, i){
            var este = this;
            if (this.liked !== 'new_'+i) {
                axios.get('/like-new/'+n.id).then((response) => {
                    este.news[i].likes.push(response.data)
                    este.liked = 'new_'+i
                });
            }
        },
        goToNew(id){
            window.location.href = '/new/'+id
        }
    }
}
</script>
