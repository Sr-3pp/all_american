<template>
    <div s-desk="finishes">
        <article v-if="newFinish">
                <article>
                    <div v-if="!newCat">
                        <p class="form-group">
                            <label>Category</label>
                            <select class="input" v-model="nfinish.finish_category_id">
                                <option value="">Select a category</option>
                                <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                            </select>
                            <button class="btn" @click="newCat ? newCat = false : newCat = true">Add category</button>
                        </p>
                    </div>
                    <div v-else>
                        <p class="form-group">
                            <label>Category</label>
                            <input type="text" class="input" v-model="ncat.name">
                        </p>
                         <p class="form-group">
                            <label> Category Description</label>
                            <textarea type="text" class="input" v-model="ncat.description"></textarea>
                        </p>
                         <button class="btn" @click="newCat ? newCat = false : newCat = true">Choose existent category</button>
                    </div>
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
            <div class="buttons">
                <button class="btn" @click="editCategory(cat, index)">Edit Category</button>
                <button class="btn" @click="deleteCategory(cat.id, index)">Delete Category</button>
            </div>
            <div v-if="catEdit == 'editCat_'+index">
                <p class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="input" v-model="cate.name">
                </p>
                <p class="form-group">
                    <label>Category Name</label>
                    <textarea class="input" v-model="cate.description"></textarea>
                </p>
                <button class="btn" @click="updateCategory(index)">Update Category</button>
            </div>
            <ul v-if="finishEdit != 'editFinish_'+index" v-for="(c, ind) in cat.finishes">
                    <p class="subtitle">{{c.name}}</p>
                    <p class="text">{{c.description}}</p>
                     <button class="btn" @click="editFinish(c, ind)">Edit Finish</button>
                     <button class="btn" @click="deleteFinish(c.id, index, ind)">Delete Finish</button>
                    <button class="btn" @click="addBases(c, ind)">Add Type</button>
                    <h4 v-if="finishEdit != 'editFinish_' + ind" class="category">Types</h4>
                <li v-for="(f, i) in c.types"  v-if="finishEdit != 'editFinish_' + ind">
                    <figure>
                        <img :src="'/storage/'+f.archivo" width="10%" alt="">
                    </figure>
                    <p class="text">{{f.description}}</p>
                    <article>
                        <p v-for="(bas, indd) in f.bases">{{bas.name}}</p>
                    </article>
                    <button class="btn" @click="deleteType(f, index, i)">Delete Type</button>
                </li>
                <li v-if="moreBases == 'morebase_' +ind">
                    <div class="types">
                            <p id="prevFinish" class="form-group" @click="clickInput()">
                                <label>Set preview</label>
                                <input id="fileFinish" type="file" class="hidden" @change="setBasePic($event)">
                            </p>
                            <p class="form-group">
                                <label>Type description</label>
                                <textarea class="input" v-model="ntype.description"></textarea>
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
                        <button class="btn" @click="saveType(index, ind)">Save Type</button>
                </li>
                <li v-if="finishEdit == 'editFinish_' + ind">
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
            <hr>
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
            este.finishes = finishes.data['finishes']
            este.categories = finishes.data['categories']            
        });
        axios.get('/get-materials').then((materials) => {
            este.materials = materials.data
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
           ncat: {
               name: null,
               description: null,
           },
           nfinish: {
               name: null,
               description: null,
               finish_category_id: 0,
           },
           types: false,
           ntype: {
               archivo: null,
               bases: [],
               description: null
           },
           moreBases: false,
           newCat: false,
           cate: false,
           catEdit: false
        }
    },
    methods: {
      saveFinish(){          
          var este = this,
                formData = new FormData();

                formData.append('name', this.nfinish.name);
                formData.append('description', this.nfinish.description);
                formData.append('finish_category_id', this.nfinish.finish_category_id);

                 formData.append('cat_name', this.ncat.name);
                 formData.append('cat_description', this.ncat.description);

               axios.post('/panel/save-finish', formData).then((finish) => {
                    este.finishes = finish.data['finishes']
                    este.categories = finish.data['categories']
                    este.newFinish = false
                    este.nfinish= {
                        name: null,
                        description: null,
                        finish_category_id: 0
                    }
                    este.ncat= {
                        name: null,
                        description: null
                    }
                })
      },
      deleteFinish(id, index, ind){
          if (confirm('Delete finish?')) {
              var este = this;
              axios.get('/panel/delete-finish/'+id).then((response) => {
                  este.finishes[index].finishes.splice(ind, 1)
              });
          }
      },
      editFinish(f, index, i){
          this.finish ? this.finish = false : this.finish = f;
          this.finishEdit ? this.finishEdit = false : this.finishEdit = 'editFinish_'+index;
      },
      deleteCategory(id, index){
          if (confirm('Delete finish?')) {
              var este = this;
              axios.get('/panel/delete-finish-category/'+id).then((response) => {
                  este.finishes.splice(index, 1)
              });
          }
      },
      editCategory(c, index){
         this.cate ? this.cate = false : this.cate = c;
          this.catEdit ? this.catEdit = false : this.catEdit = 'editCat_'+index;
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
                    este.finishes = r.data['finishes']
                }).catch((e) => {
                    console.log(e);
                });
      },
      updateCategory(){
          var este = this;
                axios.post('/panel/update-finish-category/'+ this.cate.id, this.cate).then((r) => {
                    este.cat = false;
                    este.catEdit = false;
                    este.finishes = r.data['finishes']
                    este.categories = r.data['categories']
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
      saveType(index, i){
          var este = this,
              formData = new FormData();
                
              formData.append('finish_id', this.finish.id);
              formData.append('archivo', this.ntype.archivo);
              formData.append('description', this.ntype.description);
              formData.append('bases', JSON.stringify(this.ntype.bases));

              axios.post('/panel/add-type', formData).then((type) => {
                  este.finishes[index].finishes[i].types.push(type.data)
                  este.moreBases = false
                  este.ntype.bases = [];
                  este.ntype.archivo = false
                  este.ntype.description = null
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