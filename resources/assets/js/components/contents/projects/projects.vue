<template>
<section s-sec="projects" class="main" :class="{'active': active}">
        <div  v-if="!project" class="cont" v-for="(p, index) in projects" @click="setProject(p)">
            <article>
                <figure>
                    <img src="/img/default.jpg" alt="">
                </figure>
                <p class="category">
                    {{p.name}}
                </p> 
            </article>
        </div>
        <div v-if="project" class="cont"  v-for="(pic, index) in project.gallery" @click="showGallery(pic.archivo)">
            <article>
                <figure>
                    <img :src="pic.archivo" alt="">
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
        }).$on('close-gallery', () => {
            this.full = false
            this.picture = false;
        });
    },
    props: ['projects'],
    data(){
        return {
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
        showGallery(file){
            this.picture = file
            this.full = true
        }
    }
}
</script>
