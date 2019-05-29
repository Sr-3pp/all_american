<template>
    <div s-desk="projects">
        <p class="title">
            Category
        </p>
        <div class="cards">
            <article v-for="card in 2" class="card" @click="showProject(1)">
                <figure class="img">
                    <img src="/img/slides/projects/slide_4.jpg" alt="">
                </figure> 
                <div class="card-content">
                    <p class="subtitle">Proyect</p>
                    <div>
                        <button>
                            Change cover
                        </button>
                        <button>
                            Watch gallery
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</template>
<script>
export default{
    mounted(){
        
    },
    props: [
       
    ],
    data(){
        return {
           
        }
    },
    methods: {
       
    }
}
</script>