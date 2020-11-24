<template>
    <div s-desk="news" class="content">
        <ul class="news-menu">
            <li :class="{'active': sec == 'news'}" @click="sec = 'news'">
                News
            </li>
            <li :class="{'active': sec == 'subs'}" @click="sec = 'subs'">
                subscribers
            </li>
        </ul>
        <article v-if="newnew" class="new-new">
             <p class="form-group">
                <label>Portada</label>
                <upload-picture></upload-picture>
            </p>
            <p class="form-group">
                <label>Title</label>
                <input class="input" type="text" v-model="nnew['title']">
            </p>
            <p id="quill-editor" class="form-group">
                <label>Content</label>
                <editor></editor>
            </p>
            <button class="btn" @click="saveNew()">save</button>
        </article>
        <div v-if="sec == 'news'" class="news">
            <article class="new" v-for="(n, i) in news">
                <figure class="cover">
                    <img width="100%" :src="'/storage/'+ n.archivo" alt="">
                    <figcaption class="buttons">
                        <button class="btn" @click="editNew(n, i)">edit</button>
                        <button class="btn" @click="deleteNew(n, i)">Delete</button>
                    </figcaption>
                </figure>
                <ul class="social-list">
                    <li>
                        <p class="s-text">
                            {{n.created_at}}
                        </p>
                    </li>
                    <li>
                        <p class="s-text">
                            <icon name="like"></icon>
                            {{n.likes.length}}
                        </p>
                    </li>
                    <li>
                        <social-sharing class="s-text" :url="'https://allamericanfinishing.com/new/'+n.id"
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
                    </li>
                    <li  @click="socialNew(n, i, 'comments')">
                        <p class="s-text">
                            <icon name="coment"></icon>
                            {{n.comments.length}}
                        </p>
                    </li>
                </ul>
                <div class="content">
                    <h3 class="category">{{n.title}}</h3>
                    <div class="s-text" v-html="$options.filters.noImg(n.content)"></div>
                </div>
            </article>
        </div>
        <div v-if="sec == 'subs'">
            <ul class="sub-list">
                <li v-for="(s, i) in subs">
                    {{s.email}}
                    <div class="buttons">
                        <button class="btn" @click="unsuscribe(s.id, i)">Remove</button>
                    </div>
                </li>
            </ul>
        </div>
        <section class="detail-new modal" :s-open="newEdit">
                <button class="btn close-btn" @click="editNew()">
                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
                    <path fill="#E04F5F" d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1          C393,504.1,504.1,393,504.1,256z"/>
                    <path fill="#FFFFFF" d="M285,256l72.5-84.2c7.9-9.2,6.9-23-2.3-31c-9.2-7.9-23-6.9-30.9,2.3L256,222.4l-68.2-79.2    c-7.9-9.2-21.8-10.2-31-2.3c-9.2,7.9-10.2,21.8-2.3,31L227,256l-72.5,84.2c-7.9,9.2-6.9,23,2.3,31c4.1,3.6,9.2,5.3,14.3,5.3    c6.2,0,12.3-2.6,16.6-7.6l68.2-79.2l68.2,79.2c4.3,5,10.5,7.6,16.6,7.6c5.1,0,10.2-1.7,14.3-5.3c9.2-7.9,10.2-21.8,2.3-31L285,256    z"/>
                </svg>
            </button>
            <article class="modal-body"  v-show="enew">
                <figure>
                    <p @click="changePortada()">
                        <img  width="100%" :src="'/storage/'+enew.archivo" alt="">
                    </p>
                    <input id="filePortada" type="file" accept="image" class="hidden" @change="setNewPic($event)">  
                    <figcaption>
                        <input type="text" class="input" v-model="enew.title">
                    </figcaption>
                </figure>
                <editor :content="enew.content"></editor>
                <button class="btn" @click="updateNew()">Save</button>
            </article>
            <article class="modal-body" v-if="nsocial">
                <ul>
                    <li>Comments</li>
                    <li v-for="(l, inde) in this.nsocial.comments">{{l}}</li>
                </ul>
            </article>
        </section>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this;
        this.$bus.$on('new', ($event) => {
            this.newnew ? this.newnew = false : this.newnew = true;
        }).$on('setPicture', ($event) => {
            this.nnew.archivo = $event.picture
        }).$on('recieve-data', ($event) => {
            
            if($event.edit != null && $event.edit){
                this.enew.content = $event.content
                
           }else{
               this.nnew.content = $event.content
           }
        });

        axios.get('/get-news').then((news) => {
            este.news = news.data
        });
        axios.get('/panel/get-subs').then((subs) => {
            este.subs = subs.data
        });
    },
    props: [
       
    ],
    data(){
        return {
           news: false,
           subs: false,
           sec: 'news',
           enew: false,
           newnew: false,
           newEdit: false,
           nsocial: false,
            nnew: {
                title: null,
                content: null,
                archivo: null
            }
        }
    },
    methods: {
       saveNew(){
           this.getContent();
           var este = this,
                formData = new FormData();

                formData.append('title', this.nnew.title);
                formData.append('content', JSON.stringify(this.nnew.content));
                formData.append('archivo', this.nnew.archivo);
            axios.post('/panel/add-new', formData).then((response) => {
                este.newnew = false;
                este.nnew.title = null
                este.nnew.archivo = null
                este.nnew.content = null

                este.news.push(response.data)
            });
       },
       getContent(){
           this.$bus.$emit('request-data');
       },
       setNewPic($event){
           this.enew.archivo = $event.target.files[0];
       },
       editNew(n, i){
           this.newEdit ? this.newEdit = false : this.newEdit = true
           this.enew ? this.enew = false : this.enew = n
       },
       socialNew(n, i){
           this.nsocial ? this.nsocial = false : this.nsocial = n
           this.newEdit ? this.newEdit = false : this.newEdit = true
       },
       deleteNew(n, i){
           if(confirm('delete New?')){
               var este = this;
               axios.get('/panel/delete-new/'+n.id).then((response) =>{
                   este.news.splice(i, 1);
               });
           }
       },
       changePortada(){
           $('#filePortada').click();
       },
       updateNew(){
            this.$bus.$emit('request-data');  
             var este = this,
                formData = new FormData();

                formData.append('title', this.enew.title);
                formData.append('content', JSON.stringify(this.enew.content));
                formData.append('archivo', this.enew.archivo);     

                axios.post('/panel/update-new/'+this.enew.id, formData).then((response) =>{
                   este.newEdit = false
                   este.enew = false;
               });
                
       },
       unsuscribe(id, i){
           if(confirm('Remove this user form list?')){
               var este = this;
               axios.get('/panel/unsuscribe/'+id).then((response) => {
                   este.susbs.splice(i, 1);
               });
           }
       }
    },
    watch: {
        newEdit: {
            handler(val, old){
                $('.overlay').first().attr('s-active', val);
            }
        }

    },
    filters: {
        noImg: function(value){
           if(value != null){
                var content = value;
                 content = content.replace(/<img[^>]*>/g,"");
                 content = content.replace(/<[^\/>][^>]*><\/[^>]+>/gim, "");
                return content;
           }
        }
    }
}
</script>