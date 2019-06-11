<template>
    <transition-group tag="div" class="cont">
        <article class="card" :key="0" v-if="!active" @click="setSection(3)">
            <figure>
                <img src="/img/services/welding_card.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="welding"></icon>
                <p class="text">
                    Welding
                </p>
            </div>
        </article>
        <article class="sub" :key="1" v-if="active && !detail">
            <div class="headline">
                <icon name="welding"></icon>
                <h1 class="subtitle">Welding</h1>
                <icon name="star_bar"></icon>
            </div>
            <p class="text">
               At All American Finishing, we offer a service in accordance with the most stringent
                national and international quality standards, and has the execution of its welding
                procedures with qualified welders and certified supervisory personnel with extensive experience in the different branches of the industry 
            </p>
            <div class="cards">
                <article class="card" @click="setDetail(1)">
                    <figure class="img">
                        <img src="/img/services/mig.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">MIG</p>
                        <div>
                            <p>
                                This system, being more versatile, saves time and resources since welding is clean ...
                            </p>
                            <icon name="welding"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(2)">
                    <figure class="img">
                        <img src="/img/services/tig.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">TIG</p>
                        <div>
                            <p>
                                Gas Tungstan Arc Welding (SMAW) TIG welding techniques offer the possibility of welding in any...
                            </p>
                            <icon name="welding"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(3)">
                    <figure class="img">
                        <img src="/img/services/stick.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">STICK</p>
                        <div>
                            <p>
                                 Being a simple and cheap portable equipment, it is ideal for outdoor...
                            </p>
                            <icon name="welding"></icon>
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
        <mig  :key="2" v-show="active && detail == 1"></mig>
        <tig  :key="3" v-show="active && detail == 2"></tig>
        <stick  :key="4" v-show="active && detail == 3"></stick>
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {           
            if($event.section == 3){
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
