<template>
    <div class="social-actions">
            <article class="new-info">
                <p>{{fecha}}</p>
                    <p @click="like()">
                        <icon name="like"></icon>
                        {{likes.length}}
                    </p>
                    <p @click="comment ? comment = false: comment = true">
                        <icon name="coment"></icon>
                        {{comments.length}}
                    </p>
            </article>
            <hr>
            <article>
                <ul>
                    <ol v-if="comment">
                        <div>
                            <p class="form-group">
                                <label>Email</label>
                                <span class="must" v-if="registered.alert.status">{{registered.alert.text}}</span>
                                <input type="text" class="input" v-model="email">
                            </p>
                            <p class="form-group">
                                <textarea rows="3" class="input" placeholder="Place your comment here" v-model="ncomment"></textarea>
                            </p>
                            <button class="btn" @click="validateComment()">
                                Submit
                            </button>
                        </div>
                    </ol>
                    <ol class="text" v-for="(c, ind) in comments">
                        <div>
                            <p>
                                {{c.newsletter.email}}
                            </p>
                            <p>
                                {{c.comment}}
                            </p>
                        </div>
                    </ol>
                </ul>
            </article>
    </div>
</template>
<script>
export default {
    mounted(){
               
    },
    props: [
        'likes', 'comments', 'id', 'fecha'
    ],
    data(){
        return {
            ncomment: null,
            comment: false,
            registered: {
                status: false,
                alert: {
                    status: false,
                    text: 'You must be subscribed into our newsletter, then you can comment.'
                },
                id: false
            },
            email: null,
             re: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
        }
    },
    methods: {
        like(){
            var este = this;
            axios.get('/like-new/'+this.id).then((response) => {
                este.likes.push(response.data);
            });
        },
        validateComment(){
            var este = this;
            if(this.re.test(this.email)){
                este.registered.alert.status = false;
                axios.post('/check-mail', {email: this.email}).then((resp) => {
                     if(resp.data !== 0){
                        if(este.ncomment != null){
                            este.registered.id = resp.data.id
                            este.submit()
                        }else{
                            este.registered.alert.text = 'You Must write a comment';
                            este.registered.alert.status = true;
                        }
                     }else{
                          este.registered.alert.text = 'You must be subscribed into our newsletter, then you can comment.';
                            este.registered.alert.status = true;
                     }
                });
            }else{
                 este.registered.alert.text = 'Verify your email';
                este.registered.alert.status = true;
            }
        },
        submit(){
             var este = this,
                    formData = new FormData();

                    formData.append('article_id', this.id);
                    formData.append('newsletter_id', this.registered.id);
                    formData.append('comment', this.ncomment);

                    axios.post('/comment-new/'+this.id, formData).then((response) => {
                        este.comments.push(response.data);
                        este.comment = false
                        este.ncomment = null
                        este.email = null
                        este.registered.status = false
                        este.registered.alert.status = false
                        este.registered.id = false
                    }).catch(e => {
              
                    });
        }
    },
    watch: {
        comments: {
            handler(val, old){
                 console.log(val);
            }
        },
        likes: {
            handler(val, old){
                console.log(val);
                
            }
        },
    }
}
</script>
