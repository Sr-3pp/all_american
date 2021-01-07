<template>
    <div s-desk="mills">
        <ul>
            <ol v-if="newMill">
                <p>
                    <label>Name</label>
                    <input type="text" class="input" v-model="nmill.name">
                </p>
                <button class="btn" @click="saveMill()">Save</button>
            </ol>
            <ol v-for="(c, index) in mills">
                <p class="title">
                    {{c.name}}
                </p>
                <button class="btn" @click="deleteMill(c.id, index)">Delete</button>
                <button class="btn" @click="editMill(c, index)">Edit</button>
                <button class="btn" @click="addType(c, index)">Add Type</button>
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
                        <button class="btn" @click="removeType(m, index, i)">Remove Type</button>
                    </li>
                    <li v-if="millEdit == 'editMill_'+index">
                        <div v-for="(f, i) in mill">
                            <article v-if="i == 'name'" class="form-group">
                                <label>{{i}}</label>
                                <input type="text" class="input" v-model="mill[i]">
                            </article>
                            <article v-if="i == 'svg'" class="form-group">
                                <label>{{i}}</label>
                                <input type="file" class="input" @change="setNewPic($event)">
                            </article>
                        </div>
                        <button class="btn" @click="updateMill()">Save</button>
                        <button class="btn" @click="editMill()">cancel</button>
                    </li>
                    <li v-if="typeAdd == 'typeMill_'+index">
                        <p class="form-group">
                            <label>Name</label>
                            <input type="text" v-model="ntype.name">
                        </p>
                        <p class="form-group">
                            <label>svg</label>
                            <input type="file" @change="setTypeImg($event)">
                        </p>
                        <button class="btn" @click="saveType(index)">Save Type</button>
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
    },
    props: [
       
    ],
    data(){
        return {
            mills: null,
            mill: false,
            millEdit: false,
           newMill: false,
           nmill: {
               name: null,
           },
           ntype: {
               name: null,
               svg: false,
               mill_id: 0 
           },
           typeAdd: false
        }
    },
    methods: {
       saveMill(){
           var este = this,
            formData = new FormData();
            formData.append('name', this.nmill.name);

            axios.post('/panel/save-mill', formData).then((mill) => {
                este.mills = mill.data
                este.newMill = false
                este.nmill= {
                    name: null,
                }
            });
       },
       deleteMill(id, index){
            if (confirm('Delete finish?')) {
                var este = this;
                axios.get('/panel/delete-mill/'+id).then((response) => {
                   este.mills.splice(index, 1)
                });
          }
       },
       editMill(m, index){
           this.mill ? this.mill = false : this.mill = m;
           this.millEdit = 'editMill_'+index
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
      addType(m, index){
          this.mill ? this.mill = false : this.mill = m;
           this.typeAdd = 'typeMill_'+index
      },
      saveType(index){
          var este = this,
            formData = new FormData();

            formData.append('name', this.ntype.name);
            formData.append('mills_id', this.mill.id);
            formData.append('svg', this.ntype.svg);

            axios.post('/panel/add-mill-type', formData).then((response) => {
                este.mills[index].mills.push(response.data)
                este.typeAdd = false;
                este.ntype.name = null;
                este.ntype.svg = null
                este.mill = false;
            });
      },
      removeType(m, index, i){
          var este = this;

          axios.get('/panel/delete-mill-type/'+m.id).then((response) => {
                este.mills[index].mills.splice(i, 1);
          });
      },
      setTypeImg($event){
          this.ntype.svg = $event.target.files[0]
      }
    }
}
</script>