<template>
    <div  :s-sec="section" class="detail">
        <figure class="header" :data-cat="category">
            <icon name="triangle"></icon>
            <img v-if="category == 1" src="/img/services/chart.jpg" alt="">
            <img v-if="category == 2" src="/img/services/powder.jpg" alt="">
            <img v-if="category == 3" src="/img/services/patina.jpg" alt="">
            <icon name="painting"></icon>
        </figure>
        <div class="info column header-text">
                <p class="title" v-if="category == 1">Finish Chart</p>
                <p class="title" v-if="category == 2">Powder Coat</p>
                <p class="title" v-if="category == 3">Patina</p>
                <icon name="estrella4"></icon>
            <div class="text" v-if="category == 1">
                <div>
                    <strong>Notice</strong><br>
                    <p>
                        The finish may vary or look different on the screen, ask us for a sample. 
                    </p><br><br>
                    <p>
                        The finish shown here are just some examples, you can
                        ask for any finish you require. You can che k more finish
                        examples on button below.
                    </p>
                    <br><br>
                    <button class="cta btn" @click="allChart()">See More</button>
                </div>
            </div>
            <p class="text" v-if="category == 2">
                It is a coating with clear benefits in relation to liquid
                and non-solvent paint. It has proven resistance to
                chemical agents, impact and corrosion, ensuring the
                durability of the treated piece.
            </p>
            <p class="text" v-if="category == 3">
                The patina is aware that forms on the surface of
                metals, is produced by oxidation or by chemical processes that give the piece of metal a rustic, antique
                and decorative appearance. <br> <br>
                Decorative element that provides texture to the surface of the metal, as well as gradations of color and
                contrasting tones, this method is used extensively to
                brighten striking effects in the final result.
            </p>
        </div>
        <article class="info column" v-if="category == 1">
            <ul>
                <ol v-if="p.attributes.archivo != undefined" v-for="(p, i) in paint">
                    <figure>
                        <figcaption>
                            <p class="text">
                                <b>Code</b> <span>{{p.attributes.code}}</span>
                            </p>
                            <p class="text">
                                <b>US Code</b> <span>{{p.attributes.uscode}}</span>
                            </p>
                            <p class="text">
                                <b>Description</b> <br><span>{{p.attributes.description}}</span>
                            </p>
                            <div>
                                <p class="text"><b>Base Material</b></p>
                                <ul>
                                    <li class="text" v-for="(b, ind) in p.attributes.bases">{{b.name}}</li>
                                </ul>
                            </div>
                        </figcaption>
                        <img width="100%" :src="'/storage/'+p.attributes.archivo" alt="">
                    </figure>
                </ol>
            </ul>
        </article>
        <article class="info column" v-if="category == 2">
            <p class="title">Some Advantages</p>
            <ul>
                <li>
                    <icon name="star"></icon>
                    <p class="text">
                         Great resistance to corrosion, impact, abrasion and temperature changes
                    </p>
                </li>
                <li>
                    <icon name="star"></icon>
                    <p class="text">
                        Great variety of colors and finishes.
                    </p>
                </li>
                <li>
                    <icon name="star"></icon>
                    <p class="text">
                        It does not contain solvents, which means that the process is not aggressive with the environment, and at the same time allows a pore-free coating product of the evaporation of the solvent.
                    </p>
                </li>
            </ul>
            <p class="title">Cure</p>
            <ul class="cure-list">
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Polyester
                        </p>    
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Polyester TGIC
                        </p>
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Polyester TGIC Low Cure
                        </p>
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Super Polyester TGIC
                        </p>    
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Polyurethane
                        </p>    
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Polyurethane Low Cure
                        </p>
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Hybrid
                        </p>    
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Hybrid Low Cure
                        </p>    
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Epoxy
                        </p>
                    </li>
                    <li>
                        <icon name="star"></icon>
                        <p class="category">
                            Acrylic Polyester Hybrid
                        </p>
                    </li>
            </ul>
            <div>
                <figure class="prev-color">
                    <span v-if="hue && color" :style="'background-color:' + color">&nbsp;</span>
                    <img width="100%" src="/img/block.PNG" alt="">
                </figure>
                <div class="text">
                    <strong>Notice</strong>
                    <p>
                        The colors may vary or look different on the screen, ask us for a sample. <br><br>
                        The colors shown here are just some examples, you can ask for any color
                        you require. In addition you can ask for additional effects and textures.
                    </p>
                </div>
            </div>
            <ul class="powder-list">
                <ol v-for="(p, i) in paint">
                    <div @click="showHues(i)">
                        <p class="title">{{i}}</p>
                        <icon v-if="hue !== 'hue_'+i" name="boton-v"></icon>
                        <icon v-if="hue === 'hue_'+i" name="minus"></icon>
                    </div>
                    <ul :class="{'active': hue == 'hue_'+i}">
                        <li v-for="(pa, ind) in p" @click="prevColor(pa)">
                            <span :style="'background-color:' + pa.attributes.hex">&nbsp;</span>
                            <p class="text">{{pa.attributes.hue}}</p>
                        </li>
                    </ul>
                </ol>
            </ul>
        </article>
        <article class="info column" v-if="category == 3">
            <div>
                <p class="text">
                <b>Notice</b> <br>
                The patina finish may vary or look different on the screen,
                ask us for a sample. <br><br>
                The patina finish shown here are just some examples, you
                can ask for any finish you require.
            </p>
            <article v-for="(p, i) in paint" class="patina-list">
                    <div>
                        <p class="title">{{i}}</p>
                    </div>
               <ul>
                    <ol v-for="(pat, ind) in p">
                    <ul>
                        <p class="text">{{pat.attributes.name}}</p><br>
                        <p class="text">Base Material</p>
                        <li class="text" v-for="(b, ind) in pat.attributes.bases">{{b.name}}</li>
                    </ul>
                    <img width="100%" :src="'/storage/'+pat.attributes.archivo" alt="">
                </ol>
               </ul>
            </article>
            </div>
        </article>
        <section class="finishchart" :s-active="chart">
                <article class="chart-table">
                    <p class="title">
                        FINISH CHART ANSI/MHMS
                    </p>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>US Code</th>
                            <th>Finish Description</th>
                            <th>Base Material</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(p, i) in sortedCharts">
                            <td>{{p.attributes.code}}</td>
                            <td>{{p.attributes.uscode}}</td>
                            <td>{{p.attributes.description}}</td>
                            <td>
                                <p v-if="b" v-for="(b, ind) in p.attributes.bases">{{b.name}}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </article>
        </section>
    </div>
