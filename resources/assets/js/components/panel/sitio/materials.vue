<template>
    <div s-desk="materials">
        <ul class="material-list">
            <li v-if="newMat">
                <article>
                    <p>
                        <label>Name</label>
                        <input type="text" class="input" v-model="nmaterial.name">
                    </p>
                    <p>
                        <label>Description</label>
                        <textarea type="text" class="input" v-model="nmaterial.description" />
                    </p>
                    <upload-picture></upload-picture>
                    <ul>
                        <li>
                            <label>Gaugue</label>
                            <input v-model="ng.gauge" type="text" class="input">
                            <label>Thick</label>
                            <input v-model="ng.thick" type="text" class="input">
                            <button class="btn" @click="addGauge()">Add</button>
                        </li>
                        <li v-for="(g, index) in nmaterial.gaugues">
                            {{g[0]}} <br> {{g[1]}}
                            <button class="btn" @click="removeGauge(index)">remove</button>
                        </li>
                    </ul>
                    <button class="btn" @click="saveMaterial()">Save</button>
                </article>
            </li>
            <li v-for="(m, index) in materials">
                <figure>
                    <img :src="'/storage/'+m.img" width="10%" alt="">
                </figure>
                <article>
                    <p>{{m.name}}</p>
                    <ul v-if="showGaugues == 'gaugues_'+index">
                        <li v-for="(g, i) in m.gauges">
                            {{g.gauge}}
                             <button class="btn" @click="deleteGauge(g.id, index, i)">remove</button>
                        </li>
                    </ul>
                    <button class="btn" @click="showGaugues ? showGaugues = false : showGaugues = 'gaugues_'+index">Gaugues</button>
                </article>
                <div class="actions">
                    <button class="btn" @click="deleteMaterial(m.id, index)">Delete</button>
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
            newMat: false,
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
                gaugues: []
            }
        }
    },
    methods: {
       saveMaterial(){        
           var este = this,
                formData = new FormData();

                formData.append('img', this.nmaterial.archivo);
                formData.append('description', this.nmaterial.description);
                formData.append('name', this.nmaterial.name);
                formData.append('gauges', JSON.stringify(this.nmaterial.gaugues));
           
           axios.post('/panel/save-material', formData).then((material) => {
               este.materials.push(material.data)
               este.newMat = false
               este.nmaterial= {
                    name: null,
                    description: null,
                    archivo: null
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
       }
    }
}
</script>