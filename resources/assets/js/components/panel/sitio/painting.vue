<template>
    <div s-desk="painting">
        <article v-if="newPaint">
                <article>
                    <p>
                        <label>Color</label>
                        <input type="text" class="input" v-model="npaint.name">
                    </p>
                    <div v-if="npaint.attributes.category == 1">
                        <p class="form-group">
                            <label>Code</label>
                            <input type="text" class="input" v-model="npaint.attributes.code">
                        </p>
                        <p class="form-group">
                            <label>US Code</label>
                            <input type="text" class="input" v-model="npaint.attributes.uscode">
                        </p>
                        <p>
                        <label>Description</label>
                            <textarea type="text" class="input" v-model="npaint.attributes.description"></textarea>
                        </p>
                        <p class="form-group">
                            <label>Base Material</label>
                             <select class="input" @change="addBase($event)" v-model="npaint.attributes.temp">
                                <option>Select Material</option>
                                <option v-for="(m, i) in materials" :value="i">{{m.name}}</option>
                            </select>
                        </p>
                        <ul v-if="npaint.attributes.bases">
                            <li v-for="(m, i) in npaint.attributes.bases">
                                <span>{{m}}</span>
                                <p class="buttons">
                                    <button class="btn">Remove</button>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div v-if="npaint.attributes.category == 2">
                        <p class="form-group">
                            <label>Hue</label>
                            <input type="text" class="input" v-model="npaint.attributes.hue">
                        </p>
                        <p class="form-group">
                            <label>Hex</label>
                            <input type="color" v-model="npaint.attributes.hex">
                        </p>
                    </div>
                    <div v-if="npaint.attributes.category == 3">
                        <p class="form-group">
                            <label>Name</label>
                            <input type="text" class="input" v-model="npaint.attributes.name">
                        </p>
                        <p class="form-group">
                            <label>Base Material</label>
                            <select class="input" @change="addBase($event)">
                                <option>Select Material</option>
                                <option v-for="(m, i) in materials" :value="i">{{m.name}}</option>
                            </select>
                        </p>
                        <ul v-if="npaint.attributes.bases">
                            <li v-for="(m, i) in npaint.attributes.bases">
                                <span>{{m}}</span>
                                <p class="buttons">
                                    <button class="btn">Remove</button>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <upload-picture v-if="npaint.attributes.category == 1 || npaint.attributes.category == 3"></upload-picture>
                    <p class="form-group">
                        <label>Category</label>
                        <select v-model="npaint.attributes.category" class="input">
                            <option :value="0">Selecciona un acategoría</option>
                            <option :value="1">Finish Chart</option>
                            <option :value="2">Powder Coat</option>
                            <option :value="3">Patina</option>
                        </select>
                    </p>
                    <button class="btn" @click="savePaint()">Save</button>
                </article>
        </article>
        <ul v-for="(cat, index) in paintes">
            <p class="title">{{index}}</p>
            <li v-for="(p, i) in cat"  v-if="paintEdit != 'editPaint_' + index">
                    <figure v-if="p.attributes.category == 1 || p.attributes.category == 3">
                        <img :src="'/storage/'+p.attributes.archivo" width="10%" alt="">
                    </figure>
                    <article>
                        <p>{{p.name}}</p>
                    </article>
                    <button class="btn" @click="editPaint(p, index, i)">Edit</button>
                    <button class="btn" @click="deletePaint(p, index, i)">Delete</button>
                
            </li>
            <li v-if="paintEdit == 'editPaint_' + index">
                    <div v-for="(fin, i) in paint">
                        <article v-if="i == 'name'" class="form-group">
                            <label>{{i}}</label>
                            <p>{{paint[0]}}</p>
                            <input type="text" class="input" v-model="paint[i]">
                        </article>
                    </div>
                    <div v-for="(at, ind) in paint.attributes">
                            <article v-if="ind == 'description'" class="form-group">
                            <label>{{ind}}</label>
                            <textarea type="text" class="input" v-model="paint.attributes[ind]"></textarea>
                            </article>
                            <article v-if="ind == 'archivo'" class="form-group">
                                <label>{{ind}}</label>
                                <input type="file" class="input" @change="setNewPic($event)">
                            </article>
                        </div>
                    <button @click="editPaint()" class="btn">Cancel</button>
                    <button @click="updatePaint()" class="btn">Save</button>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setPicture', ($event) => {
            this.npaint.attributes.archivo = $event.picture
        }).$on('new', ($event) => {
            if($event.section == 7){
                this.newPaint ? this.newPaint = false : this.newPaint = true
            }
        });

        var este = this;

        axios.get('/panel/get-paints').then((paintes) => {
            este.paintes = paintes.data            
        });
        axios.get('/get-materials').then((materials) => {
            este.materials = materials.data       
        });
    },
    props: [
       
    ],
    data(){
        return {
            paintes: null,
           newPaint: false,
           paint: false,
           paintEdit: false,
           materials: false,
           npaint: {
               name: null,
               attributes: {
                   category: 0
               }
           }
        }
    },
    methods: {
      savePaint(){
          var este = this,
                formData = new FormData();

                formData.append('name', this.npaint.name);
                formData.append('attributes', JSON.stringify(this.npaint.attributes));
                formData.append('archivo', this.npaint.attributes.archivo);

                axios.post('/panel/save-paint', formData).then((paint) => {
                    este.paintes = paint.data
                    este.npaint= null;
                    este.npaint.attributes= null;
                    este.npaint.attributes.category= 0;
                })
      } ,
      deletePaint(p, index, i){
          if (confirm('Delete paint?')) {
              var este = this,
                 formData = new FormData();

                formData.append('id', JSON.stringify(p.id));
                formData.append('attributes', JSON.stringify(p.attributes));
              axios.post('/panel/delete-paint', formData).then((paint) => {
                  este.paintes = paint.data
                    este.npaint= null;
                    este.npaint.attributes= null;
                    este.npaint.attributes.category= 0;
              });
          }
      },
      editPaint(f, index, i){
          this.paint ? this.paint = false : this.paint = f;
          this.paintEdit ? this.paintEdit = false : this.paintEdit = 'editPaint_'+index;
      },
      updatePaint(){
          var este = this,
            formData = new FormData();
                formData.append('name', this.paint.name);
                formData.append('attributes', JSON.stringify(this.paint.attributes));
                formData.append('archivo', this.paint.attributes.archivo);

                axios.post('/panel/update-paint/'+ this.paint.id, formData).then((r) => {
                    este.paint = false;
                    este.paintEdit = false;
                    este.paintes = r.data
                    este.npaint= false;
                    este.npaint.attributes= false;
                    este.npaint.attributes.category= 0;
                }).catch((e) => {
                    console.log(e);
                });
      },
      setNewPic($e){
          this.paint.attributes.archivo = $e.target.files[0];
      },
      addBase($event){
          this.npaint.attributes.bases ?  this.npaint.attributes.bases.push(this.materials[$event.target.value]) : this.npaint.attributes.bases = [this.materials[$event.target.value]];   
             
      }
    }
}
</script>