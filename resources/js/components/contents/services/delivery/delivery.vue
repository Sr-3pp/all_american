<template>
    <transition-group tag="div" class="cont gray">
        <article class="card" :key="0" v-if="!active" @click="setSection(6)">
            <figure>
                <img src="/img/services/service_6.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="delivery"></icon>
                <p class="text">
                    Delivery
                </p>
            </div>
        </article>
        <article :key="1" class="sub" v-if="active && !detail">
            <div class="headline">
                <icon name="delivery"></icon>
                <h1 class="subtitle">Delivery</h1>
                <icon name="star_bar"></icon>
            </div>
            <p class="text">
	    	We pride ourselves on being a company that In addition to our quality products, we have services delivered to
            </p>
            <div class="cards">
                <article class="card" @click="setDetail(1)">
                    <figure class="img">
                        <img src="/img/services/service_6.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Delivery</p>
                        <div>
                            <p>
                              We pride ourselves on being a company that In addition to our quality products, we have services delivered to
                            </p>
                            <icon name="delivery"></icon>
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
        <!-- <wet-painting :key="2" v-show="active && detail == 1"></wet-painting> -->
    </transition-group>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            if($event.section == 6){
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
                        content: 'You will be <b>informed</b> of the <b>situation</b> and the <b>progress</b> of your project such as figures, achievements, results, events, activities carried out and even incidence. At All American Finishing we believe that this is important information for decision making.'
                    },
                    2:{
                        name: 'Prefabrication Inspection',
                        content: 'We consider it important to make a <b>meticulous inspection</b> of all the details of each project before its release, this way we can anticipate possible obstacles or difficulties that may arise, so you can acquire your <b>product faster</b>.'
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
