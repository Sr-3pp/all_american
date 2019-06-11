<template>
    <transition-group tag="div" class="cont">
        <article class="card" :key="0" v-if="!active" @click="setSection(5)">
            <figure>
                <img src="/img/services/painting_card.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="painting"></icon>
                <p class="text">
                    Painting
                </p>
            </div>
        </article>
        <article :key="1" class="sub" v-if="active && !detail">
            <div class="headline">
                <icon name="painting"></icon>
                <h1 class="subtitle">Painting</h1>
                <icon name="star_bar"></icon>
            </div>
            <p class="text">
                Painting service and finishes, we guarantee a high-quality surface, , leaving it reflective and decorative, according to your needs, also allows a better adhesion and protection against oxidation.
            </p>
            <div class="cards">
                <article class="card" @click="setDetail(1)">
                    <figure class="img">
                        <img src="/img/services/wet_painting.jpg" alt="wet painting">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Wet Painting</p>
                        <div>
                            <p>
                               A layer of metal coating or wet paint may provide protection to the metal part...
                            </p>
                            <icon name="painting"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(2)">
                    <figure class="img">
                        <img src="/img/services/chart.jpg" alt="finish chart">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Finish Chart</p>
                        <div>
                            <p>
                                We devise and take the best path to reach your goals efficiently and as quickly as possible...
                            </p>
                            <icon name="painting"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(3)">
                    <figure class="img">
                        <img src="/img/services/powder.jpg" alt="powder coat">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">POWDER COAT</p>
                        <div>
                            <p>
                                It is a coating with clear benefits in relation to liquid and non-solvent paint...
                            </p>
                            <icon name="painting"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(4)">
                    <figure class="img">
                        <img src="/img/services/patina.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Patina</p>
                        <div>
                            <p>
                                The patina is a wear that forms on the surface of metals, is produced by oxidation or by chemical...
                            </p>
                            <icon name="painting"></icon>
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
        <wet-painting :key="2" v-show="active && detail == 1"></wet-painting>
        <finish-cart :key="3" v-show="active && detail == 2"></finish-cart>
        <powder-coat :key="4" v-show="active && detail == 3"></powder-coat>
        <patina :key="5" v-show="active && detail == 4"></patina>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            if($event.section == 5){
               this.detail = false;
            }
        });
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
