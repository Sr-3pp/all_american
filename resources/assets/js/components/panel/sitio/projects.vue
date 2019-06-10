<template>
<transition-group name="fade" tag="div" s-desk="projects"> 
    <div :key="0" v-if="addProject" class="new-project">
        <p class="form-group">
            <label>Name</label>
            <input type="text" class="input" v-model="nproy.name">
        </p>
        <p class="form-group">
            <label>Category</label>
            <select v-model="nproy.category_id" class="input">
                <option :value="0">Selecciona un acategoría</option>
                <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
            </select>
        </p>
        <button class="btn" @click="saveProject()">Save</button>
    </div>
    <div :key="index+1" v-for="(cat, index) in projects">
        <p class="title">
            {{cat.name}}
        </p>
        <div class="cont">
            <article v-for="(project, index) in cat.projects" class="card" @click="showProject(1)">
                <figure class="img">
                    <img v-if="project.cover" :src="'/storage/'+project.cover.archivo" alt="">
                    <img v-else src="/img/default.jpg" alt="">
                </figure> 
                <div class="card-content">
                    <p class="subtitle">{{project.name}}</p>
                    <div>
                        <button class="btn">
                            Change cover
                        </button>
                        <button class="btn">
                            Watch gallery
                        </button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</transition-group>
</template>
<script>
export default{
    mounted(){
        var este = this;
        axios.get('/panel/get-projects').then((response) => {
            este.projects = response.data
        });

        axios.get('/panel/get-cats/project').then((cats) => {
            este.categories = cats.data
        });

         this.$bus.$on('new', ($event) => {
            if($event.section == 1){
                this.addProject ? this.addProject = false : this.addProject = true
            }
        })
    },
    props: [
       
    ],
    data(){
        return {
            addProject: false,
           projects: false,
           categories: null,
           nproy: {
               category_id: 0,
               name: null,
           }
        }
    },
    methods: {
       saveProject(){
           var este = this;
           axios.post('/panel/save-project', this.nproy).then((proy) => {
               este.projects = proy.data
               este.addProject = false;
               este.nproy = {
                    category_id: 0,
                    name: null,
                }
           });
       }
    }
}
</script>