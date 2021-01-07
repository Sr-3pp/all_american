<template>
  <article class="select-list">
    <ul class="selected">
      <li class="item" v-for="(item, index) in selected">{{item.name}} <button @click="removeItem(index)" type="button" class="btn btn-link"><i class="fas fa-times"></i></button></li>
    </ul>
    <input @keyup="searchFor()" :placeholder="'Search '+magic" type="text" v-model="search" class="input">
    <transition name="fade">
      <ul v-if="results.length !== 0" class="results">
        <li class="item" @click="addItem(result)" v-for="(result, index) in results">{{result.name}}</li>
      </ul>
    </transition>
  </article>
</template>

<script>
export default {
  mounted(){
    
  },
  props: [
    'magic'
  ],
  data(){
    return {
      selected: [],
      results: [],
      search: ''
    }
  },
  methods:{
    searchFor(){
      if(this.search === ''){
        this.results = []
      }else{
        var este = this;
        axios.post('/search', {search: this.search, magic: this.magic}).then(function(results){
          este.results = results.data
        });
      }
    },
    addItem(item){
      this.selected.unshift(item)
      this.$bus.$emit('setItem', {item: item, magic: this.magic});
      this.results = [];
      this.search = '';
    },
    removeItem(index){
      this.selected.splice(index, 1)
    }
  }
}
</script>
