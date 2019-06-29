<template>
    <div s-desk="mills">
        <ul>
            <ol v-if="newMill">
                <p>
                    <label>Name</label>
                    <input type="text" class="input" v-model="nmill.name">
                </p>
                <p class="form-group">
                    <label>Category</label>
                    <select v-model="nmill.category_id" class="input">
                        <option :value="0">Selecciona un acategoría</option>
                        <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                    </select>
                </p>
                <upload-picture></upload-picture>
                <button class="btn" @click="saveMill()">Save</button>
            </ol>
            <ol v-for="(c, index) in mills">
                <p class="title">
                    {{c.name}}
                </p>
                <ul>
                    <li v-if="millEdit != 'editMill_'+index" v-for="(m, i) in c.mills">
                        <figure>
                            <img :src="'/storage/'+m.svg" width="50%" alt="">
                            <p class="caption">
                                <span class="title">
                                    {{m.name}}
                                </span>
                            </p>
                        </figure>
                        <article>
                            <button class="btn" @click="deleteMill(m.id, index, i)">Delete</button>
                            <button class="btn" @click="editMill(m, index, i)">Edit</button>
                        </article>
                    </li>
                    <li v-if="millEdit == 'editMill_'+index">
                        <div v-for="(f, i) in mill">
                            <article v-if="i == 'name'" class="form-group">
                                <label>{{i}}</label>
                                <input type="text" class="input" v-model="mill[i]">
                            </article>
                            <article v-if="i == 'category_id'" class="form-group">
                                <label>{{i}}</label>
                                <select type="text" class="input" v-model="mill[i]">
                                    <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                                </select>
                            </article>
                            <article v-if="i == 'svg'" class="form-group">
                                <label>{{i}}</label>
                                <input type="file" class="input" @change="setNewPic($event)">
                            </article>
                        </div>
                        <button class="btn" @click="updateMill()">Save</button>
                        <button class="btn" @click="editMill()">cancel</button>
                    </li>
                </ul>
            </ol>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        this.$bus.$on('new', ($event) => {
             if($event.section == 4){
                this.newMill ? this.newMill = false : this.newMill = true
            }
        }).$on('setPicture', ($event) => {
            this.nmill.archivo = $event.picture
        });

        var este = this;
        axios.get('/panel/get-mills').then((mills) => {
            este.mills = mills.data
        });
        axios.get('/panel/get-cats/mill').then((cats) => {
            este.categories = cats.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            mills: null,
            categories: null,
            mill: false,
            millEdit: false,
           newMill: false,
           nmill: {
               name: null,
               archivo: null,
               category_id: 0
           }
        }
    },
    methods: {
       saveMill(){
           var este = this,
            formData = new FormData();

            formData.append('svg', this.nmill.archivo);
            formData.append('name', this.nmill.name);
            formData.append('category_id', this.nmill.category_id);

            axios.post('/panel/save-mill', formData).then((mill) => {
                este.mills = mill.data
                este.newMill = false
                este.nmill= {
                    name: null,
                    archivo: null,
                    category_id: 0
                }
            });
       },
       deleteMill(id, index, i){
            if (confirm('Delete finish?')) {
                var este = this;
                axios.get('/panel/delete-mill/'+id).then((response) => {
                   este.mills[index].mills.splice(i, 1)
                });
          }
       },
       editMill(m, index, i){
           this.mill ? this.mill = false : this.mill = m;
           this.millEdit = 'editMill_'+i
       },
       setNewPic($e){
           this.mill.svg = $e.target.files[0]
       },
       updateMill(){
          var este = this,
            formData = new FormData();
                formData.append('name', this.mill.name);
                formData.append('category_id', this.mill.category_id);
                formData.append('svg', this.mill.svg);

                axios.post('/panel/update-mill/'+ this.mill.id, formData).then((r) => {
                    este.mill = false;
                    este.millEdit = false;
                    este.mills = r.data
                }).catch((e) => {
                    console.log(e);
                });
      },
    }
}
</script>