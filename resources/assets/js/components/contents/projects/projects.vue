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
        <div v-if="project" class="cont"  v-for="(pic, index) in project.gallery" @click="showGallery(pic.archivo)">
            <article>
                <figure>
                    <img :src="'/storage/'+pic.archivo" alt="">
                </figure>
                <p class="category">
                    imagen
                </p>
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
            this.list = this.categories[$event.section-1].projects
            this.full = false;
            this.project = false;
            this.picture = false;
            
        }).$on('close-gallery', () => {
            this.full = false
            this.picture = false;
        });
        this.list = this.categories;
              
    },
    props: ['categories'],
    data(){
        return {
            list: null,
            project: false,
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
            if(!this.active){
                this.list = this.categories[index].projects;
                this.$bus.$emit('setTab', {section: index+1})
            }else{
                this.setProject(project)
            }  
        },
        showGallery(file){
            this.picture = file
            this.full = true
        }
    }
}
</script>
