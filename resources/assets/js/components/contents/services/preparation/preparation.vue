<template>
    <transition-group tag="div" class="cont">
        <article :key="0" v-if="!active" @click="setSection(2)">
            <figure>
                <img src="/img/services/preparation_card.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="preparation"></icon>
                <p class="text">
                    Preparation
                </p>
            </div>
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
                <article class="card" @click="setDetail(2)">
                    <figure class="img">
                        <img src="/img/slides/projects/slide_4.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Forming Break</p>
                        <div>
                            <p>
                                We adapt your material so that it fulfills its specific functions, we design, angles, U chanels, panels...
                            </p>
                            <icon name="concept"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(3)">
                    <figure class="img">
                        <img src="/img/slides/projects/slide_4.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Machine Mill</p>
                        <div>
                            <p>
                                Choosing the right material for each project is very important, we care about providing...
                            </p>
                            <icon name="concept"></icon>
                        </div>
                    </div>
                </article>
            </div>
            <div class="content">
            <article>
                <p class="title">Fabrication</p>
                <p class="text">
                    We offer fully customized <b>guard rails</b>
                    and <b>decorative railings</b> to match any
                    aesthetic. From hammered end caps to
                    forged steel caps, pickets and tubing,
                    we can create a railing that will last for
                    years and look amazing. <b>Don't settle
                    on prefabricated pieces</b> that barely fit
                    your home, call the professionals at All
                    American Finishing. We'll customize to
                    your exact specifications.
                </p>
            </article>
            <article>
                <p class="title">Process</p>
                <drop-list :list="list" name="general"></drop-list>
            </article>
        </div>
        </article>
        <shear :key="2" v-show="active && detail == 1"></shear>
        <forming-break :key="3" v-show="active && detail == 2"></forming-break>
        <machine-mill :key="4" v-show="active && detail == 3"></machine-mill>
    </transition-group>
</template>
<script>
export default {
    mounted(){

    },
    props: ['active'],
    data(){
        return {
           detail: false,
           list: {
               0:{
                        name: 'Additional Services',
                        content: 'In <b>All American Finishing</b> we know that in the industrial, custom metal fabrication, each project is a new challenge that brings with it, new ways to reach the desired objectives. So we are <b>constantly growing</b>, reinventing the way we work, we will make sure to deliver your project fulfilling the expectations you want.'
                    },
                    1:{
                        name: 'Daily report',
                        content: 'El contenido chilo'
                    },
                    2:{
                        name: 'Prefabrication Inspection',
                        content: 'El contenido chilo'
                    }
            }
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
