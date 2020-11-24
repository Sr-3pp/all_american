<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/material.jpg" alt="">
            <icon name="material"></icon>
        </figure>
        <div class="info column header-text">
            <p class="title">
                Material
            </p>  
                <icon name="estrella4"></icon>
            <p class="text">
                Choosing the right material for each project is
                very important, we care about providing excellence both in the visual aesthetics of the project
                and the quality of it, therefore you can trust that
                we will take care of finding and guaranteeing
                the use of quality materials for your project
            </p>
        </div>
        <ul class="material-list">
            <ol class="material" v-for="(material, index) in materials">
                <p class="category">
                    <icon name="material"></icon>
                    {{material.name}}
                </p>
                <p class="text">{{material.description}}</p>   
                <figure>
                    <img :src="'/storage/'+material.img" alt="">
                </figure>
            </ol>
        </ul>
    </div>
</template>
<script>
export default {
    mounted(){
     
        
    },
    props: ['materials'],
    data(){
        return {
            
        }
    },
    methods: {

    }
}
</script>
