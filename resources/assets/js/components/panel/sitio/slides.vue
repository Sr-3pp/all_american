<template>
    <div s-desk="slides">
        <ul class="slide-list">
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
                        <p class="radio-group">
                            <span @click="setPos('left')" :class="{'active': nslide.position == 'left'}"><icon name="check"></icon><br>Left</span>
                            <span @click="setPos('center')" :class="{'active': nslide.position == 'center'}"><icon name="check"></icon><br>Center</span>
                            <span @click="setPos('right')" :class="{'active': nslide.position == 'right'}"><icon name="check"></icon><br>Right</span>
                        </p>
                        <p class="radio-group">
                            <span @click="setColor('black')" :class="{'active': nslide.color == 'black'}"><icon name="check"></icon><br>Black</span>
                            <span @click="setColor('white')" :class="{'active': nslide.color == 'white'}"><icon name="check"></icon><br>White</span>
                        </p>
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
            <ol v-if="slides.length" v-for="(slide, index) in slides">
                <figure :class="'align-'+slide.extra.position+' ' + slide.extra.color">
                    <img :src="'/storage/'+slide.archivo" alt="">
                    <p v-if="slide.extra.caption" class="caption">
                        <span class="title">
                            {{slide.extra.title}}
                        </span>
                        <span class="text">
                            {{slide.extra.description}}
                        </span>
                    </p>
                </figure>
                <article v-if="editSlide !== 'editSlide_'+index">
                    <button class="btn" @click="deleteSlide(index, slide.id)">Delete</button>
                    <button class="btn" @click="editSlide = 'editSlide_'+index">Edit</button>
                </article>
                <div v-if="editSlide == 'editSlide_'+index" class="form-group">
                        <p class="radio-group">
                            <span @click="editPos('left', index)" :class="{'active': slide.extra.position == 'left'}"><icon name="check"></icon><br>Left</span>
                            <span @click="editPos('center', index)" :class="{'active': slide.extra.position == 'center'}"><icon name="check"></icon><br>Center</span>
                            <span @click="editPos('right', index)" :class="{'active': slide.extra.position == 'right'}"><icon name="check"></icon><br>Right</span>
                        </p>
                         <p class="radio-group">
                            <span @click="editColor('black', index)" :class="{'active': slide.extra.color == 'black'}"><icon name="check"></icon><br>Black</span>
                            <span @click="editColor('white', index)" :class="{'active': slide.extra.color == 'white'}"><icon name="check"></icon><br>White</span>
                        </p>
                        <p>
                            <label>Title</label>
                            <input class="input" type="text" v-model="slide.extra.title">
                        </p>
                        <p>
                            <label>Description</label>
                            <textarea class="input" type="text" v-model="slide.extra.description"/>
                        </p>
                        <button class="btn" @click="updateSlide(index, slide.id)">Update</button>
                </div>
            </ol>
            <ol  v-if="!slides.length">
                No hay slides
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
           slides: false,
           newSlide: false,
           editSlide: false,
           nslide: {
               caption: false,
               title: '',
               description: '',
               archivo: null,
               position: false,
               color: null
           }
        }
    },
    methods: {
       saveSlide(){
           var este = this,
                formData = new FormData();

                formData.append('extra', JSON.stringify(this.nslide));
                formData.append('archivo', this.nslide.archivo);

           axios.post('/panel/save-slide', formData).then(function(response){
               este.slides.push(response.data);
               este.newSlide = false
               este.nslide= {
               caption: false,
               title: '',
               description: '',
               archivo: null,
               position: false
           }
           }).catch( (e) => {
               console.log(e)
           });
       },
       setPos(align){
           this.nslide.position = align;

           console.log(this.nslide)
       },
       setColor(color){
           this.nslide.color = color;
       },
       editPos(align, index){
           this.slides[index].extra.position = align
       },
       editColor(color, index){
           this.slides[index].extra.color = color
           
       },
       updateSlide(index, id){
           var este = this,
                slide = this.slides[index],
                formData = new FormData();

                if(this.nslide.archivo){
                     formData.append('archivo', this.nslide.archivo);
                }
                formData.append('extra', JSON.stringify(slide.extra));
           axios.post('/panel/update-slide/'+id, formData).then(function(response){
               este.editSlide = false               
           }).catch( (e) => {
               console.log(e)
           });
       },
       deleteSlide(index, id){
           if(confirm('Delete this slide?')){
               var este = this;
               axios.get('/panel/delete-slide/'+id).then((response) => {
                   este.slides.splice(index, 1);
               });
           }
       }
    }
}
</script>