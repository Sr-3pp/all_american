<template>
    <div class="cont red">
        <article class="card" :key="0" v-if="!active" @click="setSection(4)">
            <figure>
                <img src="/img/services/polish_cards.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="polish"></icon>
                <p class="text">
                    Polish
                </p>
            </div>
        </article>
        <article class="sub" :key="1" v-if="active && !detail">
            <div class="headline">
                <icon name="polish"></icon>
                <h1 class="subtitle">Finishes</h1>
                <icon name="star_bar"></icon>
            </div>
            <p class="text">
                We work with a variety of all type of welding manufactures and we can repair all types of metal parts. We are specialists welding any type of metal alloy, our welders are prepared with many years of experience in the industry. We develop projects of different magnitude such as serial parts and custom manufacturing.
            </p>
            <div class="cards">
                <article v-for="(f, index) in finishes" class="card" @click="setDetail(index)">
                    <figure class="img">
                        <img v-if="index == 0" src="/img/services/finish_8.jpg" alt="">
                        <img v-if="index == 1" src="/img/services/finish_7.jpg" alt="">
                        <img v-if="index == 2" src="/img/services/finish_6.jpg" alt="">
                        <img v-if="index == 3" src="/img/services/finish_4.jpg" alt="">
                        <img v-if="index == 4" src="/img/services/vibration.jpg" alt="">
                        <img v-if="index == 5" src="/img/services/sandblasted.jpg" alt="">
                        <img v-if="index == 6" src="/img/services/timesaver.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">{{f.name}}</p>
                        <div>
                            <p>
                                <span>
                                    {{f.description}}
                                </span>
                            </p>
                            <icon name="polish"></icon>
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
        <finish-detail :finishes="Afinishes" :key="2" v-show="active && detail"></finish-detail>
    </div>
</template>
<script>
export default {
    mounted(){
        this.$bus.$on('setTab', ($event) => {
            if($event.section == 4){
               this.detail = null;
            }
        }).$on('setSub', ($event) => {
             this.detail = $event.section+1  
             this.Afinishes = this.finishes[$event.section]
        });;                
    },
    props: ['active', 'finishes'],
    data(){
        return {
            Afinishes: false,
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
            this.detail = index+1  
            this.Afinishes = this.finishes[index]   
        }
    }
}
</script>
