<template>
    <div s-desk="painting">
        <article v-if="newPaint">
                <article>
                    <p>
                        <label>Name</label>
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
                            <select class="input">
                                <option :value="0">Select Material</option>
                            </select>
                        </p>
                    </div>
                    <upload-picture v-if="npaint.attributes.category == 1"></upload-picture>
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
            <li v-for="(p, i) in cat.paintes"  v-if="paintEdit != 'editPaint_' + index">
                    <figure>
                        <img :src="'/storage/'+p.archivo" width="10%" alt="">
                    </figure>
                    <article>
                        <p>{{p.name}}</p>
                    </article>
                    <button class="btn" @click="editPaint(p, index, i)">Edit</button>
                    <button class="btn" @click="deletePaint(p.id, index, i)">Delete</button>
                
            </li>
            <li v-if="paintEdit == 'editPaint_' + index">
                    <div v-for="(fin, i) in paint">
                        <article v-if="i == 'name'" class="form-group">
                            <label>{{i}}</label>
                            <input type="text" class="input" v-model="paint[i]">
                        </article>
                        <article v-if="i == 'description'" class="form-group">
                            <label>{{i}}</label>
                            <textarea type="text" class="input" v-model="paint[i]"></textarea>
                        </article>
                        <article v-if="i == 'category_id'" class="form-group">
                            <label>{{i}}</label>
                            <select type="text" class="input" v-model="paint[i]">
                                <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                            </select>
                        </article>
                        <article v-if="i == 'archivo'" class="form-group">
                            <label>{{i}}</label>
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
            console.log(este.paintes);
            
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

                formData.append('name', this.paint.name);
                formData.append('attributes', JSON.parse(this.paint.attributes));
                formData.append('archivo', this.paint.attributes.archivo);

                axios.post('/panel/save-paint', formData).then((paint) => {
                    este.paintes = paint.data
                    este.newPaint = false
                    este.npaint= {
                        name: null,
                        attributes: {
                            category: 0
                        }
                    }
                })
      } ,
      deletePaint(id, index, i){
          if (confirm('Delete paint?')) {
              var este = this;
              axios.get('/panel/delete-paint/'+id).then((response) => {
                  este.paintes[index].paintes.splice(i, 1)
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
                formData.append('attributes', JSON.parse(this.paint.attributes));
                formData.append('archivo', this.paint.attributes.archivo);

                axios.post('/panel/update-paint/'+ this.paint.id, formData).then((r) => {
                    este.paint = false;
                    este.paintEdit = false;
                    este.paintes = r.data
                }).catch((e) => {
                    console.log(e);
                });
      },
      setNewPic($e){
          this.paint.attributes.archivo = $e.target.files[0];
      }
    }
}
</script>