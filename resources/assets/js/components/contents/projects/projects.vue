<template>
<section s-sec="projects" class="main">
        <div v-if="!project" class="cont" v-for="(p, index) in list" @click="setCat(p, index)">
            <article>
                <figure>
                    <img v-if="p.cover" :src="'/storage/'+p.cover.archivo" alt="">
                    <img v-else src="/img/default.jpg" alt="">
                </figure>
                <p class="category">
                    {{p.name}}
                </p> 
            </article>
        </div>
        <div v-if="project" class="cont"  v-for="(pic, index) in project.gallery" @click="showGallery(pic.archivo, index)">
            <article>
                <figure>
                    <img :src="'/storage/'+pic.archivo" alt="">
                </figure>
            </article>
        </div>
        <gallery-overlay :active="full" :picture="picture"></gallery-overlay>
</section>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            this.active = $event.section            
            this.full = false;
            this.project = this.list[$event.section-1];
            this.picture = false;
            
        }).$on('close-gallery', () => {
            this.full = false
            this.picture = false;
        }).$on('nextPic', ($event) => {            
            if(this.current+1 < this.project.gallery.length){   
                this.current += 1;             
                this.picture = this.project.gallery[this.current].archivo;
            }
        }).$on('prevPic', ($event) => {
            if (this.current-1 > 0) {
                this.current -= 1;
                this.picture = this.project.gallery[this.current].archivo;
            }
        });
        this.list = this.categories;        
              
    },
    props: ['categories'],
    data(){
        return {
            list: null,
            project: false,
            current: false,
            active:false,
            picture: false,
            full: false,
        }
    },
    methods: {
        setProject(project){ 
            this.project = project                   
        },
        setCat(project, index){ 
            this.setProject(project)
        },
        showGallery(file, index){
            this.current = index
            this.picture = file
            this.full = true
        }
    }
}
</script>
