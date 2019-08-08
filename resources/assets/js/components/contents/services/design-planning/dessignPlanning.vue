<template>
    <transition-group tag="div" class="cont blue">
        <article class="card" :key="0" v-if="!active" @click="setSection(1)">
            <figure>
                <img src="/img/services/planning_card.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="planning"></icon>
                <p class="text">
                    Dessign and<br>Planning
                </p>
            </div>
        </article>
        <article :key="1" class="sub" v-if="active && !detail">
            <div class="headline">
                <icon name="planning"></icon>
                <h1 class="subtitle">Design and Planning</h1>
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
                        <img src="/img/services/concept.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Concept</p>
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
                        <img src="/img/services/planning_card.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Planning</p>
                        <div>
                            <p>
                                We devise and take the best path to reach your goals efficiently and as quickly as possible...
                            </p>
                            <icon name="planning"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(3)">
                    <figure class="img">
                        <img src="/img/services/material.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Material</p>
                        <div>
                            <p>
                                Choosing the right material for each project is very important, we care about providing...
                            </p>
                            <icon name="material"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(4)">
                    <figure class="img">
                        <img src="/img/services/horientation.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Horientation</p>
                        <div>
                            <p>
                                We will be with you from the moment the idea is generated to the completion of your project,...
                            </p>
                            <icon name="horientation"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(5)">
                    <figure class="img">
                        <img src="/img/services/horientation.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Original design</p>
                        <div>
                            <p>
                                Original designs, creative concepts, functional tools. When you look for Custom metal...

                            </p>
                            <icon name="original"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(6)">
                    <figure class="img">
                        <img src="/img/services/estimate.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Estimate</p>
                        <div>
                            <p>
                                Original designs, creative concepts, functional tools. When you look for Custom metal...
                            </p>
                            <icon name="estimate"></icon>
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
        <concept :key="2" v-show="active && detail == 1"></concept>
        <planning :key="3" v-show="active && detail == 2"></planning>
        <material :materials="materials" :key="4" v-show="active && detail == 3"></material>
        <horientation :key="5" v-show="active && detail == 4"></horientation>
        <original-designs :key="6" v-show="active && detail == 5"></original-designs>
        <estimate :key="7" v-show="active && detail == 6"></estimate>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {            
            if($event.section == 1){
               this.detail = false;
            }
        }).$on('setSub', ($event) => {
            this.detail = $event.section+1
        });;
    },
    props: ['active', 'materials'],
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
