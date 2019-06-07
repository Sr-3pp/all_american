<template>
    <div class="cont">
        <article :key="0" v-if="!active" @click="setSection(4)">
            <figure>
                <img src="/img/services/polish_cards.jpg" alt="">
            </figure>
            <div class="label">
                <icon name="polish"></icon>
                <p class="text">
                    Finishes
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
                <article class="card" @click="setDetail(1)">
                    <figure class="img">
                        <img src="/img/services/finish_8.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">MIRROR FINISH #8</p>
                        <div>
                            <p>
                                Mirror" bright finish or polish, is the
                                case of the polishing process, the
                                purpose for this exact process is to
                                unify the surface..
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(2)">
                    <figure class="img">
                        <img src="/img/services/finish_7.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">FINISH #7</p>
                        <div>
                            <p>
                                This finish consists of a highly reflective surface polished and with a slight haze...
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(3)">
                    <figure class="img">
                        <img src="/img/services/finish_6.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">FINISH #6</p>
                        <div>
                            <p>
                                Also called sation or hairline is a
                                smooth finish, it is polished through
                                fine grain sandpaper...
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(4)">
                    <figure class="img">
                        <img src="/img/services/finish_4.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">FINISH #4</p>
                        <div>
                            <p>
                                The short and parallel polishing lines
                                extend uniformly throughout the
                                material. This...
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(5)">
                    <figure class="img">
                        <img src="/img/services/vibration.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Vibration</p>
                        <div>
                            <p>
                                This is a multidirectional finish, this
                                pattern of vibrant grain, uniform
                                texture random grain...
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(6)">
                    <figure class="img">
                        <img src="/img/services/sandblasted.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">Sand Blasted</p>
                        <div>
                            <p>
                                We devise and take the best path to
                                reach your goals efficiently and as
                                quickly as possible...
                            </p>
                            <icon name="polish"></icon>
                        </div>
                    </div>
                </article>
                <article class="card" @click="setDetail(7)">
                    <figure class="img">
                        <img src="/img/services/timesaver.jpg" alt="">
                    </figure> 
                    <div class="card-content">
                        <p class="subtitle">TIMESAVER</p>
                        <div>
                            <p>
                                The machines timesaver is a useful
                                tool to produce brushed finishes in
                                straight grain...
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
        <mirror :key="2" v-show="active && detail == 1"></mirror>
        <finish-seven :key="3" v-show="active && detail == 2"></finish-seven>
        <finish-six :key="4" v-show="active && detail == 3"></finish-six>
        <brush :key="5" v-show="active && detail == 4"></brush>
        <vibration :key="6" v-show="active && detail == 5"></vibration>
        <sandblast :key="7" v-show="active && detail == 6"></sandblast>
        <timesaver :key="8" v-show="active && detail == 7"></timesaver>
    </div>
</template>
<script>
export default {
    mounted(){
        console.log(this.finishes);
        
    },
    props: ['active', 'finishes'],
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
