<template>
    <div s-desk="slides">
        <ul>
            <ol v-if="newSlide">
                <upload-picture></upload-picture>
                <article>
                    <button class="btn" @click="nslide.caption ? nslide.caption = false : nslide.caption = true">
                        <span v-if="!nslide.caption">Add caption <icon name="+"></icon></span>
                        <span v-else>Cancel <icon name="-"></icon></span>
                    </button>
                    <button class="btn" @click="saveSlide()">
                        Save
                    </button>
                    <div v-if="nslide.caption" class="form-group">
                        <p>
                            <label>Title</label>
                            <input class="input" type="text" v-model="nslide.title">
                        </p>
                        <p>
                            <label>Description</label>
                            <input class="input" type="text" v-model="nslide.description">
                        </p>
                    </div>
                </article>
            </ol>
            <ol v-for="(slide, index) in slides">
                <figure>
                    <img src="/img/default.jpg" alt="">
                    <p class="caption">
                        <span class="title">
                            Si que si
                        </span>
                        <span class="text">
                            Vola volar
                        </span>
                    </p>
                </figure>
                <article>
                    <button class="btn">Delete</button>
                    <button class="btn">Edit</button>
                    <button class="btn">Caption</button>
                </article>
            </ol>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        axios.get('/panel/get-slides').then((slides) => {
            this.slides = slides.data            
        });
        this.$bus.$on('new', ($event) => {
            if($event.section == 0){
                this.newSlide ? this.newSlide = false : this.newSlide = true
            }
        }).$on('setPicture', ($event) => {
            this.nslide.archivo = $event.picture                        
        });
    },
    props: [
       
    ],
    data(){
        return {
           slides: null,
           newSlide: false,
           nslide: {
               caption: false,
               title: '',
               description: '',
               archivo: null
           }
        }
    },
    methods: {
       saveSlide(){
           var este = this,
                extra = {},
                formData = new FormData();

                extra.title = this.nslide.title
                extra.description = this.nslide.description

                formData.append('extra', JSON.stringify(extra));
                formData.append('archivo', this.nslide.archivo);
           axios.post('/panel/save-slide', formData).then(function(response){
               console.log(response);
               
           }).catch( (e) => {
               console.log(e)
           });
       }
    }
}
</script>