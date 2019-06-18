<template>
<transition-group name="fade" tag="div" s-desk="projects"> 
    <div :key="0" v-if="addProject" class="new-project">
        <p class="form-group">
            <label>Name</label>
            <input type="text" class="input" v-model="nproy.name">
        </p>
        <p @click="activeFile()" class="form-group file-input">
            <span>Click para agregar archivos</span>
            <input id="uploadPicts" type="file" class="hidden" @change="setFiles($event)" multiple>
        </p>
        <button class="btn" @click="saveProject()">Save</button>
    </div>
    <div :key="1">
            <article v-for="(project, index) in projects" class="card">
                <figure class="img">
                    <img v-if="project.cover" :src="'/storage/'+project.cover.archivo" alt="">
                    <img v-else src="/img/default.jpg" alt="">
                </figure> 
                <div class="card-content">
                    <p class="subtitle">{{project.name}}</p>
                    <div>
                        <button class="btn" @click="showProject(project)">
                            Watch gallery
                        </button>
                    </div>
                </div>
            </article>
    </div>
    <modal :key="2"></modal>
</transition-group>
</template>
<script>
export default{
    mounted(){
        var este = this;
        axios.get('/panel/get-projects').then((response) => {
            este.projects = response.data
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
               name: null,
               files: null
           }
        }
    },
    methods: {
       saveProject(){
           var este = this,
                formData = new FormData();
                formData.append('name', this.nproy.name);
                for( let i = 0; i < this.nproy.files.length; i++ ){
                    let file = this.nproy.files[i];
                    formData.append('pics[' + i + ']', file);
                }

           axios.post('/panel/save-project', formData).then((proy) => {
               este.projects = proy.data
               este.addProject = false;
               este.nproy = {
                    category_id: 0,
                    name: null,
                }
           });
       },
       setFiles($event){
           this.nproy.files = $event.target.files           
       },
       activeFile(){
           $('#uploadPicts').click()
       },
       showProject(project){
           this.$bus.$emit('modal', {project: project})
           
       }
    }
}
</script>