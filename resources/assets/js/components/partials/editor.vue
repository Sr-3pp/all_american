<template>
<div class="froala-editor">
    <froala id="edit" :tag="'div'" :config="config" v-model="model"></froala>
  </div>
</template>
<script>
import VueFroala from 'vue-froala-wysiwyg';
export default {
    mounted(){
        var este = this;
        this.$bus.$on('request-data', ($event) => {
            this.$bus.$emit('recieve-data', {edit: este.editFro, content: este.model});
        });        
    },
    props: [
        'content'
    ],
    data(){
        return {
            editFro: false,
            config: {
                events: {
                    initialized: function () {
                        
                    },
                    'image.beforeUpload': function (files) {
                        if (files.length) {
                            var este = this,
                                reader = new FileReader();
                            reader.onload = function (e) {
                                var result = e.target.result;
                                este.image.insert(result, null, null, este.image.get());
                            };
                            reader.readAsDataURL(files[0]);
                        }

                        este.popups.hideAll();
                        return false;                        
                    }
                }
            },
            model: 'Edit Your Content Here!'
        }
    },
    methods: {

    },
    watch: {
      content: {
          handler(val, old){
              
              this.model = val;
                  this.editFro = true;                  
             
          }
      }
    }
}
</script>
