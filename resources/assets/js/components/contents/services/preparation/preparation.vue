<template>
    <transition-group tag="div" class="cont">
        <article :key="0" v-if="!active" @click="setSection(2)">
            <figure>
                <img src="/img/services/preparation_card.jpg" alt="">
            </figure>
            <p class="label">
                <icon name="preparation"></icon>
                Preparation
            </p>
        </article>
        <article class="sub" :key="1" v-if="active && !detail">
            <div class="headline">
                <icon name="preparation"></icon>
                <h1 class="subtitle">Preparation</h1>
                <icon name="star_bar"></icon>
            </div>
            <p class="text">
                We provide complete custom metal fabrication services, from planning to delivery
                in your business or home, we will work and trace from the beginning the best way
                to achieve the objectives of your project, anticipating any inconvenience that may
                arise, we distinguish ourselves by our reputation and that we are a committed and
                responsible company.
            </p>
            <div class="cards">
                <article class="card" @click="setDetail(1)">
                    <figure class="img">
                        <img src="/img/slides/projects/slide_4.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Shear</p>
                        <div>
                            <p>
                                Generating an idea and bringing it to reality is what we do, create and define concepts...
                            </p>
                            <icon name="concept"></icon>
                        </div>
                    </div>
                </article>
            </div>
        </article>
        <shear :key="2" v-show="active && detail == 1"></shear>
    </transition-group>
</template>
<script>
export default {
    mounted(){

    },
    props: ['active'],
    data(){
        return {
           
        }
    },
    methods: {
        setSection(index){
            this.$bus.$emit('setTab', {section: index});
        },
        setDetail(index){
            this.detail = index
        }
    }
}
</script>
