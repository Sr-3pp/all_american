<template>
    <div class="detail">
        <figure class="header" :data-cat="category">
            <icon name="triangle"></icon>
            <img v-if="category == 1" src="/img/services/chart.jpg" alt="">
            <img v-if="category == 2" src="/img/services/powder.jpg" alt="">
            <img v-if="category == 3" src="/img/services/patina.jpg" alt="">
            <icon name="painting"></icon>
        </figure>
        <p class="title">
            {{paint.name}}
            <icon name="star_panel1"></icon>
        </p>  
        <div class="text column" v-if="category == 1">
            <p>
                <span>Notice</span><br>
                The finish may vary or look different on the screen, ask us
                for a sample.
                The finish shown here are just some examples, you can
                ask for any finish you require. You can che k more finish
                examples on button below.
                <br><br>
                <button class="cta btn">See More</button>
            </p>
            <icon name="star_panel2"></icon>
        </div>
        <p class="text" v-if="category == 2">
            It is a coating with clear benefits in relation to liquid
            and non-solvent paint. It has proven resistance to
            chemical agents, impact and corrosion, ensuring the
            durability of the treated piece.
            <icon name="star_panel2"></icon>
        </p>
        <p class="text" v-if="category == 3">
            The patina is aware that forms on the surface of
            metals, is produced by oxidation or by chemical processes that give the piece of metal a rustic, antique
            and decorative appearance. <br> <br>
            Decorative element that provides texture to the surface of the metal, as well as gradations of color and
            contrasting tones, this method is used extensively to
            brighten striking effects in the final result.
            <icon name="star_panel2"></icon>
        </p>
        <article class="info column" v-if="category == 1">
            <ul>
                <ol v-for="(p, i) in paint">
                    <figure>
                        <figcaption>
                            <p class="text">
                                <b>Code</b> <span>{{p.attributes.code}}</span>
                            </p>
                            <p class="text">
                                <b>US Code</b> <span>{{p.attributes.uscode}}</span>
                            </p>
                            <p class="text">
                                <b>Description</b> <span>{{p.attributes.description}}</span>
                            </p>
                            <div>
                                <p class="text"><b>Base Material</b></p>
                                <ul>
                                    <li v-for="(b, ind) in p.attributes.bases">{{b.name}}</li>
                                </ul>
                            </div>
                        </figcaption>
                        <img width="100%" src="/img/default.jpg" alt="">
                    </figure>
                </ol>
            </ul>
        </article>
        <article class="info column" v-if="category == 2">
            <p class="title">Some Advantages</p>
            <ul>
                <li>Great resistance to corrosion, impact, abrasion and temperature changes</li>
                <li>Great variety of colors and finishes.</li>
                <li>
                    It does not contain solvents, which means that the process is not aggressive
                    with the environment, and at the same time allows a pore-free coating product
                    of the evaporation of the solvent.
                </li>
            </ul>
            <p class="title">Cure</p>
            <ul>
                    <li>Polyester </li>
                    <li>Polyester TGIC</li>
                    <li>Polyester TGIC Low Cure</li>
                    <li>Super Polyester TGIC</li>
                    <li>Polyurethane</li>
                    <li>Polyurethane Low Cure</li>
                    <li>Hybrid</li>
                    <li>Hybrid Low Cure</li>
                    <li>Epoxy</li>
                    <li>Acrylic Polyester Hybrid</li>
            </ul>
            <div>
                <figure class="prev-color">
                    <span v-if="hue && color" :style="'background-color:' + color">&nbsp;</span>
                    <img width="100%" src="/img/block.PNG" alt="">
                </figure>
                <p>
                    <strong>Notice</strong>
                    <p>
                        The colors may vary or look different on the screen, ask us for a sample. <br><br>
                        The colors shown here are just some examples, you can ask for any color
                        you require. In addition you can ask for additional effects and textures.
                    </p>
                </p>
            </div>
            <ul class="powder-list">
                <ol v-for="(p, i) in paint">
                    <div @click="showHues(i)">
                        <p class="title">{{p.name}}</p>
                        <icon v-if="hue !== 'hue_'+i" name="boton-v"></icon>
                        <icon v-if="hue === 'hue_'+i" name="minus"></icon>
                    </div>
                    <ul :class="{'active': hue == 'hue_'+i}">
                        <li @click="prevColor(p)">
                            <span :style="'background-color:' + p.attributes.hex">&nbsp;</span>
                            <p class="text">{{p.attributes.hue}}</p>
                        </li>
                    </ul>
                </ol>
            </ul>
        </article>
        <article class="info column" v-if="category == 3">
            <p class="text">
                <b>Notice</b> <br>
                The patina finish may vary or look different on the screen,
                ask us for a sample. <br><br>
                The patina finish shown here are just some examples, you
                can ask for any finish you require.
            </p>
            <p class="title">
                TRADITIONAL BLUE AND GREEN PATINA 
            </p>
            <ul>
                <ol v-for="(p, i) in paint">
                    {{p.name}}
                    <ul>
                        <p class="text">{{p.attributes.name}}</p>
                        <li v-for="m in p.attributes.bases">{{m.name}}</li>
                    </ul>
                    <img width="100%" src="/img/default.jpg" alt="">
                </ol>
            </ul>
        </article>
    </div>
</template>
<script>
export default {
    mounted(){
                
    },
    props: [
        'paints', 'category'
    ],
    data(){
        return {
            paint: false,
            hue: false,
            color: false
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
        }
    },
    watch: {
        category: {
            handler (val, old){
                if(this.paints['finish Chart'][0] && this.paints['finish Chart'][0].attributes.category == val){
                    this.paint = this.paints['finish Chart'];
                    this.paint.name = 'Finish Chart';
                }else if(this.paints['powder coat'][0] && this.paints['powder coat'][0].attributes.category == val){
                    this.paint = this.paints['powder coat'];
                    this.paint.name = 'Powder Coat';
                }else if(this.paints['patina'][0] && this.paints['patina'][0].attributes.category == val){
                    this.paint = this.paints['patina'];
                    this.paint.name = 'Patina';
                }
                
            }
        }
    }
}
</script>