</template>
<script>
export default {
    mounted(){
           this.$bus.$on('modal', ($event) => {
               this.allChart()
           });                
    },
    props: [
        'paints', 'category'
    ],
    data(){
        return {
            paint: false,
            hue: false,
            color: false,
            chart: false,
            section: false
        }
    },
    methods: {
        setPaint(index){
            this.paint = index
        },
        prevColor(paint){
                this.color ? this.color = false : this.color = paint.attributes.hex;
        },
        showHues(i){
            this.hue ? this.hue= false : this.hue = 'hue_'+i;
            if (!this.hue){
                this.color = false;
            }
        },
        allChart(){
            this.chart ? this.chart = false : this.chart = true;
            $('.overlay').first().attr('s-active', this.chart);
        }
    },
    watch: {
        category: {
            handler (val, old){
                
                if(val == 1){
                    this.paint = this.paints['finish Chart'];
                    this.paint.name = 'Finish Chart';
                    this.section = 'finish-chart'
                }else if(val == 3){
                    this.paint = this.paints['patina'];
                    this.section = 'patina'
                }else{
                    this.paint = this.paints['powder coat'];
                    this.section = 'powder-coat'
                }
                
            }
        },
        paints: {
            handler(val, old) {
                
            }
        }
    },
    computed: {
        sortedCharts: function(){
            function compare(a, b) {
                if (a.attributes.code < b.attributes.code)
                    return -1;
                if (a.attributes.code > b.attributes.code)
                    return 1;
                return 0;
                }

            return this.paints['finish Chart'].sort(compare);
        }
    }
}
</script>
