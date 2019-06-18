<template>
    <section class="modal" s-target="gallery" :s-open="active">
        <div class="modal-header">
            <p class="modal-title">
                {{modal.title}}
            </p>
            <button class="close-btn" @click="active = false">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" xml:space="preserve">
                    <path fill="#E04F5F" d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1          C393,504.1,504.1,393,504.1,256z"/>
                    <path fill="#FFFFFF" d="M285,256l72.5-84.2c7.9-9.2,6.9-23-2.3-31c-9.2-7.9-23-6.9-30.9,2.3L256,222.4l-68.2-79.2    c-7.9-9.2-21.8-10.2-31-2.3c-9.2,7.9-10.2,21.8-2.3,31L227,256l-72.5,84.2c-7.9,9.2-6.9,23,2.3,31c4.1,3.6,9.2,5.3,14.3,5.3    c6.2,0,12.3-2.6,16.6-7.6l68.2-79.2l68.2,79.2c4.3,5,10.5,7.6,16.6,7.6c5.1,0,10.2-1.7,14.3-5.3c9.2-7.9,10.2-21.8,2.3-31L285,256    z"/>
                </svg>
            </button>
        </div>
        <div class="modal-body">
            <div class="panel carousel">
                <button @click="prev()" class="control prev"> <icon name="chevron"></icon> </button>
                <transition-group tag="div" name="fade" class="slides">
                    <figure class="slide" :key="index+1" v-if="pic.active == index" v-for="(slide, index) in slides">
                        <img width="100%" :src="'/storage/'+slide.archivo" alt="">
                    </figure>
                </transition-group>
                <button @click="next()" class="control next"> <icon name="chevron"></icon> </button>
            </div>
            <div class="thumbs">
                <div class="thumb add" @click="addPic()">
                    <span v-if="!nslides">add picture</span>
                    <span v-else>Save</span>
                    <input multiple @change="pushPics($event)" type="file" id="addSlide" class="hidden">
                </div>
                <figure v-for="(slide, index) in slides" class="thumb" @click="showThumb(index)">
                    <img width="100%" :src="'/storage/'+slide.archivo" alt="">
                </figure>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('modal', ($event) => {
            this.active ? this.active = false : this.active = true

            if($event.project){
                this.project = $event.project
                this.slides = this.project.gallery                                
            }
        })
    },
    data(){
        return{
            active: false,
            slides: null,
            modal: {
                title: ''
            },
            pic: {
                active: 0
            },
            nslides: false,

            project: null
        }
    },
    methods: {
        prev(){
            if(this.pic.active != 0){
                this.pic.active -= 1
            }            
        },
        next(){
            if(this.pic.active < this.slides.length-1){
                this.pic.active += 1
            }
        },
        showThumb(index){
            this.pic.active = index
        },
        addPic(){
            if(!this.nslides){
                $('#addSlide').click()
            }else{
                this.saveSlides();
            }
        },
        pushPics($event){
            this.nslides = $event.target.files            
        },
        saveSlides(){
            var este = this,
                formData = new FormData();

                for( let i = 0; i < this.nslides.length; i++ ){
                    let file = this.nslides[i];
                    formData.append('pics[' + i + ']', file);
                }

                axios.post('/panel/add-slides/'+this.project.id, formData).then((slides) => {
                    este.slides = slides.data
                });
        }
    }
}
</script>
