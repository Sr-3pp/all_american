<template>
    <div class="content" s-desk="categories">
        <ul>
            <li v-if="newCat">
                <article>
                    <label>Name</label>
                    <input type="text" class="input" v-model="ncat.name">
                </article>
                <article>
                    <label>Kind</label>
                    <select class="input" v-model="ncat.kind">
                        <option value="project">Project</option>
                        <option value="finish">Finish</option>
                        <option value="mill">Mill</option>
                    </select>
                </article>
                <button @click="saveCat()">Save</button>
            </li>
            <li v-for="(cat, index) in categories">
                <p>
                    {{cat.name}}
                </p>
                <p>
                    {{cat.kind}}
                </p>
            </li>
        </ul>
    </div>
</template>
<script>
export default{
    mounted(){
        var este = this;
        this.$bus.$on('new', ($event) => {
            this.newCat ? this.newCat = false : this.newCat = true
        })

        axios.get('/panel/get-categories').then((cats) => {
            este.categories = cats.data
        });
        axios.get('/panel/get-cats/mill').then((cats) => {
            este.cats = cats.data
        });
    },
    props: [
       
    ],
    data(){
        return {
            categories: null,
            cats: null,
           newCat: false,
           ncat: {
               name: null,
               kind: null
           }
        }
    },
    methods: {
       saveCat(){
           var este = this;
           axios.post('/panel/save-cat', this.ncat).then((cat) => {
               este.categories.push(cat.data);
               este.newCat = false;
               este.ncat= {
               name: null,
               kind: null
           }
           });
       }
    }
}
</script>