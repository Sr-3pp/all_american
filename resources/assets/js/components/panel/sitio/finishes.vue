<template>
    <div s-desk="finishes">
        <article v-if="newFinish">
                <article>
                    <p class="form-group">
                        <label>Name</label>
                        <input type="text" class="input" v-model="nfinish.name">
                    </p>
                    <p class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="input" v-model="nfinish.description"></textarea>
                    </p>
                    <button class="btn" @click="saveFinish()">Save</button>
                </article>
        </article>
        <ul v-for="(cat, index) in finishes">
            <p class="title">{{cat.name}}</p>
            <p class="text">{{cat.description}}</p>
             <button class="btn" @click="editFinish(cat, index)">Edit</button>
            <button class="btn" @click="deleteFinish(cat.id, index)">Delete</button>
            <h4 class="category">Types</h4>
            <button class="btn" @click="addBases(cat, index)">Add Type</button>
            <li v-for="(f, i) in cat.finishes"  v-if="finishEdit != 'editFinish_' + index">
                    <figure>
                        <img :src="'/storage/'+f.archivo" width="10%" alt="">
                    </figure>
                    <article>
                        <p v-for="(bas, indd) in f.bases">{{bas.name}}</p>
                    </article>
                    <button class="btn" @click="deleteType(f, index, i)">Delete Type</button>
            </li>
            <li v-if="moreBases == 'morebase_' +index">
                 <div class="types">
                        <p id="prevFinish" class="form-group" @click="clickInput()">
                            <label>Set preview</label>
                            <input id="fileFinish" type="file" class="hidden" @change="setBasePic($event)">
                        </p>
                        <div class="bases">
                            <ul>
                                <li v-for="(b, id) in ntype.bases">{{b.name}}</li>
                            </ul>
                            <select class="input" v-model="nbase" @change="addBase()">
                                <option v-for="m in materials" :value="m">{{m.name}}</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn" @click="saveType(index)">Save Type</button>
            </li>
            <li v-if="finishEdit == 'editFinish_' + index">
                    <div v-for="(fin, i) in finish">
                        <article v-if="i == 'name'" class="form-group">
                            <label>{{i}}</label>
                            <input type="text" class="input" v-model="finish[i]">
                        </article>
                        <article v-if="i == 'description'" class="form-group">
                            <label>{{i}}</label>
                            <textarea type="text" class="input" v-model="finish[i]"></textarea>
                        </article>
                    </div>
                    <button @click="editFinish()" class="btn">Cancel</button>
                    <button @click="updateFinish()" class="btn">Save</button>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('new', ($event) => {
            if($event.section == 3){
                this.newFinish ? this.newFinish = false : this.newFinish = true
            }
        });

        var este = this;

        axios.get('/panel/get-finishes').then((finishes) => {
            este.finishes = finishes.data
        });
        axios.get('/get-materials').then((materials) => {
            este.materials = materials.data
        });
        axios.get('/panel/get-cats/finish').then((cats) => {
            este.categories = cats.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            finishes: null,
            materials: null,
            categories: null,
           newFinish: false,
           finish: false,
           finishEdit: false,
           nbase: null,
           nfinish: {
               name: null,
               description: null,
           },
           types: false,
           ntype: {
               archivo: null,
               bases: []
           },
           moreBases: false
        }
    },
    methods: {
      saveFinish(){
          var este = this,
                formData = new FormData();

                formData.append('name', this.nfinish.name);
                formData.append('description', this.nfinish.description);

                axios.post('/panel/save-finish', formData).then((finish) => {
                    este.finishes = finish.data
                    este.newFinish = false
                    este.nfinish= {
                        name: null,
                        category_id: null,
                        archivo: null
                    }
                })
      } ,
      deleteFinish(id, index){
          if (confirm('Delete finish?')) {
              var este = this;
              axios.get('/panel/delete-finish/'+id).then((response) => {
                  este.finishes.splice(index, 1)
              });
          }
      },
      editFinish(f, index, i){
          this.finish ? this.finish = false : this.finish = f;
          this.finishEdit ? this.finishEdit = false : this.finishEdit = 'editFinish_'+index;
      },
      addBases(f, index){
          this.finish ? this.finish = false : this.finish = f;
          this.moreBases ? this.moreBases = false : this.moreBases = 'morebase_'+index;
          
      },
      updateFinish(){
          var este = this,
            formData = new FormData();
                formData.append('name', this.finish.name);
                formData.append('description', this.finish.description);
                formData.append('category_id', this.finish.category_id);
                formData.append('archivo', this.finish.archivo);

                axios.post('/panel/update-finish/'+ this.finish.id, formData).then((r) => {
                    este.finish = false;
                    este.finishEdit = false;
                    este.finishes = r.data
                }).catch((e) => {
                    console.log(e);
                });
      },
      setNewPic($e){
          this.finish.archivo = $e.target.files[0];
      },
      addBase(){
          this.ntype.bases.push(this.nbase)                    
      },
      setBasePic($event){
          this.ntype.archivo = $event.target.files[0]
        var este = this,
            image = new Image(),
            reader = new FileReader();
        reader.onload = function (e) {
                $('#prevFinish').css('background', 'url('+e.target.result+') center no-repeat');                
        };
        reader.readAsDataURL(this.ntype.archivo);
          
      },
      clickInput(){
          $('#fileFinish').click()
      },
      saveType(index){
          var este = this,
              formData = new FormData();
                
              formData.append('finish_id', this.finish.id);
              formData.append('archivo', this.ntype.archivo);
              formData.append('bases', JSON.stringify(this.ntype.bases));

              axios.post('/panel/add-type', formData).then((type) => {
                  este.finishes[index].finishes.push(type.data)
                  este.moreBases = false
                  este.ntype.bases = [];
                  este.ntype.archivo = false
              });
      },
      deleteType(type, index, i){
          var este = this;

          axios.get('/panel/delete-type/'+type.id).then((response) => {
              este.finishes[index].finishes.splice(i, 1);
          });
      }
    }
}
</script>