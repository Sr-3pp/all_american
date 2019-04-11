<template>
    <article class="foaming-form form">
        <h3 class="subtitle">Angles and chanels</h3>
        <div class="group material">
            <p class="subtitle">Material</p>
            <div>
                <p>
                    <span class="radio" @click="form.material = 1">
                        <icon v-if="form.material == 1" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Stainless steel
                    </span>
                    <span class="radio" @click="form.material = 2">
                        <icon v-if="form.material == 2" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Brass
                    </span>
                    <span class="radio" @click="form.material = 3">
                        <icon v-if="form.material == 3" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Aluminium
                    </span>
                    <span class="radio" @click="form.material = 4">
                        <icon v-if="form.material == 4" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        Copper
                    </span>
                </p>
                <figure>
                    <img src="/img/default.jpg" alt="">
                </figure>
            </div>
        </div>
        <div class="group gauges">
            <p class="subtitle">Gauges</p>
            <p class="text">What are gauges? <span class="tooltip">?</span></p>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Gauges</th>
                            <th>Thicknes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="radio" @click="form.gauge = '30'">
                                    <icon v-if="form.gauge == '30'" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    30
                                </span>
                            </td>
                            <td>
                                0.010"
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="radio" @click="form.gauge = '28'">
                                    <icon v-if="form.gauge == '28'" name="radio_on"></icon> 
                                    <icon v-else name="radio_off"></icon> 
                                    28
                                </span>
                            </td>
                            <td>
                                0.013"
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="group shape">
            <p class="subtitle">Shape</p>
            <ul>
                <li :class="{'active': form.shape.section == 1}" @click="form.shape.section = 1">Sheet</li>
                <li :class="{'active': form.shape.section == 2}" @click="form.shape.section = 2">Channel and angles</li>
                <li :class="{'active': form.shape.section == 3}" @click="form.shape.section = 3">Frames</li>
                <li :class="{'active': form.shape.section == 4}" @click="form.shape.section = 4">Panels</li>
            </ul>
            <transition-group tag="div" class="content">
                <div :key="0" class="angles" v-if="form.shape.section == 2">
                    <p class="subtitle">Channels and Angles</p>
                    <ul>
                        <li :class="{'active': form.shape.value == 1}" @click="form.shape.value = 1">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 1" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 2}" @click="form.shape.value = 2">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 2" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 3}"  @click="form.shape.value = 3">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 3" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 4}" @click="form.shape.value = 4">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 4" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 5}" @click="form.shape.value = 5">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 5" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 6}" @click="form.shape.value = 6">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 6" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 7}" @click="form.shape.value = 7">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 7" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                        <li :class="{'active': form.shape.value == 8}"  @click="form.shape.value = 8">
                            <span>
                                <icon name="channel_6"></icon>
                            </span>
                            <span class="radio">
                                <icon v-if="form.shape.value == 8" name="radio_on"></icon> 
                                <icon v-else name="radio_off"></icon> 
                                Channel w/ Hands
                            </span>
                        </li>
                    </ul>
                    <p class="text"  @click="form.shape.value = 0">
                        <icon v-if="form.shape.value == 0" name="radio_on"></icon> 
                        <icon v-else name="radio_off"></icon> 
                        <span>
                            Can’t fiand the shape that you need, no problem send us your exact specificationsn we can do it.
                        </span>
                    </p>
                </div>
                <button :key="99" @click="validate()">test</button>
            </transition-group>
        </div>
        <div class="group sizes">
            <p class="subtitle">Sizes</p>
            <div>
                <article>
                    imagenes
                </article>
                <article>
                    <p class="text">Inch Measure</p>
                    <div class="group">
                        <label>Side A</label>
                        <input type="text" class="input">
                    </div>
                    <div class="group">
                        <label>Angle A</label>
                        <input type="text" class="input">
                    </div>
                    <div class="group">
                        <label>Side B</label>
                        <input type="text" class="input">
                    </div>
                    <div class="group">
                        <label>Angle B</label>
                        <input type="text" class="input">
                    </div>
                    <div class="group">
                        <label>Side C</label>
                        <input type="text" class="input">
                    </div>
                    <div class="group">
                        <label>Length</label>
                        <input type="text" class="input">
                    </div>
                </article>
            </div>
            <div class="group">
                <label>Amount of pieces</label>
                <input type="text" class="input">
            </div>
        </div>
        <div class="group finish">
            <p class="subtitle">Full finish</p>
            <div>
                <span class="radio" @click="form.finish = 1">
                    <icon v-if="form.finish == 1" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Machine Mill
                </span>
                <span class="radio" @click="form.finish = 2">
                    <icon v-if="form.finish == 2" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Welding
                </span>
                <span class="radio" @click="form.finish = 3">
                    <icon v-if="form.finish == 3" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Brush
                </span>
                <span class="radio" @click="form.finish = 4">
                    <icon v-if="form.finish == 4" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Polish
                </span>
                <span class="radio" @click="form.finish = 5">
                    <icon v-if="form.finish == 5" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Grained
                </span>
                <span class="radio" @click="form.finish = 6">
                    <icon v-if="form.finish == 6" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Paint
                </span>
                <span class="radio" @click="form.finish = 7">
                    <icon v-if="form.finish == 7" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Patina
                </span>
                <span class="radio" @click="form.finish = 8">
                    <icon v-if="form.finish == 8" name="radio_on"></icon> 
                    <icon v-else name="radio_off"></icon> 
                    Powder coat
                </span>
            </div>
        </div>
    </article>
</template>
<script>
export default {
    mounted(){

    },
    data(){
        return{
            form: {
                material: 1,
                gauge: '30',
                shape: {
                    section: 2,
                    value: 1
                },
                sizes: {
                    a: {
                        size: null,
                        angle: null
                    },
                    b: {
                        size: null,
                        angle: null,
                    },
                    c: {
                        size: null,
                    },
                    length: null
                },
                finish: 1,

            }
        }
    },
    methods: {
        validate(){
            console.log(this.form.shape);
            
        }
    }
}
</script>
