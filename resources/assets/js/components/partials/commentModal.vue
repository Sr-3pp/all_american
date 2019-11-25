<template>
    <transition name="v-slide-down">
        <div v-if="article" class="comment-modal">
            <div class="modal-header">
                <figure class="modal-headpic">
                    <img :src="'/storage/'+article.archivo" alt="">
                </figure>
                <p class="title">
                    {{article.title}}
                </p>
                <button class="btn close" @click="article = false">
                    <icon name="+"></icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="article-comment form">
                    <div class="form-group">
                        <label :m-empty="com.comment.name == '' ? true: false">Name</label>
                        <input type="text" class="input" v-model="com.comment.name">
                    </div>
                    <div class="form-group">
                        <label :m-empty="com.comment.email == '' ? true: false">Email</label>
                        <input type="email" class="input" v-model="com.comment.email">
                    </div>
                    <div class="form-group">
                        <label :m-empty="com.comment.message == '' ? true: false">Comment</label>
                        <textarea class="input" v-model="com.comment.message"></textarea>
                    </div>
                    <button class="btn" type="button" @click="comment()">Comment</button>
                </div>
                <div class="comments" v-if="comments.length">
                    <article v-for="(c, index) in comments">
                        <p class="text"><b>{{c.comment.name}}</b></p>
                        <p class="s-text">{{c.comment.email}}</p>
                        <p class="text">{{c.comment.message}}</p>
                    </article>
                </div>
            </div>
        </div>
    </transition>
</template>
<style lang="scss">
    .comment-modal{
        position: fixed;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80%;
        max-width: 1100px;
        z-index: 12;
        background-color: #FFF;
        padding: 3%;
        color: #000;
        max-height: 90vh;
         overflow-y: auto;
        .modal-header{
            position: relative;
            margin-bottom: 5%;
            .btn{
                &.close{
                    position: absolute;
                    top: 0;
                    right: 0;
                    z-index: 3;
                    background-color: #FFF;
                    width: 20%;
                    border-radius: 0!important;
                    svg{
                        transform: rotate(45deg);
                        width: 5%;
                        height: 5%;
                        min-width: 30px;
                        min-height: 30px;
                        color: #000;
                    }
                }
            }
            .modal-headpic{
                width: 100%;
                position: relative;
                overflow: hidden;
                min-height: 30vh;
                img{
                    position: absolute;
                    width: 100%;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                }
            }
            >.title{
                width: 100%;
                margin: 10% 0;
                color: #000!important;
                font-size: 100%!important;
            }
        }
        .modal-body{
            .article-comment{
                &.form{
                    flex-direction: row!important;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    margin-bottom: 10%;
                    >*{
                        min-width: 200px;
                        padding: 0 3%;

                        flex: {
                            grow: 1;
                            shrink: 1;
                            basis: 30%;
                        }
                    }
                    .form-group{
                        position: relative;
                        label{
                            position: absolute;
                            top: 25%;
                            left: 3%;
                            z-index: -1;
                            transform: translateY(-50%);
                            transition: all .2s ease;
                            &:not([m-empty=true]){
                                opacity: 0;
                            }
                        }
                        input, textarea{
                            background-color: transparent;
                        }
                    }
                    .btn{
                        align-self: center;
                        justify-self: flex-end;
                        width: 30%;
                    }
                }
            }
            .comments{
                >*{
                    margin-bottom: 5%;
                    >p{
                        &:last-child{
                            margin-top: 2%;
                        }
                    }
                }
            }
        }
    }
</style>
<script>
export default {
    data(){
        return {
            article: false,
            comments: false,
            com: {
                article_id: false,
                comment: {
                    name: '',
                    email: '',
                    message: ''
                }
            }
        }
    },
    mounted(){
        this.$bus.$on('comment-article', ($event) => {
            this.article = $event.article;
            this.comments = this.article.comments;
            console.log(this.comments);
            
            this.com.article_id = this.article.id;
            this.$bus.$emit('overlay', {sw: true});
        }).$on('closeOverlay', ($event) => {
            this.article = false
        });
    },
    methods: {
        comment(){
            var este = this;
            this.com.comment = JSON.stringify(this.com.comment);
            if(this.com.name != '' && this.com.email != '' && this.com.message != ''){
                axios.post('/set-comment', this.com).then(function(response){
                    este.comments.push(response.data)
                });
            }            
            
        }
    },
    watch: {
        article: {
            handler(val, old){
                if(!val){
                    this.$bus.$emit('overlay', {sw: false});
                }
            }
        }
    }
}
</script>