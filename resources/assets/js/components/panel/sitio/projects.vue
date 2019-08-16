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
    <div class="cards" :key="1">
            <article v-for="(p, index) in projects" class="card">
                    <figure class="img">
                        <img v-if="p.cover" :src="'/storage/'+p.cover.archivo" alt="">
                        <img v-else src="/img/default.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p v-if="projectEdit != 'editProject_'+index" class="subtitle">{{p.name}}</p>
                        <div v-if="projectEdit == 'editProject_'+index">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="input" type="text" v-model="p.name">
                            </div>
                        </div>
                        <div class="buttons">
                            <button class="btn" @click="showProject(p)">
                                Watch gallery
                            </button>
                            <button class="btn" v-if="projectEdit != 'editProject_'+index" @click="editProject(p, index)">Edit</button>
                            <button class="btn" v-if="projectEdit == 'editProject_'+index" @click="updateProject()">Save</button>
                            <button class="btn" @click="deleteProject(p.id, index)">
                                Delete
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
            project: false,
            projectEdit: false,
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
           
       },
       editProject(project, index){
           this.project ? this.project = false : this.project = project
           this.projectEdit ? this.projectEdit = false : this.projectEdit = 'editProject_'+index
       },
       updateProject(){
           var este = this;
           axios.post('/panel/update-project/'+this.project.id, this.project).then((r) => {
               este.projectEdit = false
               este.project = false
           }).catch((e) => {
               console.log(e);
               
           });
       },
       deleteProject(id, index){
           var este = this;
           axios.get('/panel/delete-project/'+id).then((response) => {
               este.projects.splice(index, 1);
           });
       }
    }
}
</script>