<template>
  <article @click="selectFile()" class="upload-file">
    <span class="icon"><i class="far fa-file"></i></span>
    <article>
      <p>Choose a file</p>
      <input type="file" :accept="accept" class="hidden" id="fileInput" @change="setFile($event)">
    </article>
  </article>
</template>

<script>
export default {
  mounted(){
    
  },
  props: [
      'accept'
  ],
  data(){
    return {
      document: null
    }
  },
  methods: {
    selectFile(){
      $('#fileInput').click()
    },
    setFile($event){
      this.document = $event.target.files[0]
      this.$bus.$emit('setFile', {document: this.document});
    }
  }
}
</script>
