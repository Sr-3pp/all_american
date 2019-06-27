<template>
    <div s-desk="materials">
        <ul class="material-list">
            <li class="add" v-if="newMat">
                <article>
                    <p>
                        <label>Name</label>
                        <span class="must" v-if="nmaterial.alerts.name">You must fill this input</span>
                        <input type="text" class="input" v-model="nmaterial.name">
                    </p>
                    <p>
                        <label>Description</label>
                        <span class="must" v-if="nmaterial.alerts.description">You must fill this input</span>
                        <textarea type="text" class="input" v-model="nmaterial.description" />
                    </p>
                    <span class="must" v-if="nmaterial.alerts.archivo">You must fill this input</span>
                    <upload-picture></upload-picture>
                    <ul>
                        <li>
                            <ul class="gauge-list">
                                <li v-for="(g, index) in nmaterial.gaugues">
                                    <p>{{g[0]}} <br> {{g[1]}}</p>
                                    <button class="btn" @click="removeGauge(index)">remove</button>
                                </li>
                            </ul>
                            <label>Gaugue</label>
                            <input v-model="ng.gauge" type="text" class="input">
                            <label>Thick</label>
                            <input v-model="ng.thick" type="text" class="input">
                            <button class="btn" @click="addGauge()">Add</button>
                        </li>
                        <li v-if="nmaterial.gaugues.length">
                            <div id="prevChannel" style="background-color: rgb(206, 206, 206);" class="upload-picture" @click="chooseGaugePic()">
                                <span style="width: 50px;" class="icon">
                                    <icon name="+"></icon>
                                </span>
                                <p>
                                    upload channel picture
                                </p>
                                <input id="gaugePic" type="file" class="hidden" @change="setGaugePic($event)">
                            </div>
                        </li>
                    </ul>
                    <button class="btn" @click="validate()">Save Material</button>
                </article>
            </li>
            <li v-for="(m, index) in materials">
                <div  v-if="matEdit != 'editMat_'+index">
                    <figure>
                    <img :src="'/storage/'+m.img" width="10%" alt="">
                </figure>
                <article>
                    <p>{{m.name}}</p>
                    <p>{{m.description}}</p>
                    <ul v-if="showGaugues == 'gaugues_'+index">
                        <li v-for="(g, i) in m.gauges">
                            <span v-if="gedit != 'gedit_'+i">{{g.gauge}}</span> | <span v-if="gedit != 'gedit_'+i">{{g.thick}}</span>
                            <input class="input" v-if="gedit == 'gedit_'+i" type="text" v-model="g.gauge" @keyup.enter="updateGauge(g.id, index, i)" />
                            <input class="input" v-if="gedit == 'gedit_'+i" type="text" v-model="g.thick" @keyup.enter="updateGauge(g.id, index, i)" />
                             <button v-if="gedit != 'gedit_'+i" class="btn" @click="editGauge(i)">edit</button>
                             <button v-if="gedit != 'gedit_'+i" class="btn" @click="deleteGauge(g.id, index, i)">remove</button>
                        </li>
                    </ul>
                </article>
                </div>
                <article v-if="matEdit == 'editMat_'+index">
                    <div v-if="i == 'name' || i == 'description'" class="form-group" v-for="(e, i) in material">
                        <label>{{i}}</label>
                        <input type="text" class="input" v-model="material[i]" />
                    </div>
                    <div v-if="i == 'img'" class="form-group" v-for="(e, i) in material">
                        <label>{{i}}</label>
                        <input type="file" class="input" @change="updateMatPic($event)" />
                    </div>
                </article>
                <div class="actions">
                    <button v-if="m.gauges.length && !matEdit" class="btn" @click="showGaugues ? showGaugues = false : showGaugues = 'gaugues_'+index">Gauges</button>
                    <button v-if="!matEdit" class="btn" @click="editMaterial(index, m)">Edit</button>
                    <button v-else class="btn" @click="updateMaterial(index, m)">Save</button>
                    <button v-if="!matEdit" class="btn" @click="deleteMaterial(m.id, index)">Delete</button>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this;

        this.$bus.$on('setPicture', ($event) => {
            this.nmaterial.archivo = $event.picture
        }).$on('new', ($event) => {
            if($event.section == 2){
                this.newMat ? this.newMat = false : this.newMat = true
            }
        });

        axios.get('/get-materials').then((materials) => {
            este.materials = materials.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            materials: null,
            material: false,
            newMat: false,
            matEdit: false,
            gedit: false,
            newGaugues: false,
            ng: {
                gauge: null,
                thick: null
            },
            showGaugues: false,
            nmaterial: {
                name: null,
                description: null,
                archivo: null,
                gaugues: [],
                gpic: false,
                alerts: {
                    name: false,
                    description: false,
                    archivo: false,
                    gpic: false
                }
            }
        }
    },
    methods: {
        validate(){
            this.nmaterial.alerts =  {
                        name: false,
                        description: false,
                        archivo: false,
                        gpic: false
                    }
            var fields = Object.values(this.nmaterial),
                keys = Object.keys(this.nmaterial),
                errs = [];
            for (let i = 0; i < 3; i++) {
                const element = fields[i];
                if(element == null || element == ''){
                    this.nmaterial.alerts[$(keys).eq(i)[0]] = true;
                        errs.push($(keys).eq(i)[0]);
                    break;                    
                }              
            }
            if(this.nmaterial.gaugues.length){
                if(!this.nmaterial.gpic){
                    this.nmaterial.alerts.gpic = true;
                    errs.push('channel pic');
                }
            }
            
            if(!errs.length){
                this.saveMaterial();   
            }
            
        },
       saveMaterial(){        
           var este = this,
                formData = new FormData();

                formData.append('img', this.nmaterial.archivo);
                if(this.nmaterial.gpic){
                    formData.append('archivo', this.nmaterial.gpic);
                }else{
                    formData.append('archivo', null);
                }
                formData.append('description', this.nmaterial.description);
                formData.append('name', this.nmaterial.name);
                formData.append('gauges', JSON.stringify(this.nmaterial.gaugues));
           
           axios.post('/panel/save-material', formData).then((material) => {
               este.materials.push(material.data)
               este.newMat = false
               este.nmaterial= {
                    name: null,
                    description: null,
                    archivo: null,
                    gaugues: [],
                     gpic: false,
                    alerts: {
                        name: false,
                        description: false,
                        archivo: false,
                        gpic: false
                    }
                }
           });
           
       },
       deleteMaterial(id, index){
           if(confirm('Delete material?')){
               var este = this;
               axios.get('/panel/delete-material/'+id).then((response) => {
                   este.materials.splice(index, 1);
               });
           }
       },
       addGauge(){
           var gauge = [];
                gauge[0] = this.ng.gauge
                gauge[1] = this.ng.thick
           this.nmaterial.gaugues.push(gauge);
           this.ng= {
                gauge: null,
                thick: null
            }
            
       },
       removeGauge(index){
           this.nmaterial.gaugues.splice(index, 1)
       },
       deleteGauge(id, index, i){
           var este = this;
           axios.get('/panel/delete-gauge/'+id).then((response) => {
               este.materials[index].gauges.splice(i, 1)
           });
       },
       editGauge(ind){    
        this.gedit = 'gedit_'+ind 
       },
       updateGauge(id, index, i){
           var g = this.materials[index].gauges[i];
           this.gedit = false;
           var este = this;
           axios.post('/panel/update-gauge', g).catch((e) => {
               console.log(e);
           });
           
       },
       updateMaterial(index, mat){
           var formData = new FormData();
           formData.append('img', this.material.img);
             formData.append('description', this.material.description);
             formData.append('name', this.material.name);

            axios.post('/panel/update-material/'+mat.id, formData).catch((e) => {
               console.log(e);
           });

       },
       editMaterial(index, m){
           this.matEdit ? this.matEdit = false : this.matEdit = 'editMat_' + index
           this.material ? this.material = false : this.material = m         
       },
       chooseGaugePic(){
           $('#gaugePic').click()
       },
       setGaugePic($e){
           this.nmaterial.gpic = $e.target.files[0];

           var este = this,
                image = new Image(),
                reader = new FileReader();
                reader.onload = function (e) {
                    $('#prevChannel').css('background', 'url('+e.target.result+') center no-repeat');
                };
                reader.readAsDataURL(this.nmaterial.gpic);
       },
       updateMatPic($e){
           this.material.img = $e.target.files[0];

           /* var este = this,
                image = new Image(),
                reader = new FileReader();
                reader.onload = function (e) {
                    $('#prevChannel').css('background', 'url('+e.target.result+') center no-repeat');
                };
                reader.readAsDataURL(this.nmaterial.gpic); */
       }
    }
}
</script>