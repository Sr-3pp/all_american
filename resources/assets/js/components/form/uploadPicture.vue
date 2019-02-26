<template>
  <article @click="setInput()" class="upload-picture" :style="background ? 'background: '+background : 'background: #cecece'">
    <span class="icon"><i class="fas fa-image"></i></span>
    <p>
      Click to select Picture.
    </p>
    <input id="setPic" @change="setPic($event)" type="file" accept="image/*" class="hidden">
  </article>
</template>

<script>
  export default {
    mounted(){

    },
    data(){
      return {
        background: null,
        pic: []
      }
    },
    methods: {
      setPic($event){
        if($event.target){
          this.pic = $event.target.files[0]
        }
        var este = this,
          image = new Image(),
          reader = new FileReader();
          reader.onload = function (e) {
            este.background = 'url('+e.target.result+') center no-repeat';
        };
        reader.readAsDataURL(this.pic);
        this.$bus.$emit('setPicture', {picture: this.pic})
      },
      setInput(){
        $('#setPic').click()
      }
    }
  }
</script>
