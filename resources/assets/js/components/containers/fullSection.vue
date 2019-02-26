<template>
    <section class="full-section" :style="background">
        <h2>Full Section</h2>
    </section>
</template>

<script>
    export default {
        mounted() {
            if(this.backgroundImg){
               this.background = 'background-image: url('+this.backgroundImg+')' 
            }else if(this.backgroundColor){
               this.background = 'background-color: '+this.backgroundColor 
            }else if(this.gradient){
                this.background = 'background: '
            }
            
        },
        props: [
            'background-img', 'background-color', 'gradient'
        ],
        data(){
            return {
               background: null 
            }
        }
    }
</script>
