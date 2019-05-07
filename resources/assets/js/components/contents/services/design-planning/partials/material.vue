<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/planning_card.jpg" alt="">
            <icon name="material"></icon>
        </figure>
        <p class="title">
            Material
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            Choosing the right material for each project is
            very important, we care about providing excellence both in the visual aesthetics of the project
            and the quality of it, therefore you can trust that
            we will take care of finding and guaranteeing
            the use of quality materials for your project
            <icon name="star_panel2"></icon>
        </p>
        <ul class="material-list">
            <ol class="material" v-for="(material, index) in materials">
                <p class="category">
                    <icon name="material"></icon>
                    {{material.name}}
                </p>
                <p class="text">{{material.description}}</p>   
                <figure>
                    <img :src="material.img" alt="">
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
