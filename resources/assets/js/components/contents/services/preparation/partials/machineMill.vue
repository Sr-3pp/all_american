<template>
    <div class="detail">
        <figure class="header">
            <icon name="triangle"></icon>
            <img src="/img/services/machine_mill.jpg" alt="">
            <icon name="machine_mill"></icon>
        </figure>
        <p class="title">
            Machine Mill
            <icon name="star_panel1"></icon>
        </p>  
        <p class="text">
            CNC millwork, from the production of complex parts to the manufacture of precise
            parts for components, we have the top
            tools for your project, in order to transform
            the production in efficient time.
            <icon name="star_panel2"></icon>
        </p>
        <p class="title">Benefits</p>
        <p class="text full">
            A milling machine provides many advantages when doing drill or cut milling,
            as a computerized system allows cutting or drilling with precision in any
            direction, within three dimensions.
        </p>
        <div class="info column drills">
            <div class="title">
                Categories / Examples
            </div>
            <article class="category" v-for="(c, index) in mills">
                <p class="subtitle">{{c.name}}</p>
                <ul>
                    <ol v-for="(m, ind) in c.mills">
                        <img :src="'/storage/'+m.svg" alt="">
                        <p>{{m.name}}</p>
                    </ol>
                </ul>
            </article>
        </div>
    </div>
</template>
<script>
export default {
    mounted(){
                
    },
    props: ['mills'],
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>
