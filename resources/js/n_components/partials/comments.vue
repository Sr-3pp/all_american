<template>
    <div class="comments">
        <ul v-if="comments.length" class="comment-list">
            <template v-for="(c, i) in comments">
                <li v-if="c.comment.email" class="comment-list-item" :key="i+1">
                    <p class="text name"  m-font="bold">
                        {{c.comment.name}}
                    </p>
                    <p class="text">
                        {{c.comment.message}}
                    </p>
                </li>
                <li v-else class="comment-list-item" :key="i+1">
                    {{c.comment}}
                </li>
            </template>
        </ul>
        
        <p v-else class="title first">Be the first comment</p>
    </div>
</template>

<script>
export default {
    props: [
        'list'
    ],
    data (){
        return {
            comments: []
        }
    },
    mounted(){
        this.comments = JSON.parse(this.list)
        console.log(this.comments);
    }
}
</script>

<style lang="scss">
    @import '../../../sass/_variables.scss';
    .comments{
        .comment-list{
            list-style: none;
            &-item{
                color: $dark;
                border-bottom: {
                    style: solid;
                    color: $Ablue;
                    width: 1px;
                };
                .name{
                    font-weight: bold!important;
                }
            }
        }
    }
</style>