<template>
    <div s-desk="finishes">
        <article v-if="newFinish">
                <article>
                    <p>
                        <label>Name</label>
                        <input type="text" class="input" v-model="nfinish.name">
                    </p>
                    <p class="form-group">
                        <label>Category</label>
                        <select v-model="nfinish.category_id" class="input">
                            <option :value="0">Selecciona un acategoría</option>
                            <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                        </select>
                    </p>
                    <upload-picture></upload-picture>
                    <button class="btn" @click="saveFinish()">Save</button>
                </article>
        </article>
        <ul v-for="(cat, index) in finishes">
            <p class="title">{{cat.name}}</p>
            <li v-for="(f, i) in cat.finishes">
                <figure>
                    <img :src="'/storage/'+f.archivo" width="10%" alt="">
                </figure>
                <article>
                    <p>{{f.name}}</p>
                </article>
                <button class="btn" @click="deleteFinish(f.id, index, i)">Delete</button>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('setPicture', ($event) => {
            this.nfinish.archivo = $event.picture
        }).$on('new', ($event) => {
            if($event.section == 3){
                this.newFinish ? this.newFinish = false : this.newFinish = true
            }
        });

        var este = this;

        axios.get('/panel/get-finishes').then((finishes) => {
            este.finishes = finishes.data
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
            categories: null,
           newFinish: false,
           nfinish: {
               name: null,
               category_id: null,
               archivo: null
           }
        }
    },
    methods: {
      saveFinish(){
          var este = this,
                formData = new FormData();

                formData.append('archivo', this.nfinish.archivo);
                formData.append('name', this.nfinish.name);
                formData.append('category_id', this.nfinish.category_id);

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
      deleteFinish(id, index, i){
          if (confirm('Delete finish?')) {
              var este = this;
              axios.get('/panel/delete-finish/'+id).then((response) => {
                  este.finishes[index].finishes.splice(i, 1)
              });
          }
      }
    }
}
</script>